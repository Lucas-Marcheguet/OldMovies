<?php

class Movie {
    
    private $titre;
    private $thumbUrl;
    private $dateSortie;
    private $ratingScore;
    private $language;
    private $plot;
    private $director;
    private $genres;

    function __construct($titre, $thumbUrl, $dateSortie, $language, $ratingScore ,$plot, $director, $genres){
        $this->titre      = $titre;
        $this->thumbUrl   = $thumbUrl;
        $this->dateSortie = $dateSortie;
        $this->language   = $language;
        $this->plot       = $plot;
        $this->director   = $director;
        $this->genres     = $genres;
    }

    function getlanguageUrl(){
        return 'https://www.languageflags.io/'. $this->language .'/flat/64.png';
    }

    function printMovie(){
        echo ("
            <div class='movie'>
                <div class='img'>
                    <img class ='movie-poster' src='". $this->thumbUrl ."' alt='". $this->titre ."'>
                    <div class='rating'>
                        <p class='note'>".$this->ratingScore."</p>
                        <img src='./static/img/etoile.png' alt='etoile'>
                    </div>
                </div>
                <p class='movie-title'>".$this->titre."</p>
            </div>
        ");
    }

    function printMovieDescription(){
        echo("
            <div class='movie-desc'>
                <img class='close' src='./static/img/close.png' alt='close'>

                <div class='desc'>
                    <img src='".$this->thumbUrl."' alt='".$this->titre."'>
                    <p class='plot-desc'>".$this->plot."</p>
                    <div class='handler'>
                        <h2 class='titre-desc'>".$this->titre."</p>
                        <p class='director'>Réalisateur : ".$this->director."</p>
                        <p class='director'>Note reçu : ".$this->ratingScore."</p>
                        <p class='director'>Langue : ".$this->language."</p>
                        <p class='director'>Date de sortie : ".$this->dateSortie."</p>
                        <p class='director'>Genres : ".printGenres()."</p>
                    </div>
                </div>
            </div>
        ");
    }


    function printGenres(){
        $str = '';
        for($i=0; $i<sizeof($this->genres); $i++){
            if($i == sizeof($this->genres)-1){
                $str .= $this->genres[i];
            }
            else {
                $str .= $this->genres[i] . ', ';
            }
        }
        return $str;
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