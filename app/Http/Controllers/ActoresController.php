<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;
use App\Pelicula;

class ActoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actores = Actor::Paginate(5);
        return view('admActores', compact('actores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $peliculas = Pelicula::all();
        return view(
            'admAgregarActor',
            [
                'peliculas' => $peliculas
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            "last_name" => "String|required",
            "first_name" => "String|required",
            "peliculaFavorita" => "required",
            "rating"=> "Integer|required"
        ];

        $mensajes = [
            "String" => "el campo :attribute debe contener letras",
            "Integer"=> "El campo :attribute debe contener numeros",
            "required"=> "El campo :attribute no puede estar en vacio"
        ];

        $atributos =  [

            "last_name" => "Titulo",
            "first_name" => "Descripcion",
            "peliculaFavorita" => "Genero",
            "rating"=> "Premios Awards"
        ];

        $this->validate($request,$reglas, $mensajes,$atributos);

        $nuevoActor = new Actor();

        $imagenActor = 'noDisponible.jpg';
        if ($request->file('imagen_profile')) {
            $imagenActor = $request->imagen_profile->getClientOriginalName();
            $request->imagen_profile->move(public_path('img/actores'), $imagenActor);
        }

        $nuevoActor->last_name = $request['last_name'];
        $nuevoActor->first_name = $request['first_name'];
        $nuevoActor->rating = $request['rating'];
        $nuevoActor->favorite_movie_id = $request['peliculaFavorita'];
        $nuevoActor->imagen_profile = $imagenActor;
        $nuevoActor->save();


        return redirect("admActores");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actores = Actor::find($id);
        $peliculas = Pelicula::all();
        return view(
            'admModificarActor',
            [
                'actores' => $actores,
                'peliculas' => $peliculas
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reglas = [
            "last_name" => "String|required",
            "first_name" => "String|required",
            "peliculaFavorita" => "required",
            "rating"=> "Integer|required"
        ];

        $mensajes = [
            "String" => "el campo :attribute debe contener letras",
            "Integer"=> "El campo :attribute debe contener numeros",
            "required"=> "El campo :attribute no puede estar en vacio"
        ];

        $atributos =  [

            "last_name" => "Titulo",
            "first_name" => "Descripcion",
            "peliculaFavorita" => "Genero",
            "rating"=> "Premios Awards"
        ];

        $this->validate($request,$reglas, $mensajes,$atributos);

        $actorModificado = Actor::find($id);

        $imagenActor = 'noDisponible.jpg';
        if ($request->file('imagen_profile')) {
            $imagenActor = $request->imagen_profile->getClientOriginalName();
            $request->imagen_profile->move(public_path('img/actores'), imagen_profile);
        }else {
            $imagenActor = 'noDisponible.jpg';
            if(isset($_POST['original'])){
                $imagenActor = $_POST['original'];
            }
        }


        $actorModificado->last_name = $request['last_name'];
        $actorModificado->first_name = $request['first_name'];
        $actorModificado->rating = $request['rating'];
        $actorModificado->favorite_movie_id = $request['peliculaFavorita'];
        $actorModificado->imagen_profile = $imagenActor;
        $actorModificado->save();


        return redirect("admActores");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrarActor = Actor::find($id);

        $borrarActor->delete();

        return redirect("admActores");
    }
}
