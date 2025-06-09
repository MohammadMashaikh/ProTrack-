@extends('layouts.header')

@section('content')
<div class="py-4 m-5">
    <h1 class="h4 text-primary mb-4 font-weight-bold">List Of All Projects</h1>

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h6 text-primary mb-0">Project Table</h2>
            @can('manage.projects')
                <a href="{{ route('projects.create') }}" class="btn btn-outline-primary btn-m">
                + Project
                </a>
            @endcan
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>Project Name</th>                       
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Assigned User</th>
                        <th>Assigned Clients</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->start_date ? $project->start_date : 'N/A' }}</td>
                        <td>{{ $project->end_date ? $project->start_date : 'N/A' }}</td>
                        <td>{{ $project->user->full_name }}</td>
                        <td>
                        @forelse ($project->clients->take(3) as $client)
                        <span class="badge badge-pill badge-info mb-1">{{ $client->company_name }}</span>
                           @empty
                                <span class="text-muted">N/A</span>
                            N/A
                        @endforelse
                        
                           @if ($project->clients->count() > 3)
                                <span class="badge badge-pill badge-secondary">
                                    +{{ $project->clients->count() - 3 }} more
                                </span>
                            @endif
                        </td>

                        <td>{{ $project->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Pagination --}}
<div class="mt-4 d-flex justify-content-center">
    {{ $projects->links() }}
</div>
@endsection
