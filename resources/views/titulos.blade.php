@extends('layouts.app')

@section('title', 'Peliculas')

@section('content')

    <main role="main" style="margin-top:100px">

        <div class="container col-12">
            <div class="row">
                <!--titulo-->
                <h1 class="col-12 text-center my-5">Titulos</h1><br>

                <!--buscador-->
                <form class="form-inline col-12 justify-content-center">
                    <input class="col-10 form-control" type="search" name="buscador" placeholder="Busca tu pelicula favorita..." aria-label="Buscar">
                    <button class="btn btn-outline-white rounded-circle " type="submit">
                        <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </form>

                <!--contenido-->
                <div class="container mt-5">
                    <div class="row text-center">
                        @foreach($peliculas as $pelicula)
                        <div class="col-sm-12 col-md-6 col-lg-4 my-2">
                            <img class="" src="img/{{$pelicula->imagen_portada}}" alt="Generic placeholder image" width="140" height="200">
                            <h5 class="mt-2">{{$pelicula->title}}</h5>
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalLong{{ $pelicula->id }}">
                                Detalles
                            </button>
                            <div class="modal fade" id="exampleModalLong{{ $pelicula->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
                                <div class="modal-dialog " role="document">
                                    <div class="modal-content bg-dark text-light">
                                        <div class="modal-header">
                                            <h3 class="col-12 modal-title text-center" id="exampleModalLongTitle">{{$pelicula->title}}</h3>
                                        </div>
                                        <div class="col-12 modal-body">
                                            <img src="img/{{$pelicula->imagen_portada}}" alt="" class="rounded mx-auto d-block" style="width: 200px;">
                                            <br>
                                            <div class="col-12 mt-3 mb-4">
                                                <h5 class="text-center ">Sinopsis</h5>
                                                <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consequatur corporis dolor dolores doloribus, eos facilis natus nisi odio officiis, porro possimus quaerat quibusdam recusandae repudiandae. Distinctio explicabo molestias temporibus.</p>
                                            </div>
                                            <div class="col-12 text-center">
                                                <div class="col-sm-12 col-md-4 col-lg-2 float-left">
                                                    <p class="font-weight-bold">Genero</p>
                                                    <br>
                                                    @if(!empty($pelicula->getGenero->name))
                                                        <span> {{$pelicula->getGenero->name}}</span>
                                                    @else
                                                        <span> No hay genero</span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-2 float-left">
                                                    <p class="font-weight-bold">Duracion</p>
                                                    <br>
                                                    <span> {{$pelicula->length}} min</span>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-2 float-left">
                                                    <p class="font-weight-bold">Rating</p>
                                                    <br>
                                                    <span> {{$pelicula->rating}}</span>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-2 float-left">
                                                    <p class="font-weight-bold">Awards</p>
                                                    <br>
                                                    <span> {{$pelicula->awards}}</span>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 float-left">
                                                    <p class="font-weight-bold">Fecha Estreno</p>
                                                    <br>
                                                    <span>{{$pelicula->release_date}}</span>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-12 text-center" style="margin-top: 190px">
                                                <h5 class="col-12 mb-4">Actores</h5>
                                                @foreach($pelicula->actores as $actor)
                                                    <div class="col-sm-12 col-md-4 col-lg-4 float-left">
                                                        <img src="img/actores/joaquin_phoenix.jpg" class="rounded-circle mx-auto d-block" style="height: 50px;width: 50px">
                                                        <br>
                                                        <span>{{$actor->first_name}} {{$actor->last_name}}</span>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>

                                        <div class="modal-footer  justify-content-center">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center ">
            {{$peliculas->links()}}
        </div>
    </main>
@endsection
