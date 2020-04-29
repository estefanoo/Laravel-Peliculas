@extends('layouts.app')

@section('title', 'Administrador de Actores')

@section('content')

    <main role="main" style="margin-top:100px">
        <div class="container col-sm-12 col-md-12 col-lg-12 ">
            <div class="row justify-content-center ">
                <table class="table table-stripped table-hover table-responsive">
                    <thead class="thead-dark">
                    <tr>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Ranting</th>
                        <th class="d-none d-sm-none d-md-none d-lg-table-cell">Pelicula Favorita</th>
                        <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Imagen del Actor</th>
                        <th colspan="2" class="text-center">
                            <a href="/admAgregarActor" class="btn btn-outline-light px-4">
                                <i class="far fa-plus-square fa-lg mr-2"></i>
                                agregar
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($actores as $actor)
                            <tr>
                                <td>{{$actor->last_name}}</td>
                                <td>{{$actor->first_name}}</td>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$actor->rating}}</td>
                                @if(!empty($actor->getPeliculaFavorita->title))
                                    <td class="d-none d-sm-none d-md-none d-lg-table-cell">{{$actor->getPeliculaFavorita->title}}</td>
                                @else
                                    <td class="d-none d-sm-none d-md-none d-lg-table-cell">No hay pelicula favorita</td>
                                @endif

                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">
                                    <img src="img/actores/{{ $actor->imagen_profile}}" style="width:100px;height:100px;">
                                </td>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">
                                    <a href="/admModificarActor/{{$actor->id}}" class="btn btn-outline-secondary px-4">
                                        <i class="far fa-edit fa-lg mr-2"></i>
                                        Modificar
                                    </a>
                                </td>
                                <td class=" d-sm-table-cell d-md-none d-lg-none">

                                    <!--////////////boton model///////-->
                                    <a class="btn btn-outline-secondary px-4" data-toggle="modal" data-target="#exampleModalLong{{$actor->id}}">
                                        <i class="far fa-edit fa-lg mr-2"></i>
                                        Detalles
                                    </a>
                                    <!--////////////boton model - Contenido ///////-->
                                    <div  class="modal fade" id="exampleModalLong{{$actor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content border-dark">
                                                <div class="modal-header">
                                                    <h3 class="col-12 modal-title text-center" id="exampleModalLongTitle">Detalles</h3>
                                                </div>
                                                <div class="col-12 modal-body">

                                                    <ul class="list-group">
                                                        <li class="list-group-item">imagen: <img src="img/actores/joaquin_phoenix.jpg" alt="" class="rounded-circle mx-auto d-block" height="100px" width="100px"></li>
                                                        <li class="list-group-item">Nombre: {{$actor->first_name}}</li>
                                                        <li class="list-group-item">Apellido: {{$actor->last_name}}</li>
                                                        <li class="list-group-item">Pelicula Favorita:
                                                            @if(!empty($actor->getPeliculaFavorita->title))
                                                                {{$actor->getPeliculaFavorita->title}}
                                                            @else
                                                                No hay pelicula favorita
                                                            @endif
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="modal-footer  justify-content-center">
                                                    <button type="button" class="btn btn-outline-dark px-4" data-dismiss="modal">Volver Atras</button>
                                                    <a href="/admModificarActor/{{$actor->id}}" class="btn btn-outline-dark px-4">
                                                        <i class="far fa-edit fa-lg mr-2"></i>
                                                        Modificar
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-secondary px-4" data-toggle="modal" data-target="#modal{{ $actor->id }}">
                                        <i class="far fa-minus-square fa-lg mr-2"></i>
                                        Eliminar
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal{{ $actor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">¿Esta seguro que quiere eliminar a este actor?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" >

                                                    {{ $actor->first_name }} {{ $actor->last_name }}
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="btn btn-danger" href="/formEliminarProducto/{{ $actor->id }}">
                                                        <a style="color:white" href="/eliminarActor/{{ $actor->id }}">
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
                {{ $actores ->links()}}
            </div>
        </div>
    </main>
@endsection
