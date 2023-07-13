<!DOCTYPE html>
<html>
<head>
    <title>Custom Auth in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="{{ route('dashboard') }}">System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reports') }}">Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('order.create') }}">Create New Order</a>
                </div>
            </div>
            <table id="showBooksIn" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Order Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($orders as $row)
                <tr>
                    <td>{{$row['id']}}</td>
                    <td>{{$row['order_total']}}</td>
                    <td><a href="{{ route('order.view', $row['id']) }}">View</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </main>
    @yield('content')
</body>
</html>
