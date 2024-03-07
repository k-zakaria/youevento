<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Login</title>

</head>
<style>
    .navbar-brand {
        color: #339898;
        font-weight: bold;
    }

    .navbar-nav {
        margin-left: auto;
    }

    .card {
        margin-bottom: 20px;
        border: 1px solid #dddfe2;
        border-radius: 8px;
        background-color: #fff;
    }

    .card-header {
        background-color: #f0f2f5;
        border-bottom: none;
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-weight: bold;
    }

    .card-text {
        margin-bottom: 15px;
    }

    .form-control {
        border-radius: 20px;
    }

    .btn-primary,
    .btn-danger,
    .btn-info {
        border-radius: 20px;
        margin-right: 10px;
    }

    #namecmnt {
        font-weight: bold;
    }
</style>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
        <div class="container">
            <a class="navbar-brand" href="#" style="color: #141f38;"><span style="color: #023071;" class="nav-brand-two">You</span>Evento</a> <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @if(Auth::check())
                        <div class="dropdown d-flex">
                            <a href="#" class="dropdown-toggle nav-link   navigation " id="notificationsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu dropdown-menu-end text-small shadow dropdown__list" aria-labelledby="notificationsDropdown">
                                <li><a class="dropdown-item" href="##">Profil</a></li>
                                <li>
                                    <form action="/delete-account/{{ Auth::id() }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="dropdown-item">Delete my account</button>
                                    </form>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('user.logout') }}">Sign out</a></li>
                            </ul>
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link ml-5 navigation" href="{{ route('user.register') }}">Register</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link ml-5 navigation" href="{{ route('user.login') }}">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>