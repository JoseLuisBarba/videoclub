<!DOCTYPE html>
<html>
<head>
    <title>VideoClub</title>
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

    <div class="container mt-5">
        <h2>Agregar Película</h2>
        <form method="POST" action="/catalog/add">
            @csrf
            <div class="form-group mb-2">
                <label for="name">Nombre de la película</label>
                <input type="text" class="form-control" name="name" placeholder="Movie Name">
            </div>

            <div class="form-group mb-2">
                <label for="year">Año</label>
                <input type="number" class="form-control" name="year" placeholder="2024">
            </div>

            <div class="form-group mb-2">
                <label for="gender">Género</label>
                <input type="text" class="form-control" name="gender" placeholder="Acción">
            </div>

            <div class="form-group mb-2">
                <label for="author">Director</label>
                <input type="text" class="form-control" name="author" placeholder="Cameron">
            </div>

            <div class="form-group mb-2">
                <label for="price">Precio</label>
                <input type="number" step="0.01" class="form-control" name="price" placeholder="12.00">
            </div>

            <div class="quantity">
                <label for="exampleInputPassword1">Cantidad</label>
                <input type="number" class="form-control" name="quantity" placeholder="4">
            </div>

            <div class="form-group mb-2">
                <label for="sypnosis">Sinopsis</label>
                <textarea class="form-control" name="sypnosis" rows="5" placeholder="Enter movie synopsis"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">+ Agregar</button>
        </form>
    </div>


    <div class="container mt-5">
        <h2>Mis películas</h2>
        <div class="container d-flex flex-wrap align-items-center">
                @foreach ($films as $film)
                    <div class="card " style="width: 18rem;">
                        <img class="card-img-top" src="https://th.bing.com/th/id/OIP.QIT1Rik7ad15fXQlAPU7CwHaEK?rs=1&pid=ImgDetMain" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$film->name}}</h5>
                                <p class="card-text">{{$film->sypnosis}}</p>
                            </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">id: {{ $film->id }}</li>
                                    <li class="list-group-item">Año: {{ $film->year }}</li>
                                    <li class="list-group-item">Género: {{ $film->gender }}</li>
                                    <li class="list-group-item">Director: {{ $film->author }}</li>
                                    <li class="list-group-item">Precio: {{ $film->price }}</li>
                                    <li class="list-group-item">Cantidad: {{ $film->quantity }}</li>
                                </ul>
                            <div class="card-body">
                                <a href="/catalog/edit/{{ $film->id }}" class="card-link">Editar</a>
                                <a href="/catalog/delete/{{ $film->id }}" class="card-link">Eliminar</a>
                            </div>
                    </div>
                @endforeach
        </div>            
    </div>    
</body>

</html>


