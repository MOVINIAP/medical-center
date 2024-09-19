<?php

    // $database= new mysqli("localhost","root","12345678","edoc");
    $database= new mysqli("localhost","root","12345678","edoc");
    if ($database->connect_error){
        die("Conexión fallida:  ".$database->connect_error);
    }

?>