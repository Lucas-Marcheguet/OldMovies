<?php

function prepare_movie($titre, $real, $genres){
    return ('
    <div class="movie">
        <p class="Titre"> Titre :'.$titre.'</p>
        <p class="real"> Realisateur :'.$real.'<p>
        <p class="genres"> Genre :'.$genres.'<p>
    </div>');
}

function print_movies($data){
    foreach($data as $movie){
        echo prepare_movie($movie["Titre"], 
        $movie["Realisateur"],
        $movie["Genre"]);
    }
}