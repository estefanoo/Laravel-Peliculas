@extends('layouts.app')

@section('title', 'Agregar Actor')

@section('content')
<main class="role" style="margin-top:100px ">
    <div class="container">
        <div class="row">
            <div class="card bg-light col-md-7 mt-5 p-3 mx-auto mb-4">
                <form action="/admAgregarActor" method="post" enctype="multipart/form-data">
                    @csrf

                    <ul style="color:red">
                        @foreach($errors->all() as $error)

                        <li>{{$error}}</li>

                        @endforeach
                    </ul>

                    <div class="form-group">
                        <label for="last_name">Apellido:</label>
                        <input type="text" class="form-control" name="last_name"  value="{{ old('last_name') }}" id="last_name" placeholder="Apellido" >
                    </div>

                    <div class="form-group">
                        <label for="first_name">Nombre:</label>
                        <input type="text" class="form-control" name="first_name"  value="{{ old('first_name') }}" id="last_name" placeholder="Nombre" >
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <div class="input-group mb-2">
                            <input type="number" name="rating" value="{{ old('rating') }}" class="form-control" id="rating" placeholder="Pon un rating" min="0" step="0" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label>pelicula Favorita:</label>
                        <select name="peliculaFavorita" class="form-control" >
                            <option value="">Seleccione una pelicula</option>
                            @foreach($peliculas as $pelicula)
                                <option value="{{$pelicula->id}}">{{$pelicula->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    Imagen de Actor: <br>
                    <input type="file" name="imagen_profile" class="form-control">

                    <br>

                    <button type="submit" class="btn btn-dark px- col-sm-12 col-md-4 col-lg-4">
                        Agregar Actor
                    </button>
                    <br class="d-lg-none d-md-none">
                    <a href="/admin/admMarcas" class="btn btn-outline-secondary col-sm-12 col-md-4 col-lg-4 my-2" >
                        Volver Atras
                    </a>

                </form>

            </div>
        </div>
    </div>
</main>

@endsection
