<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelicula;
use App\Genero;
use App\Actor;

class PeliculasController extends Controller
{
    public function peliculasAleatorias() {

        $peliculas = Pelicula::inRandomOrder()->take(5)->get();
        $olds = Pelicula::orderBy('release_date', 'ASC')->oldest()->take(5)->get();
        return view('index', compact('peliculas'), compact('olds'));
    }

    public function mostrarTitulos(Request $request) {
        $movies = Pelicula::all();
        $nombrePelicula = $request->get('buscador');
        $peliculas = Pelicula::where('title','LIKE', "%$nombrePelicula%")->Paginate(6);
        return view('titulos', compact('peliculas'),compact('movies'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas= Pelicula::Paginate(5);
        return view('admPeliculas', compact('peliculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $actores = Actor::all();
        $generos = Genero::all();
        return view(
            'admAgregarPelicula',
            [
                'actores' => $actores,
                'generos' => $generos
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
            "title" => "String|min:3|unique:movies,title|required",
            "description" => "String|min:0|required",
            "idGenero" => "required",
            "length" => "Integer|required",
            "rating" => "numeric|required",
            "awards"=> "Integer|required",
            "fechaEstreno" => "required",
        ];


        $mensajes = [
            "String" => "el campo :attribute debe contener letras",
            "Integer"=> "El campo :attribute debe contener numeros",
            "min"=> "el campo :attribute debe tener minimo :min caracteres",
            "max"=> "el campo :attribute debe tener minimo :max caracteres",
            "unique"=> "el campo :attribute con el nombre que ingreso ya existe",
            "required"=> "El campo :attribute no puede estar en vacio"
        ];

        $atributos =  [

            "title" => "Titulo",
            "description" => "Descripcion",
            "idGenero" => "Genero",
            "length" => "Duracion",
            "rating" => "Rating",
            "awards"=> "Premios Awards",
            "fechaEstreno" => "Fecha Estreno"
        ];

        $this->validate($request,$reglas, $mensajes,$atributos);

        $imagenPortada = 'pochoclo.jpg';
        if ($request->file('imagen_portada')) {
            $imagenPortada = $request->imagen_portada->getClientOriginalName();
            $request->imagen_portada->move(public_path('img'), $imagenPortada);
        }

        $imagenBackground = 'pochoclo.jpg';
        if ($request->file('imagen_background')) {
            $imagenBackground = $request->imagen_background->getClientOriginalName();
            $request->imagen_background->move(public_path('img'), $imagenBackground);
        }

        $peliculas = Pelicula::create([
            'title' => $request->title,
            'description' => $request->description,
            'genre_id' => $request->idGenero,
            'length' => $request->length,
            'rating' => $request->rating,
            'awards' => $request->awards,
            'release_date' => $request->fechaEstreno,
            'imagen_portada' => $imagenPortada,
            'imagen_background' => $imagenBackground
        ]);

        $peliculas->Actores()->sync($request->idActor);
        return redirect("admPeliculas");

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
        //
        $peliculas = Pelicula::find($id);
        $actores = Actor::all();
        $generos = Genero::all();
        return view(
            'admModificarPelicula',
            [
                'peliculas' => $peliculas,
                'actores' => $actores,
                'generos' => $generos
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
        //
        $reglas = [
            "title" => "String|min:3|required",
            "description" => "String|min:0|required",
            "idGenero" => "required",
            "length" => "Integer|required",
            "awards"=> "Integer|required",
            "fechaEstreno" => "required",
        ];

        $mensajes = [
            "String" => "el campo :attribute debe contener letras",
            "Integer"=> "El campo :attribute debe contener numeros",
            "min"=> "el campo :attribute debe tener minimo :min caracteres",
            "max"=> "el campo :attribute debe tener minimo :max caracteres",
            "unique"=> "el campo :attribute con el nombre que ingreso ya existe",
            "required"=> "El campo :attribute no puede estar en vacio"
        ];

        $atributos =  [

            "title" => "Titulo",
            "description" => "Descripcion",
            "idGenero" => "Genero",
            "length" => "Duracion",
            "awards"=> "Premios Awards",
            "fechaEstreno" => "Fecha Estreno"
        ];

        $this->validate($request,$reglas, $mensajes,$atributos);

        if ($request->file('imagen_portada')) {
            $imagenPortada = $request->imagen_portada->getClientOriginalName();
            $request->imagen_portada->move(public_path('img'), $imagenPortada);
        }else {
            $imagenPortada = 'pochoclo.jpg';
            if(isset($_POST['original'])){
                $imagenPortada = $_POST['original'];
            }
        }

        if ($request->file('imagen_background')) {
            $imagenBackground = $request->imagen_background->getClientOriginalName();
            $request->imagen_background->move(public_path('img'), $imagenBackground);
        }else {
            $imagenBackground = 'pochoclo.jpg';
            if(isset($_POST['original'])){
                $imagenBackground = $_POST['original'];
            }
        }


        //$nuevaPelicula->Actores()->actor_id = $request['idActor'];

        $peliculaModificada = Pelicula::find($id);
        $peliculas =[
            'title' => $request->title,
            'description' => $request->description,
            'genre_id' => $request->idGenero,
            'length' => $request->length,
            'rating' => $request->rating,
            'awards' => $request->awards,
            'release_date' => $request->fechaEstreno,
            'imagen_portada' => $imagenPortada,
            'imagen_background' => $imagenBackground
        ];

        $peliculaModificada->Actores()->sync($request->idActor);
        $peliculaModificada->update($peliculas);
        return redirect("admPeliculas");



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $borrarPelicula = Pelicula::find($id);
        $borrarPelicula->Actores()->detach();
        $borrarPelicula->delete();

        return redirect("admPeliculas");
    }



    // API DE PELICULAS //
    public function peliculasAPI(){
        $peliculas = Pelicula::all();
        return json_encode($peliculas);
    }
}
