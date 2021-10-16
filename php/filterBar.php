<?php
require('php/requestsHandler.php');
class filterBar {
    public $request;
    public $languageList;
    public $genreList;

    function __construct(){
        $this->request = new RequestsHandler;
        $this->languageList = $this->request->getLanguages();
        $this->genreList = $this->request->getGenres();
    }

    function printFilerBar(){
        echo ("
        <div class='filter-bar'>
            <form action='' method='GET'>
                <input name='titre' type='text' class='search-bar' id='search-bar' placeholder='Rechercher un film ici...' maxlength='40'>
                <input name='director' type='text' class='search-bar' id='search-bar-director' placeholder='Nom réalisateur...' maxlength='40'>
                <div class='filters'>
                    <select name='language' id='language'>
                    <option value='' name='language'>Langue</option>
                        ".
                            $this->getLanguages($this->request->getLanguages())
                        ."
                    </select>
                    <select name='genres' id='genres'>
                        <option value='' name='genres'>Genre</option>
                        ".
                            $this->getGenres($this->request->getGenres())
                        ."
                    </select>
                </div>
                <button class='search-btn'>Rechercher</button>
            </form>
        </div>
        <div class='sorting'>
        <p class='sorting-text'>Trier par :
            <button class='sorting-button' name='title'>Titre</button>
            <button class='sorting-button' name='date'>Date de sortie</button>
        </div>
        ");
    }


    function getLanguages($array){
        $str = '';
        foreach($array as $lang){
            $str .= '<option name="'.$lang[0].'">'.$lang[0].'</option>';
        }
        return $str;
    }

    function getGenres($array){
        $str = '';
        foreach($array as $genre){
            $str .= '<option name="'.$genre[0].'">'.$genre[0].'</option>';
        }
        return $str;
    }
}



?>