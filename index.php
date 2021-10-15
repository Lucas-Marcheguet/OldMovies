<?php 
include('php/head.php');

setcookie('connected', 'false', time() + 3600, '/');

?>
<!DOCTYPE html>
<html lang="en">
<body>
    <?php 
        require('./php/header.php');
        $header = new Header;
        $header->print_header();
    ?>
    <div class='display'>
        <?php
            require('./php/filterBar.php');
            $filterBar = new filterBar();
            $filterBar->printFilerBar();
        ?>
    </div>
</body>
</html>