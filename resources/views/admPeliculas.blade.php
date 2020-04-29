@extends('layouts.app')

@section('title', 'Administrador de Peliculas')

@section('content')

    <main role="main" style="margin-top:100px ">
        <div class="container col-sm-12 col-md-12 col-lg-12 ">
            <div class="row justify-content-center">
                <table class="table table-stripped table-hover table-responsive">
                    <thead class="thead-dark">
                    <tr>
                        <th>Nombre Pelicula</th>
                        <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Descripcion</th>
                        <th class="d-none d-lg-table-cell">Actores</th>
                        <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Genero</th>
                        <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Duracion</th>
                        <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Rating</th>
                        <th class="d-none d-sm-none d-md-table-cell d-lg-none d-xl-table-cell">Premios Awards</th>
                        <th class="d-none d-lg-table-cell">Fecha Estreno</th>
                        <th class="d-none d-lg-table-cell">Imagen</th>
                        <th class="d-none d-lg-table-cell">Imagen-bg</th>

                        <!--///// boton "agregar" /////-->
                        <th colspan="2" class="text-center">
                            <a href="admAgregarPelicula" class="btn btn-outline-light px-4">
                                <i class="far fa-plus-square fa-lg mr-2"></i>
                                agregar
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <!--///// Datos de las Peliculas /////-->

                        @foreach($peliculas as $pelicula)
                            <tr>
                                <td>{{$pelicula->title}}</td>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$pelicula->description}}</td>


                                <td class="d-none d-lg-table-cell">
                                    <ul>
                                        @foreach($pelicula->actores as $actor)
                                             <li>
                                                 {{$actor->last_name}}
                                                 {{$actor->first_name}}
                                             </li>
                                         @endforeach
                                    </ul>
                                </td>

                                @if(!empty($pelicula->getGenero->name))
                                    <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$pelicula->getGenero->name}}</td>
                                @else
                                    <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">No hay Genero</td>
                                @endif

                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$pelicula->length}}</td>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$pelicula->rating}}</td>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-none d-xl-table-cell">{{$pelicula->awards}}</td>
                                <td class="d-none d-lg-table-cell">{{$pelicula->release_date}}</td>

                                <td class="d-none d-lg-table-cell">
                                    <img src="img/{{ $pelicula->imagen_portada}}" style="width:100px;height:100px;">
                                </td>
                                <td class="d-none d-lg-table-cell">
                                    <img src="img/{{ $pelicula->imagen_background}}" style="width:100px;height:100px;">
                                </td>

                                <!--///// boton "modificar" /////-->
                                <td class="d-none d-sm-none d-md-none d-lg-none d-xl-table-cell">
                                    <a href="admModificarPelicula/{{ $pelicula->id }}" class="btn btn-outline-secondary px-4">
                                        <i class="far fa-edit fa-lg mr-2"></i>
                                        Modificar
                                    </a>
                                </td>

                                <!--///// boton "DETALLES" /////-->
                                <td class=" d-sm-table-cell d-md-table-cell d-lg-table-cell d-xl-none">
                                    <a href="" class="btn btn-outline-secondary px-4" data-toggle="modal" data-target="#exampleModalLong{{ $pelicula->id }}">
                                        <i class="far fa-edit fa-lg mr-2"></i>
                                        Detalles
                                    </a>
                                </td>

                                <!--///// boton "DETALLES" - modal contenido /////-->
                                <div class="modal fade" id="exampleModalLong{{ $pelicula->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content border-dark">
                                            <div class="modal-header">
                                                <h3 class="col-12 modal-title text-center" id="exampleModalLongTitle">Detalles</h3>
                                            </div>
                                            <div class="col-12 modal-body">

                                                <ul class="list-group">
                                                    <li class="list-group-item">Pelicula: {{$pelicula->title}}</li>
                                                    <li class="list-group-item">Descripcion: {{$pelicula->description}}</li>
                                                    <li class="list-group-item">Actores:
                                                        <ul>
                                                            @foreach($pelicula->actores as $actor)
                                                                <li>
                                                                    {{$actor->last_name}}
                                                                    {{$actor->first_name}}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    <li class="list-group-item">Duracion: {{$pelicula->length}}</li>
                                                    <li class="list-group-item">Rating: {{$pelicula->rating}}</li>
                                                    <li class="list-group-item">Awards: {{$pelicula->awards}}</li>
                                                    <li class="list-group-item">Fecha de Estreno: {{$pelicula->release_date}}</li>
                                                    <li class="list-group-item">imagen Portada: <img src="img/{{$pelicula->imagen_portada}}" alt="" class="rounded mx-auto d-block" height="200px" width="100px"></li>
                                                    <li class="list-group-item">imagen Background: <img src="img/{{$pelicula->imagen_background}}" alt="" class="rounded mx-auto d-block" height="200px" width="300px"></li>
                                                </ul>

                                            </div>

                                            <!--///// botones del modal /////-->

                                            <div class="modal-footer  justify-content-center">
                                                <button type="button" class="btn btn-outline-dark px-4" data-dismiss="modal">Volver Atras</button>
                                                <a href="/admModificarPelicula/{{$pelicula->id}}" class="btn btn-outline-dark px-4">
                                                    <i class="far fa-edit fa-lg mr-2"></i>
                                                    Modificar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--///// boton "ELIMINAR" /////-->
                                <td>
                                    <button type="button" class="btn btn-outline-secondary px-4" data-toggle="modal" data-target="#modal{{ $pelicula->id }}">
                                        <i class="far fa-minus-square fa-lg mr-2"></i>
                                        Eliminar
                                    </button>

                                    <!--///// boton "ELIMINAR" - CONTENIDO /////-->

                                    <div class="modal fade" id="modal{{ $pelicula->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">¿Esta seguro que quiere eliminar esta pelicula?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" >

                                                    {{ $pelicula->title }}
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="btn btn-danger" href="/eliminarPelicula/{{ $pelicula->id }}">
                                                        <a style="color:white" href="/eliminarPelicula/{{ $pelicula->id }}">
                                                            Eliminar
                                                        </a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                         @endforeach
                    </tbody>
                </table>
                {{$peliculas->links()}}
            </div>
        </div>
    </main>
@endsection
