<?php 

include("connexion.php");

$connexion = connect_bd();

function getMoviesByTitleAsc(){
    $stmt = $GLOBALS['connexion']->prepare(
    "select distinct *
    from Movies
    Order by Titre asc;");

    $stmt->execute();
    return $stmt->fetchAll();
}

function getMoviesByTitleDesc(){
    $stmt = $GLOBALS['connexion']->prepare(
    "select distinct *
    from Movies
    Order by Titre desc;");

    $stmt->execute();
    return $stmt->fetchAll();
}

function getMoviesByRealisatorAsc(){
    $stmt = $GLOBALS['connexion']->prepare(
    "select distinct *
    from Movies
    Order by Realisateur;");

    $stmt->execute();

    return $stmt->fetchAll();
}

function getMoviesByRealisatorDesc(){
    $stmt = $GLOBALS['connexion']->prepare(
    "select distinct *
    from Movies
    Order by Realisateur desc;");

    $stmt->execute();

    return $stmt->fetchAll();
}

function getMoviesByGenreAsc(){
    $stmt = $GLOBALS['connexion']->prepare(
    "select distinct *
    from Movies
    Order by Genre;");

    $stmt->execute();

    return $stmt->fetchAll();
}

function getMoviesByGenreDesc(){
    $stmt = $GLOBALS['connexion']->prepare(
    "select distinct *
    from Movies
    Order by Genre;");

    $stmt->execute();

    return $stmt->fetchAll();
}
?>