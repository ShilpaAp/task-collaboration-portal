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

        <h2 class="title">Clients</h2>

        <div class="card">
            <table class="dev-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
        <center><a href="#" class="btn" onclick="openForm()">+ Create Client</a></center>
</div>
<!-- Create project form  -->
<div id="projectModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeForm()">&times;</span>
        <h3>Create Client</h3>
        <form action="{{ route('project.clientstore') }}" method="POST">
            @csrf
            <label>Client Name</label>
            <input type="text" name="name" required>
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="text" name="password" required>
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

</div>
</body>
</html>