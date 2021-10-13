<?php include('php/head.php'); ?>
<form method="post">
        <label for="sort">Trier par :</label>
        <button>Titre</button>
        <button>Réalisateur</button>
        <button>Genre</button>
    </form>
<div class="result">
    <?php
        include("php/movies.php");
        include("php/requests.php");
        echo(print_movies(getMoviesByTitle()));
    ?>
</div>
<?php include('php/foot.php'); ?>
