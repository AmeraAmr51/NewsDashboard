<?php
define('DB_Host','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','new');

$Connect= mysqli_connect(DB_Host,DB_USER,DB_PASS,DB_NAME);

if(!$Connect)
{
    echo"failed";
}


?>