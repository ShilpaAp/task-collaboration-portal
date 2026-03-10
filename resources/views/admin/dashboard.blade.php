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
        <a href="#">Dashboard</a>
        <a href="{{ route('admin.developer') }} ">Developer</a>
        <a href="{{ route('admin.client') }}">Client</a>
        <a href="{{ route('admin.project') }}">Project</a>
        <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
    </div>
</div>

<!-- Main Area -->
<div class="main">
    <div class="container">
        <h2>Admin Dashboard</h2>
        <div class="card">
            Welcome to Dashboard
        </div>
    </div>
</div>
</body>
</html>