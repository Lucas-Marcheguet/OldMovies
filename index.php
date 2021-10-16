<!DOCTYPE html>
<html lang="en">
<?php 
include('php/head.php');

setcookie('connected', 'false', time() + 3600, '/');

?>
<body>
    <?php 
        require('./php/header.php');
        $header = new Header;
        $header->print_header();
    ?>
    <div class='display'>
        <?php

            require('php/filterBar.php');
            $filterBar = new filterBar();
            $filterBar->printFilerBar();
        ?>
        <div class="movies">
            <?php
                require('php/movies.php');
                $moviesDisplay = new MoviesDisplay();
                $moviesDisplay->printMovies();
            ?>
        </div>
        
    </div>
</body>
</html>