@extends('layouts.app')

@section('title', 'inicio')

@section('content')

    <main role="main">

        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach( $peliculas as $pelicula )
                    <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach( $peliculas as $pelicula )
                <div class="carousel-item {{$loop->first ? 'active' : '' }}">
                    <img src="img/imagenPrueba.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h5><a href="" data-toggle="modal" data-target="#exampleModalLong{{ $pelicula->id }}" style="text-decoration: none; color: white;">{{$pelicula->title}}</a></h5>
                        <p>Rating: {{$pelicula->rating}}</p>
                    </div>
                </div>
                @endforeach
                    @foreach( $peliculas as $pelicula )
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
                @endforeach
            </div>


            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <div class="container my-5">
        <div class="row justify-content-center text-center">
            @foreach($olds as $old)
            <div class="col-lg-4">
                <img class="" src="img/{{$old->imagen_portada}}" alt="Generic placeholder image" width="140" height="200">
                <h2>{{$old->title}}</h2>
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalLong{{ $old->id }}">
                    Detalles
                </button>
                <div class="modal fade" id="exampleModalLong{{ $old->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
                    <div class="modal-dialog " role="document">
                        <div class="modal-content bg-dark text-light">
                            <div class="modal-header">
                                <h3 class="col-12 modal-title text-center" id="exampleModalLongTitle">{{$old->title}}</h3>
                            </div>
                            <div class="col-12 modal-body">
                                <img src="img/{{$old->imagen_portada}}" alt="" class="rounded mx-auto d-block" style="width: 200px;">
                                <br>
                                <div class="col-12 mt-3 mb-4">
                                    <h5 class="text-center ">Sinopsis</h5>
                                    <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consequatur corporis dolor dolores doloribus, eos facilis natus nisi odio officiis, porro possimus quaerat quibusdam recusandae repudiandae. Distinctio explicabo molestias temporibus.</p>
                                </div>
                                <div class="col-12 text-center">
                                    <div class="col-sm-12 col-md-4 col-lg-2 float-left">
                                        <p class="font-weight-bold">Genero</p>
                                        <br>
                                        @if(!empty($old->getGenero->name))
                                            <span> {{$old->getGenero->name}}</span>
                                        @else
                                            <span> No hay genero</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 float-left">
                                        <p class="font-weight-bold">Duracion</p>
                                        <br>
                                        <span> {{$old->length}} min</span>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 float-left">
                                        <p class="font-weight-bold">Rating</p>
                                        <br>
                                        <span> {{$old->rating}}</span>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-2 float-left">
                                        <p class="font-weight-bold">Awards</p>
                                        <br>
                                        <span> {{$old->awards}}</span>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 float-left">
                                        <p class="font-weight-bold">Fecha Estreno</p>
                                        <br>
                                        <span>{{$old->release_date}}</span>
                                    </div>
                                </div>
                                <br>
                                <div class="col-12 text-center" style="margin-top: 190px">
                                    <h5 class="col-12 mb-4">Actores</h5>
                                    @foreach($old->actores as $actor)
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

    </main>

@endsection
