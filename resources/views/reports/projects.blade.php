<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Projects Report</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 5px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2>Projects Report</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Project</th>
                <th>Client</th>
                <th>Status</th>
                <th>Tasks Count</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $index => $project)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $project->name }}</td>
                    <td>
                        @if($project->clients->isNotEmpty())
                            {{ $project->clients->pluck('company_name')->join(', ') }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ ucfirst($project->status) }}</td>
                    <td>{{ $project->tasks->count() }}</td>
                    <td>{{ $project->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
