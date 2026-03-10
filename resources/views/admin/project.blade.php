<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<!-- Sidebar -->
<div class="sidebar">
    <div class="logo">Admin</div>
    <div class="menu">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.developer') }} ">Developer</a>
        <a href="{{ route('admin.client') }}">Client</a>
        <a href="{{ route('admin.project') }}">Project</a>
        <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
    </div>
</div>

<!-- Main Area -->
<div class="main">
    <div class="container">

        <h2 class="title">Projects</h2>
            <form method="GET" action="{{ route('admin.project') }}">
                <input type="text" name="search" placeholder="Search project">
                <button type="submit">Search</button>
            </form>
        <div class="card">
            <table class="dev-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Developer</th>
                        <th>Client</th>
                        <th>Status</th>
                        <th>Created_at</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->developer?->name }}</td>
                        <td>{{ $project->client?->name }}</td>
                        <td>{{ $project->status }}</td>
                        <td>{{ $project->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
        <center><a href="#" class="btn" onclick="openForm()">+ Create Project</a></center>
</div>
<!-- Create project form  -->

<div id="projectModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeForm()">&times;</span>
        <h3>Create Project</h3>
        <form action="{{ route('project.store') }}" method="POST">
            @csrf
            <label>Project Name</label>
            <input type="text" name="title" required>
            <label>Description</label>
            <textarea name="description"></textarea>
            <label>Select Developer</label>
            <select name="developer_id" required>
                <option value="">Select Developer</option>
                @foreach($developers as $developer)
                <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                @endforeach
            </select>
            <label>Select Client</label>
            <select name="client_id" required>
                <option value="">Select Client</option>
                @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
            <br><br>
            <button type="submit" class="btn">Create</button>
        </form>

    </div>
</div>

<script>
    function openForm(){
    document.getElementById("projectModal").style.display="block";
    }

    function closeForm(){
    document.getElementById("projectModal").style.display="none";
    }
</script>

</body>
</html>