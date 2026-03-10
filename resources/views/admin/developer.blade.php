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
    </form>
</div>

<!-- Main Area -->
<div class="main">
    <div class="container">

        <h2 class="title">Developers</h2>

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
                    @foreach($developers as $developer)
                    <tr>
                        <td>{{ $developer->id }}</td>
                        <td>{{ $developer->name }}</td>
                        <td>{{ $developer->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
        <center><a href="#" class="btn" onclick="openForm()">+ Create Developer</a></center>
</div>
<!-- Create project form  -->
<div id="projectModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeForm()">&times;</span>
        <h3>Create Developer</h3>
        <form action="{{ route('project.developerstore') }}" method="POST">
            @csrf
            <label>Developer Name</label>
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