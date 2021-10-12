<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OldMovies</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div id="result">

    </div>
    <?php
        include("movies.php");
        include("requests.php");

        $dom = new domDocument;
        $dom->loadHTML('<html><body/></html>');

        $result = $dom->createElement(print_movies(getMoviesByTitle()));

        $dom->appendChild($result);
    ?>
</body>
</html>