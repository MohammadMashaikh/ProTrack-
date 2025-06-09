
@extends('layouts.header')


@section('content')

<div class="container mt-5 mb-5">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

<form action="{{ route('clients.store') }}" method="POST">
    @csrf

    <div class="container">
    <div class="row">
    <div class="form-group col-lg-12">
        <label for="company_name">Company Name</label>
        <input type="text" name="company_name" class="form-control" id="company_name" required>
    </div>

    <div class="form-group col-lg-12">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" required>
    </div>

    <div class="form-group col-lg-12">
        <label for="phone">Phone</label>
        <input type="text" name="phone" class="form-control" id="phone" required>
    </div>

    <div class="form-group col-lg-12">
        <label for="address">Address</label>
        <textarea name="address" class="form-control" id="address" rows="2" required></textarea>
    </div>

    <div class="form-group col-lg-12">
        <label for="created_by">Assign to User</label>
        <select name="created_by" class="form-control" id="created_by" required>
            <option value="">-- Select User --</option>
            @foreach($personnels as $id => $name)
                <option value="{{ $id }}">{{ $name}}</option>
            @endforeach
        </select>
    </div>
    <div class="align-center">
        <button type="submit" class="btn btn-primary mt-3 mb-3">Create Client</button>
    </div>
    </div>
</div>
</form>



@endsection