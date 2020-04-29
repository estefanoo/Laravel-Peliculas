<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    //

    public function getPeliculaFavorita()
    {
        return $this->belongsTo('App\Pelicula', 'favorite_movie_id', 'id');
    }

public function Peliculas()
{
    return $this->belongsToMany('App\Pelicula', 'actor_movie', 'actor_id', 'movie_id');
}
}
