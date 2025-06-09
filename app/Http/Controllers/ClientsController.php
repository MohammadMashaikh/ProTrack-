<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientsController extends Controller
{


    public function index()
    {
        $clients = Client::with('user')->paginate(10);
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        $personnels = User::pluck('full_name', 'id');
        return view('clients.create', compact('personnels'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'created_by' => 'required|exists:users,id',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'nullable|string'
        ]);

        Client::create($validated);

        return redirect()->route('clients.index')->with('success', 'Client Created Successfully.');

    }

}
