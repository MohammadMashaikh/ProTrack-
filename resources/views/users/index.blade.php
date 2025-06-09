@extends('layouts.header')

@section('content')
<div class="py-4 m-5">
    <h1 class="h4 text-primary mb-4 font-weight-bold">List Of All Users</h1>

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h6 text-primary mb-0">User Table</h2>
            @can('manage.users')
                <a href="{{ route('users.create') }}" class="btn btn-outline-primary btn-m">
                + User
                </a>
            @endcan
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>Full Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Projects</th>
                        <th>Tasks</th>
                        <th>Clients</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personnels as $personnel)
                    <tr>
                        <td>{{ $personnel->full_name ?? $personnel->first_name }}</td>
                        <td>{{ $personnel->role }}</td>
                        <td>{{ $personnel->email }}</td>

                        {{-- Projects --}}
                        <td>
                            @forelse ($personnel->projects->take(3) as $project)
                                <span class="badge badge-pill badge-primary mb-1">{{ $project->name }}</span>
                            @empty
                                <span class="text-muted">N/A</span>
                            @endforelse

                               @if ($personnel->projects->count() > 3)
                                <span class="badge badge-pill badge-secondary">
                                    +{{ $personnel->projects->count() - 3 }} more
                                </span>
                            @endif
                        </td>

                        {{-- Tasks --}}
                        <td>
                            @forelse ($personnel->tasks->take(3) as $task)
                                <span class="badge badge-pill badge-danger mb-1">{{ $task->name }}</span>
                            @empty
                                <span class="text-muted">N/A</span>
                            @endforelse

                                @if ($personnel->tasks->count() > 3)
                                <span class="badge badge-pill badge-secondary">
                                    +{{ $personnel->tasks->count() - 3 }} more
                                </span>
                            @endif
                        </td>

                        {{-- Clients --}}
                        <td>
                            @forelse ($personnel->clients->take(3) as $client)
                                <span class="badge badge-pill badge-info mb-1">{{ $client->company_name }}</span>
                            @empty
                                <span class="text-muted">N/A</span>
                            @endforelse

                            @if ($personnel->clients->count() > 3)
                                <span class="badge badge-pill badge-secondary">
                                    +{{ $personnel->clients->count() - 3 }} more
                                </span>
                            @endif
                        </td>

                        {{-- Status --}}
                        <td>
                            @if ($personnel->status === 'Active')
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Pagination --}}
<div class="mt-4 d-flex justify-content-center">
    {{ $personnels->links() }}
</div>
@endsection
