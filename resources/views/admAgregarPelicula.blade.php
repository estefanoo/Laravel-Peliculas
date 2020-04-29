@extends('layouts.app')

@section('title', 'Agregar Pelicula')

@section('content')
    <main class="role mb-4" style="margin-top:100px">
        <div class="container">
            <div class="row">
                <div class="card bg-light col-md-7 mt-5 p-3 mx-auto">
                    <form action="/admAgregarPelicula" method="post" enctype="multipart/form-data">
                        @csrf

                        <ul style="color:red">
                            @foreach($errors->all() as $error)

                                <li>{{$error}}</li>

                            @endforeach
                        </ul>

                        <div class="form-group">
                            <label for="title">Nombre de la Pelicula:</label>
                            <input type="text" class="form-control" name="title"  value="{{ old('title') }}" id="title" placeholder="pelicula..." >
                        </div>

                        <div class="form-group">
                            <label for="description">Descripcion:</label>
                            <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
                        </div>

                            <!--//////////// ACTORES ///////////-->
                        <div class="form-group">
                            <label>Actor:</label>
                            <select name="idActor[]" class="form-control" multiple>
                                @foreach($actores as $actor)
                                    <option value="{{$actor->id}}">{{$actor->first_name}} {{$actor->last_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Genero:</label>
                            <select name="idGenero" class="form-control" >
                                <option value="">Seleccione un genero</option>
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
                                <input type="number" name="length" value="{{ old('length') }}" class="form-control" id="length" placeholder="Pon los minutos" min="0" step="0" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <div class="input-group mb-2">
                                <input type="number" name="rating" value="{{ old('rating') }}" class="form-control" id="rating" placeholder="Pon un rating" min="0" step="any" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="awards">Premios Awards:</label>
                            <div class="input-group mb-2">
                                <input type="number" name="awards" value="{{ old('awards') }}" class="form-control" id="awards" placeholder="Cuantos Premios Awards" min="0" step="0" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fechaEstreno">Fecha de Estreno:</label>
                            <input type="datetime-local" id="fechaEstreno" name="fechaEstreno" >
                        </div>

                        Imagen de Portada: <br>
                        <input type="file" name="imagen_portada" class="form-control">
                        <br>
                        Imagen de Background: <br>
                        <input type="file" name="imagen_background" class="form-control">
                        <br>
                        <button type="submit" class="btn btn-dark px-4">
                            <i class="far fa-plus-square fa-lg mr-2"></i>
                            Agregar Pelicula
                        </button>
                        <a href="/admPeliculas" class="btn btn-outline-secondary ml-3">
                            Volver Atras
                        </a>


                    </form>
                </div>
            </div>
        </div>
    </main>

    <script type="text/javascript">
        $(".form_datetime").datetimepicker({
            format: "dd MM yyyy - hh:ii"
        });
    </script>

@endsection
