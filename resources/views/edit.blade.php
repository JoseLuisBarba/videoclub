<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>VideoClub editar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
    </head>
    <body>
        <div class="container mt-5">
            <form method="POST" action="/catalog/update/{{$film->id}}">
                @csrf
                <div class="form-group mb-2">
                    <label for="name">Nombre de la película</label>
                    <input type="text" class="form-control" name="name" placeholder="Movie Name" value="{{$film->name}}">
                </div>
    
                <div class="form-group mb-2">
                    <label for="year">Año</label>
                    <input type="number" class="form-control" name="year" placeholder="2024" value="{{$film->year}}">
                </div>
    
                <div class="form-group mb-2">
                    <label for="gender">Género</label>
                    <input type="text" class="form-control" name="gender" placeholder="Acción" value="{{$film->gender}}">
                </div>
    
                <div class="form-group mb-2">
                    <label for="author">Director</label>
                    <input type="text" class="form-control" name="author" placeholder="Cameron" value="{{$film->author}}">
                </div>
    
                <div class="form-group mb-2">
                    <label for="price">Precio</label>
                    <input type="number" step="0.01" class="form-control" name="price" placeholder="12.00" value="{{$film->price}}">
                </div>
    
                <div class="quantity">
                    <label for="exampleInputPassword1">Cantidad</label>
                    <input type="number" class="form-control" name="quantity" placeholder="4" value="{{$film->quantity}}">
                </div>
    
                <div class="form-group mb-2">
                    <label for="sypnosis">Sinopsis</label>
                    <textarea class="form-control" name="sypnosis" rows="5" placeholder="Enter movie synopsis" value="{{$film->sypnosis}}"></textarea>
                </div>


                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </body>
</html>