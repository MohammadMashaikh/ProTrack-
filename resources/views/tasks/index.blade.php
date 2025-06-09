@extends('layouts.header')

@section('content')
<div class="py-4 m-5">
    <h1 class="h4 text-primary mb-4 font-weight-bold">List Of All Tasks</h1>

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h6 text-primary mb-0">Tasks Table</h2>
            @can('manage.tasks')
                <a href="{{ route('tasks.create') }}" class="btn btn-outline-primary btn-m">
                + Task
                </a>
            @endcan
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>Task Title</th>                       
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>Due Date</th>
                        <th>Assigned By User</th>
                        <th>Assigned Project</th>
                        <th>Status</th>
                        <th>Priority</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->start_date ? $task->start_date : 'N/A' }}</td>
                        <td>{{ $task->due_date ? $task->due_date : 'N/A' }}</td>
                        <td>{{ $task->user->full_name}}</td>
                        <td>{{ $task->project->name }}</td>
                        <td><span class="badge badge-pill badge-info mb-1">{{ $task->status }}</span></td>
                        <td><span class="badge badge-pill badge-secondary">{{ $task->priority }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Pagination --}}
<div class="mt-4 d-flex justify-content-center">
    {{ $tasks->links() }}
</div>
@endsection
