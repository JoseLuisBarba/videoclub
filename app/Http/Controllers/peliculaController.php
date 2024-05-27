<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class peliculaController extends Controller
{
    //

    public function index(){
        $films = Pelicula::all();

        if($films->isEmpty()){
            $data = [
                'message' => 'No hay peliculas',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        $data = [
            'films' => $films,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request) {
        $data = $request->all();
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:pelicula',
            'year' => 'required',
            'sypnosis' => 'required',
            'author' => 'required',
            'gender' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);
        if($validator->fails()){
            $data = [
                'message' => 'Error en la validación de datos',
                'erros' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $film = $this->create($data);
        if(!$film){
            $data = [
                'message' => 'Error al crear Pelicula',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'Pelicula creada.',
            'film' => $film,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function create(array $data){
        return Pelicula::create([
            'name'=> $data['name'],
            'year'=> $data['year'],
            'sypnosis'=> $data['sypnosis'],
            'author'=> $data['author'],
            'gender'=> $data['gender'],
            'price'=> $data['price'],
            'quantity'=> $data['quantity'],
        ]);
    }

    public function show($id){
        $film = Pelicula::find($id);

        if(!$film){
            $data = [
                'message' => 'Pelicula no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'film' => $film,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id){
        $film = Pelicula::find($id);

        if(!$film){
            $data = [
                'message' => 'Pelicula no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $film->delete();
        $data = [
            'message' => 'Pelicula eliminada',
            'status' => 404
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id) {

        $film = Pelicula::find($id);

        if(!$film){
            $data = [
                'message' => 'Pelicula no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }



        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:pelicula',
            'year' => 'required',
            'sypnosis' => 'required',
            'author' => 'required',
            'gender' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);



        if($validator->fails()){
            $data = [
                'message' => 'Error en la validación de datos',
                'erros' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $film->name = $request->name;
        $film->year = $request->year;
        $film->sypnosis = $request->sypnosis;
        $film->author = $request->author;
        $film->gender = $request->gender;
        $film->price = $request->price;
        $film->quantity = $request->quantity;

        $film->save();

        $data = [
            'message' => 'Pelicula actualizada.',
            'film' => $film,
            'status' => 200
        ];
        return response()->json($data, 200);
    }


    public function get_all(){
        $data = $this->index();
        if (isset($data['films'])) {
            return view('dashboard', ['films' => $data['films']]);
        } else {
            return view('dashboard', ['message' => $data['message']]);
        }
    }
}
