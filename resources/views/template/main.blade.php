<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">BookApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('books.index') }}">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/library') }}">My Library</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Community</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('profile.index') }}" class="nav-link">Profile</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex"> <!-- Use d-flex for flexbox alignment -->
                <ul class="navbar-nav">
                    @if (Auth::check())
                        <li>
                            <form method="post" action="{{ route('auth.logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('registration.index') }}" class="nav-link">Register</a>
                        </li>
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @if (session('error'))
        <div class="alert alert-danger mt-3" role="alert" style="max-width: 80%; margin: 20px auto;">
            {{ session('error') }}
        </div>
    @endif
    @if ( session('success'))
        <div class="alert alert-success" role ="alert" style="max-width: 80%; margin: 20px auto;">
            {{ session('success')}}
        </div>
    @endif
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>