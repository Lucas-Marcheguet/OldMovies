<!DOCTYPE html>
<html lang="fr">
<?php 
include('php/head.php');
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
                $requestHandler = new RequestsHandler();
                $moviesDisplay = new MoviesDisplay($requestHandler);
                $moviesDisplay->printMovies();
            ?>
        </div>
        
    </div>
</body>
</html>