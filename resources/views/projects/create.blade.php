
@extends('layouts.header')

@section('custom-js')
<script>
    $(document).ready(function() {
        $('#clients').select2({
            placeholder: "Select Clients",
            allowClear: true
        });
    });
</script>
@endsection


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

<form action="{{ route('projects.store') }}" method="POST">
    @csrf

    <div class="container">
    <div class="row">
    <div class="form-group col-lg-12">
        <label for="name">Project Name</label>
        <input type="text" name="name" class="form-control" id="name" required>
    </div>

   <div class="form-group col-lg-12">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" placeholder="Leave a description here" id="description"></textarea>
    </div>

    <div class="form-group col-lg-12">
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" class="form-control" id="start_date" required>
    </div>

    <div class="form-group col-lg-12">
        <label for="end_date">End Date</label>
        <input type="date" name="end_date" class="form-control" id="end_date" required>
    </div>

     <div class="form-group col-lg-12">
        <label for="status">Status</label>
        <select name="status" class="form-control" id="status" required>
            <option value="">Select Status</option>
            @foreach (\App\Enums\ProjectStatusEnum::cases() as $status)
             <option value="{{ $status->value }}">{{ ucfirst(strtolower(str_replace('_', ' ', $status->name))) }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-lg-12">
        <label for="user_id">Assign to User</label>
        <select name="user_id" class="form-control" id="user_id" required>
            <option value="">Select User</option>
            @foreach($personnels as $id => $name)
                <option value="{{ $id }}">{{ $name}}</option>
            @endforeach
        </select>
    </div>


      <div class="form-group col-lg-12">
        <label for="clients">Assign Clients</label>
        <select name="clients[]" class="form-control" id="clients" multiple required>
            <option value="">Select Client</option>
            @foreach($clients as $id => $name)
                <option value="{{ $id }}">{{ $name}}</option>
            @endforeach
        </select>
    </div>


    <div class="align-center">
        <button type="submit" class="btn btn-primary mt-3 mb-3">Create Project</button>
    </div>
    </div>
</div>
</form>



@endsection