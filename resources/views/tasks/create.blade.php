
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

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf

    <div class="container">
    <div class="row">
    <div class="form-group col-lg-12">
        <label for="title">Task Title</label>
        <input type="text" name="title" class="form-control" id="title" required>
    </div>

   <div class="form-group col-lg-12">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" placeholder="Leave a description here" id="description"></textarea>
    </div>

    <div class="form-group col-lg-12">
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" class="form-control" id="start_date">
    </div>

    <div class="form-group col-lg-12">
        <label for="due_date">Due Date</label>
        <input type="date" name="due_date" class="form-control" id="due_date">
    </div>

     <div class="form-group col-lg-12">
        <label for="status">Status</label>
        <select name="status" class="form-control" id="status" required>
            <option value="">Select Status</option>
            @foreach (\App\Enums\TaskStatusEnum::cases() as $status)
             <option value="{{ $status->value }}">{{ ucfirst(strtolower(str_replace('_', ' ', $status->name))) }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-lg-12">
        <label for="priority">Priority</label>
        <select name="priority" class="form-control" id="priority" required>
            <option value="">Select Priority</option>
            @foreach (\App\Enums\TaskPriorityEnum::cases() as $priority)
             <option value="{{ $priority->value }}">{{ ucfirst(strtolower(str_replace('_', ' ', $priority->name))) }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-lg-12">
        <label for="assigned_to">Assign to User</label>
        <select name="assigned_to" class="form-control" id="assigned_to" required>
            <option value="">Select User</option>
            @foreach($personnels as $id => $name)
                <option value="{{ $id }}">{{ $name}}</option>
            @endforeach
        </select>
    </div>


       <div class="form-group col-lg-12">
        <label for="project_id">Assign to Project</label>
        <select name="project_id" class="form-control" id="project_id" required>
            <option value="">Select Project</option>
            @foreach($projects as $id => $name)
                <option value="{{ $id }}">{{ $name}}</option>
            @endforeach
        </select>
    </div>


    <div class="align-center">
        <button type="submit" class="btn btn-primary mt-3 mb-3">Create Task</button>
    </div>
    </div>
</div>
</form>



@endsection