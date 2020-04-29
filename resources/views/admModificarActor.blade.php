@extends('layouts.app')

@section('title', 'Modificar Actor')

@section('content')
<main class="role" style="margin-top:100px ">
    <div class="container">
        <div class="row">
            <div class="alert bg-light py-3 mx-auto col-8">
                <form action="/admModificarActor/{{$actores->id}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <ul style="color:red">
                        @foreach($errors->all() as $error)

                            <li>{{$error}}</li>

                        @endforeach
                    </ul>

                    <div class="form-group">
                        <label for="last_name">Apellido:</label>
                        <input type="text" class="form-control" name="last_name"  value="{{ $actores->last_name}}" id="last_name" placeholder="apellido" >
                    </div>

                    <div class="form-group">
                        <label for="first_name">Nombre:</label>
                        <input type="text" class="form-control" name="first_name"  value="{{ $actores->first_name }}" id="last_name" placeholder="Nombre" >
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <div class="input-group mb-2">
                            <input type="number" name="rating" value="{{ $actores->rating }}" class="form-control" id="rating" placeholder="Pon un rating" min="0" step="0" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label>pelicula Favorita:</label>
                        <select name="peliculaFavorita" class="form-control" >
                            @if(($actores->favorite_movie_id)=== null)
                                <option value="">Seleccione un Genero</option>
                            @else
                                <option value="{{$actores->getPeliculaFavorita->id}}">{{$actores->getPeliculaFavorita->title}}</option>
                            @endif
                            @foreach($peliculas as $pelicula)
                                <option value="{{$pelicula->id}}">{{$pelicula->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    Imagen de Actor: <br>
                    <input type="file" name="imagen_profile" class="form-control">
                    <input type="hidden" name="original" value="{{$actores->imagen_profile}}">
                    <br>

                    <button type="submit" class="btn btn-dark  col-sm-12 col-md-4 col-lg-4">
                        Modificar Actor
                    </button>
                    <br class="d-lg-none d-md-none">
                    <a href="/admActores" class="btn btn-outline-secondary col-sm-12 col-md-4 col-lg-4 my-2" >
                        Volver Atras
                    </a>

                </form>

            </div>
        </div>
    </div>
</main>
@endsection
