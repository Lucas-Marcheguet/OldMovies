<?php
class RequestParser{

    function parseFilters(){
        $str = 'select distinct title, thumburl, releasedate, ratingscore, language, plot, genre, firstname, lastname
        from Movie natural join PossessGenre natural join PossessDirector natural join Director natural join Genre';
        if(isset($_COOKIE['title']) || isset($_COOKIE['director']) || isset($_COOKIE['language']) || isset($_COOKIE['genre'])){
            $str .= ' where ';
            if($this->addTitleFilter()){
                $str .= $this->addTitleFilter();
            }
            if(!$this->addTitleFilter() && $this->addDirectorFilter()){
                $str .= $this->addDirectorFilter();
            }
            elseif ($this->addTitleFilter() && $this->addDirectorFilter()) {
                $str .= ' and ' . $this->addDirectorFilter();
            }
            if(!$this->addTitleFilter() && !$this->addDirectorFilter() && $this->addLanguageFilter()){
                $str .= $this->addLanguageFilter();
            }
            elseif (($this->addTitleFilter() || $this->addDirectorFilter()) && $this->addLanguageFilter()) {
                $str .= ' and ' . $this->addLanguageFilter();
            }
            if(!$this->addTitleFilter() && !$this->addDirectorFilter() && !$this->addLanguageFilter() && $this->addGenreFilter()){
                $str .= $this->addGenreFilter();
            }
            elseif (($this->addTitleFilter() || !$this->addDirectorFilter() || !$this->addLanguageFilter()) && $this->addGenreFilter()){
                $str .= ' and ' . $this->addGenreFilter();
            }
        }
        elseif($this->addTitleSort() || $this->addReleaseDateSort()) {
            $str .= ' order by ';
            if($this->addTitleSort() && !$this->addReleaseDateSort()){
                $str .= " title " . $_COOKIE['title-sort'];
            }
            if(!$this->addTitleSort() && $this->addReleaseDateSort()){
                $str .= " releaseDate " . $_COOKIE['date-sort'];
            }
        }
        else {
            $str = "select distinct title, thumburl, releasedate, ratingscore, language, plot, genre, firstname, lastname
            from Movie natural join PossessGenre natural join PossessDirector natural join Director natural join Genre";
        }
        $str .= ' Limit 50;';
        return $str;
    }

    function addTitleFilter(){
        if(isset($_COOKIE['title'])){
            return "INSTR(title, '" . $_COOKIE['title'] . "') > 0";
        }
        return false;
    }

    function addDirectorFilter(){
        if(isset($_COOKIE['director'])){
            $splited = explode(' ', $_COOKIE['director']);
            if(isset($splited[0])&&isset($splited[1])){
                return "INSTR(firstName, '" . $splited[0] . "') > 0 and INSTR(lastName, '" . $splited[1] . "') > 0)";
            }
            elseif(isset($splited[0])){
                return "INSTR(firstName, '" . $splited[0] . "') > 0";
            }
        }
        return false;
    }

    function addLanguageFilter(){
        if(isset($_COOKIE['language'])){
            return "language='".$_COOKIE['language']."'";
        }
        return false;
    }

    function addGenreFilter(){
        if(isset($_COOKIE['genre'])){
            return "genre='".$_COOKIE['genre']."'";
        }
        return false;
    }

    function addTitleSort(){
        if(isset($_COOKIE['title-sort'])){  
            return true;
        }
        return false;
    }

    function addReleaseDateSort(){
        if(isset($_COOKIE['date-sort'])){
            return true;
        }
        return false;
    }
}

?>