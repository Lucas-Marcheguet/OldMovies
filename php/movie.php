<?php

class Movie {
    
    $titre;
    $thumbUrl;
    $dateSortie;
    $ratingScore;
    $country;
    $plot;
    $realisator;
    $genres;

    function __construct($tire, $thumbUrl, $dateSortie, $country, $plot, $realisator, $genres){
        $this->titre      = $titre;
        $this->thumbUrl   = $thumbUrl;
        $this->dateSortie = $dateSortie;
        $this->country    = $country;
        $this->plot       = $plot;
        $this->realisator = $realisator;
        $this->genres     = $genres
    }

    function country_handler(){

        $urls = array(
            "fr" => "https://www.countryflags.io/fr/flat/64.png",
            "en" => "https://www.countryflags.io/en/flat/64.png"
        );

        return $urls[$this->country]
    }
    
    
    
    
    /*function print_movie($titre, $real, $genres){
        return ('
        <div class="movie">
            <p class="Titre"> Titre : '.$titre.'</p>
            <p class="real"> Realisateur : '.$real.'</p>
            <p class="genres"> Genre : '.$genres.'</p>
        </div>');
    }*/
}