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
        
        if(isset($_POST['search']) || isset($_POST['reset']) || isset($_POST['title-sort']) || isset($_POST['date-sort'])){
            header("Refresh:0");
        }
        $this->handleFilters();
        echo ("
        <div class='filter-bar'>
            <form action='index.php' method='POST'>
                <input name='title' type='text' class='search-bar' class='search-bar' placeholder='Rechercher un film ici...' maxlength='40'>
                <input name='director' type='text' class='search-bar' class='search-bar' placeholder='Nom réalisateur...' maxlength='40'>
                <div class='filters'>
                    <select name='language' class='select'>
                    <option value='' name='language'>Langue</option>
                        ".
                            $this->getLanguages($this->request->getLanguages())
                        ."
                    </select>
                    <select name='genre' class='select'>
                        <option value='' name='genres'>Genre</option>
                        ".
                            $this->getGenres($this->request->getGenres())
                        ."
                    </select>
                </div>
                <button type='submit' name='search' class='search btn'>Rechercher</button>
                <button type='submit' class='reset btn' name='reset'>Réinitialiser</button>
                <div class='sorting'>
                    <p class='sorting-text'>Trier par :</p>
                    <button type='submit' class='title btn' name='title-sort'>Titre</button>
                    <button type='submit' class='date btn' name='date-sort'>Date de sortie</button>
                </div>
            </form>
        </div>
        ");
    }

    function handleFilters(){
        if(isset($_POST['title'])){
            setcookie('title', $_POST['title'], time()+3600, '/'); 
        }
        if(isset($_POST['director'])){
            setcookie('director', $_POST['director'], time()+3600, '/');
        }
        if(isset($_POST['language'])){
            setcookie('language', $_POST['language'], time()+3600, '/');
        }
        if(isset($_POST['genre'])){
            setcookie('genre', $_POST['genre'], time()+3600, '/');
        }
        if(isset($_POST['title-sort'])){
            if($_COOKIE['title-sort'] == 'asc'){
                setcookie('title-sort', 'desc', time()+3600, '/');
            }
            else {
                setcookie('title-sort', 'asc', time()+3600, '/');
            }
        }
        if(isset($_POST['date-sort'])){
            if($_COOKIE['date-sort'] == 'asc'){
                setcookie('date-sort', 'desc', time()+3600, '/');
            }
            else {
                setcookie('date-sort', 'asc', time()+3600, '/');
            }
        }
        if(isset($_POST['reset'])){
            setcookie('title', '', time()-3600, '/');
            setcookie('language', '', time()-3600, '/');
            setcookie('genre', '', time()-3600, '/');
            setcookie('director', '', time()-3600, '/');
            setcookie('title-sort', '', time()-3600, '/');
            setcookie('date-sort', '', time()-3600, '/');
            unset($_POST['reset']);
        }
    }


    function getLanguages($array){
        $str = '';
        foreach($array as $lang){
            $str .= '<option value="'.$lang[0].'">'.$lang[0].'</option>';
        }
        return $str;
    }

    function getGenres($array){
        $str = '';
        foreach($array as $genre){
            $str .= '<option value="'.$genre[0].'">'.$genre[0].'</option>';
        }
        return $str;
    }
}



?>