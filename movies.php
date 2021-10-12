<?php

function prepare_movie($titre, $real, $genres){
    return ('
    <div class="movie">
        <p class="Titre"> Titre :'.$titre.'</p>
        <p class="real"> Realisateur :'.$real.'</p>
        <p class="genres"> Genre :'.$genres.'</p>
    </div>');
}

function print_movies($data){
    $string = "";
    foreach($data as $movie){
        $string += prepare_movie(
        $movie["Titre"], 
        $movie["Realisateur"],
        $movie["Genre"]);
    }
    return $string;
}