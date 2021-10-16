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
        $this->ratingScore= $ratingScore;
    }

    function printMovie(){
        echo ("
            <div class='movie'>
                <div class='img'>
                    <img class ='movie-poster' src='". $this->thumbUrl ."' alt='". $this->titre ."'>
                    <img src='". $this->getlanguageUrl($this->language) ."' class='flag' alt='flag'>
                    <div class='rating'><p class='note'>".$this->printRating()."</p></div>
                    <div class='hover-part'>
                        <p class='director'>". $this->getDirectors() ."</p>
                        <p class='plot'>". $this->getPartOfPlot() ."</p>
                        <p class='click'>Cliquez pour en savoir plus</p>
                    </div>
                </div>
                <p class='movie-title'>".$this->titre."</p>
            </div>
        ");
    }

    function printRating(){
        return ($this->ratingScore != 0) ? number_format($this->ratingScore, 1):'n/n';
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
                        <p class='infos'>Réalisateur : ".$this->getDirectors()."</p>
                        <p class='infos'>Note reçu : ".$this->ratingScore."</p>
                        <p class='infos'>Langue : ".$this->language."</p>
                        <p class='infos'>Date de sortie : ".$this->dateSortie."</p>
                        <p class='infos'>Genres : ".printGenres()."</p>
                    </div>
                </div>
            </div>
        ");
    }

    function getDirectors(){
        $str = '';
        for($i=0;$i<sizeof($this->director);$i++){
            if($i == sizeof($this->director)-1){
                $str .= $this->director[$i];
            }
            else {
                $str .= $this->director[$i] . ', ';
            }
        }
        return $str;
    }

    function getPartOfPlot(){
        return substr($this->plot, 0, 120) . '...';
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

    function getlanguageUrl(){
        if($this->language == 'en') {
            $this->language = 'gb';
        }
        return 'https://www.countryflags.io/'. $this->language .'/flat/32.png';
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