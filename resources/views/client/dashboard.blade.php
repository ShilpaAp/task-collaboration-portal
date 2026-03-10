<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<!-- Sidebar -->
<div class="sidebar">
    <div class="logo">Client Dashboard</div>
    <div class="menu">
        <a href="{{ route('client.dashboard') }}">Project</a>
        <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
    </div>
</div>

<!-- Main Area -->
<div class="main">
    <div class="container">

        <h2 class="title">My Projects</h2>
        <div class="card">
            <table class="dev-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Developer Notes</th>
                        <th>Attachments</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->status }}</td>
                        <td>
                            @if($project->updates->count())
                                {{ $project->updates->last()->note }}
                            @else
                                No update
                            @endif
                        </td>
                        <td>
                            @if($project->updates->count() && $project->updates->last()->attachment)
                                <img src="{{ asset('uploads/'.$project->updates->last()->attachment) }}" width="80">
                            @else
                                No file
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>