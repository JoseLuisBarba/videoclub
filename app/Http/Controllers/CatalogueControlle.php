<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\peliculaController;
use App\Models\Pelicula;
class CatalogueControlle extends Controller
{
    //
    private $peliculaController;

    public function __construct(peliculaController $peliculaController)
    {
        $this->peliculaController = $peliculaController;
    }
    public function index(){
        $filmsResponse = $this->peliculaController->index();
        $films = $filmsResponse->getData()->films;
        return  view('dashboard')->with("films",$films);
    }

    public function add(Request $req) {
        $this->peliculaController->store($req);
        return redirect()->back();
    }

    public function edit(Request $req){
        $filmsResponse = $this->peliculaController->show($req->id);
        $film = $filmsResponse->getData()->film;
        return view('edit')->with("film",$film);
    }

    public function update(Request $req, $id){
        $filmsResponse = $this->peliculaController->update($req,$id);
        return redirect()->back();
    }

    public function delete($id){
        $this->peliculaController->destroy($id);
        return redirect()->back();
    }

    
}
