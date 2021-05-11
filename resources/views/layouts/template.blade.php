<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('css/custom-nav.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js/custom-nav.js')}}"></script>
    <title>Document</title>
    <script>
        $(function() {
            $('.delay').on('click', function(e) {
                e.preventDefault();
                var self = this;
                setTimeout(function() {
                    window.location.href = self.href;
                }, 1000);
            });
        });
    </script>
</head>
<nav class="navbar navbar-expand-custom navbar-mainbg">
    <a class="navbar-brand navbar-logo" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto">
            <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
            <li class="nav-item active">
                <a class="nav-link delay" href="/"><i class="fas fa-home"></i>Home Page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link delay" href="/admin"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <li class="nav-item" id="books">
                <a class="nav-link delay" href="{{route('books.create')}}"><i class="fas fa-book"></i>Aggiungi Libro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link delay" href="javascript:void(0);"><i class="far fa-calendar-alt"></i>Prestiti</a>
            </li>
            <li class="nav-item">
                <a class="nav-link delay" href="javascript:void(0);"><i class="fas fa-signature"></i>Aggiungi un autore</a>
            </li>
            <li class="nav-item">
                <a class="nav-link delay" href="javascript:void(0);"><i class="far fa-chart-bar"></i>Charts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link delay" href="javascript:void(0);"><i class="far fa-copy"></i>Documents</a>
            </li>
        </ul>
        <ul class="ml-auto mr-md-5">
            @guest<li class="nav-item" id="loginazzo">
                <a class="nav-link delay" href="/login"><i class="far fa-copy"></i>Registrati / Login</a>
            </li>@endguest
            @auth<li class="nav-item" id="loginazzo">
                <a class="nav-link delay" href="/logout"><i class="far fa-copy"></i>Logout</a>
            </li>@endauth
        </ul>
    </div>
</nav>
<body>
@yield('content')
</body>
</html>
