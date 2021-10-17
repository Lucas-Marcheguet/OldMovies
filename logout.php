<?php

setcookie('connected', null, time()-3600, '/');
setcookie('username', null, time()-3600, '/');
header('Location:./index.php');

?>