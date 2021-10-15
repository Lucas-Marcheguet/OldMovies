<?php
include('requestsHandler.php');

class filterBar {
    function printFilerBar(){
        echo ("
        <div class='filter-bar'>
            <form action='POST'>
                <input name='search-bar' type='text' class='search-bar' id='search-bar' placeholder='Rechercher un film ici...' maxlength='40'>

                <div class='filters'>
                    <select name='language' id='language'>
                    ".
                        getLanguages(RequestsHandler::getLanguages())
                    ."
                    </select>
                    <select name='genres' id='genres'>
                    ".
                        getGenres(RequestsHandler::getGenres())
                    ."
                    </select>
                </div>
                <div class='sorting'>
                    <button class='sorting-button' name='title'>Titre</button>
                    <button class='sorting-button' name='date'>Date de sortie</button>
                </div>
            </form>
        </div>
        ");
    }


    function getLanguages($array){
        $str = '';
        foreach($array as $lang){
            $str .= '<option name="'.$lang.'">'.$lang.'</option>';
        }
        return $str;
    }

    function getGenres($array){
        $str = '';
        foreach($array as $genre){
            $str .= '<option name="'.$genre.'">'.$genre.'</option>';
        }
        return $str;
    }
}



?>