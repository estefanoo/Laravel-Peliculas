@extends('layouts.app')

@section('title', 'Modificar Pelicula')

@section('content')

<main role="main" style="margin-top:100px ">

    <div class="container col-12">
        <div class="row">
            <div class="card bg-light col-md-7 p-3 mx-auto">

                <form action="/admModificarPelicula/{{$peliculas->id}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <ul style="color:red">
                        @foreach($errors->all() as $error)

                            <li>{{$error}}</li>

                        @endforeach
                    </ul>

                    <div class="form-group">
                        <label for="title">Nombre de la Pelicula:</label>
                        <input type="text" class="form-control" name="title"  value="{{ $peliculas->title }}" id="title" placeholder="pelicula..." >
                    </div>

                    <div class="form-group">
                        <label for="description">Descripcion:</label>
                        <textarea name="description" class="form-control" id="description">{{ $peliculas->description }}</textarea>
                    </div>

                    <!--//////////// ACTORES ///////////-->
                    <!--<div class="form-group">
                        <label>Actor:</label>
                        <select name="idActor" class="form-control" >
                            <option value="">Seleccione un actor</option>
                            foreach($actores as $actor)
                                <option value="//$actor->id">//$actor->first_name //$actor->last_name</option>
                            endforeach
                        </select>
                    </div>-->
                    <div class="form-group">
                        <label>Actor:</label>
                        <select name="idActor[]" class="form-control" multiple>

                            @foreach($peliculas->actores as $actor)
                            <option value="{{$actor->id}}" style="background-color: #00fdb8">{{$actor->first_name}} {{$actor->last_name}}</option>
                            @endforeach

                            @foreach($actores as $actor)
                                <option value="{{$actor->id}}">{{$actor->first_name}} {{$actor->last_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Genero:</label>
                        <select name="idGenero" class="form-control">

                            @if(($peliculas->genre_id)=== null)
                                <option value="">Seleccione un Genero</option>
                            @else
                                <option value="{{$peliculas->getGenero->id}}">{{$peliculas->getGenero->name}}</option>
                            @endif

                            @foreach($generos as $genero)
                                <option value="{{$genero->id}}">{{$genero->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="length">Duracion:</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">minutos</div>
                            </div>
                            <input type="number" name="length" value="{{ $peliculas->length }}" class="form-control" id="length" placeholder="Pon los minutos" min="0" step="0" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <div class="input-group mb-2">
                            <input type="number" name="rating" value="{{ $peliculas->rating }}" class="form-control" id="rating" placeholder="Pon un rating" min="0" step="any" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="awards">Premios Awards:</label>
                        <div class="input-group mb-2">
                            <input type="number" name="awards" value="{{ $peliculas->awards }}" class="form-control" id="awards" placeholder="Cuantos Premios Awards" min="0" step="0" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fechaEstreno">Fecha de Estreno:</label>
                        <input type="datetime-local" id="fechaEstreno" name="fechaEstreno" value="{{ date('Y-m-d\TH:i', strtotime($peliculas->release_date)) }}">
                    </div>

                    Imagen de Portada: <br>
                    <input type="file" name="imagen_portada" class="form-control">
                    <input type="hidden" name="original" value="{{$peliculas->imagen_portada}}">
                    <br>
                    <br>
                    Imagen de Background: <br>
                    <input type="file" name="imagen_background" class="form-control">
                    <input type="hidden" name="original" value="{{$peliculas->imagen_background}}">
                    <br>
                    <br>
                    <button type="submit" class="btn btn-dark px-4">
                        <i class="far fa-plus-square fa-lg mr-2"></i>
                        Modificar Pelicula
                    </button>
                    <a href="/admPeliculas" class="btn btn-outline-secondary ml-3">
                        Volver Atras
                    </a>

                </form>
        </div>
    </div>
</main>

@endsection
