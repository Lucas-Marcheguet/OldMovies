<?php 

include("connexion.php");

$connexion = createBasicDB();

function getMoviesByTitle(){
    $stmt = $GLOBALS['connexion']->prepare(
    "select Titre, Realisateur, Genre
    from Movies
    Order by Titre;");

    $stmt->execute();

    return $stmt->fetchAll();
}

function getMoviesByRealisator(){
    $stmt = $GLOBALS['connexion']->prepare(
    "select Titre, Realisateur, Genre
    from Movies
    Order by Realisateur;");

    $stmt->execute();

    return $stmt->fetchAll();
}

function getMoviesByGenre(){
    $stmt = $GLOBALS['connexion']->prepare(
    "select Titre, Realisateur, Genre
    from Movies
    Order by Genre;");

    $stmt->execute();

    return $stmt->fetchAll();
}
?>