@extends('layouts.header')

@section('content')
<div class="py-4 m-5">
    <h1 class="h4 text-primary mb-4 font-weight-bold">List Of All Clients</h1>

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h6 text-primary mb-0">Client Table</h2>
            @can('manage.clients')
                <a href="{{ route('clients.create') }}" class="btn btn-outline-primary btn-m">
                + Client
                </a>
            @endcan
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>Company Name</th>                       
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Created By</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->company_name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->address ? $client->address : 'N/A' }}</td>
                        <td>{{ $client->user->full_name ? $client->user->full_name : $client->user->first_name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Pagination --}}
<div class="mt-4 d-flex justify-content-center">
    {{ $clients->links() }}
</div>
@endsection
