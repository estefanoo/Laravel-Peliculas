<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $fillable = ['title','description','rating','awards','length','release_date','genre_id','imagen_portada','imagen_background'];
    public $table = "movies";

    ///////  Relacion con genero  ////////
    ///
    public function getGenero()
    {
        return $this->belongsTo('App\Genero', 'genre_id', 'id');
    }

    ///////  Relacion con tabla Intermedia  ////////
    ///
    public function Actores()
    {
        return $this->belongsToMany('App\Actor', 'actor_movie', 'movie_id','actor_id');
    }

}
