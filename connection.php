<?php

    $database= new mysqli("localhost","root","","edoc");
    if ($database->connect_error){
        die("Conexión fallida:  ".$database->connect_error);
    }

?>