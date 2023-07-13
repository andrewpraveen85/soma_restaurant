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
                        <a class="nav-link" href="{{ route('reports.daily', date('Y-m-d')) }}">Daily Sales Revenue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reports.famous') }}">Top Selling Dish</a>
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
            <form method="POST" action="{{ route('order.item.create') }}">
                @csrf
                <div class="row">
                    <div class="col-md-3">Select Menu</div>
                    <div class="col-md-9">
                        <select id="order-item"  name="order-item" >
                            <optgroup label="Main Dish">
                                @foreach ($main as $key => $value)
                                    <option value="{{ $value->id }}"> 
                                        {{ $value->menu_name }} 
                                    </option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Side Dish">
                                @foreach ($side as $key => $value)
                                    <option value="{{ $value->id }}"> 
                                        {{ $value->menu_name }} 
                                    </option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Desserts">
                                @foreach ($dessert as $key => $value)
                                    <option value="{{ $value->id }}"> 
                                        {{ $value->menu_name }} 
                                    </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <button type="submit" class="btn btn-dark btn-block">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    @yield('content')
</body>
</html>
