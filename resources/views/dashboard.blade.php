<!DOCTYPE html>
<html>
<head>
    <title>Custom Auth in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand"  style="color:#777"><span style="font-size:15pt">&#9820;</span> Videoclub</a>
    
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            @if( true || Auth::check() )
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @guest
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                                    Iniciar Sesión
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register-user') }}">
                                    Registrar
                                </a>
                            </li>
                        </ul>
                    @else    
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item {{ Request::is('catalog') && ! Request::is('catalog/create')? 'active' : ''}}">
                                <a class="nav-link" href="{{url('/catalog')}}">
                                    <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                                    Catálogo
                                </a>
                            </li>
                            <li class="nav-item {{  Request::is('catalog/create') ? 'active' : ''}}">
                                <a class="nav-link" href="{{url('/catalog/create')}}">
                                    <span>&#10010</span> Nueva película
                                </a>
                            </li>
                        </ul>
    
                        <ul class="navbar-nav navbar-right">
                            <li class="nav-item">
                                    
                                    <a href="{{ route('signout') }}" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                        Cerrar sesión
                                    </a>
                                </form>
                            </li>
                        </ul>
                    @endguest
                </div>
            @endif
        </div>
    </nav>

    
</body>

</html>


