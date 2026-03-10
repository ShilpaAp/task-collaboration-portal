<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<!-- Sidebar -->
<div class="sidebar">
    <div class="logo">Developer Dashboard</div>
    <div class="menu">
        <a href="{{ route('developer.dashboard') }}">Project</a>
        <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
    </div>
</div>

<!-- Main Area -->
<div class="main">
    <div class="container">

        <h2 class="title">Assigned Projects</h2>

        <div class="card">
            <table class="dev-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created_at</th>
                        <th>Notes & Attachments</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->description }}</td>
                        <td>
                        <form action="{{ route('project.status.update',$project->id) }}" method="POST">
                        @csrf
                        <select name="status" onchange="this.form.submit()">
                        <option value="Pending" {{ $project->status=='Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="In Progress" {{ $project->status=='In Progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="Completed" {{ $project->status=='Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        </form>
                        </td>
                        <td>{{ $project->created_at }}</td>
                        <td>
                            <form action="{{ route('project.update.store',$project->id) }}" method="POST" 
                            enctype="multipart/form-data">
                            @csrf
                            <textarea name="note" placeholder="Progress note"></textarea><br><br>
                            <input type="file" name="attachment"><br><br>
                            <button type="submit">Save Update</button>
                            </form>
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