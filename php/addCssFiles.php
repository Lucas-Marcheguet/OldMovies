<?php

$files = array(
    'moviesDisplay', 
    'index'
);

foreach($files as $file){
    echo "<link rel='stylesheet' href='static/css/". $file. ".css?" . date('YYYY/MM/DD:h:i:s A') ."'>";
}

?>