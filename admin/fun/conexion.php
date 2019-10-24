<?php

    $con=new mysqli('localhost','root','','bd_biblioteca');

    if ($con->connect_error) {
       die("ERROR de conexion");
    }

    $con->query("SET NAMES 'utf8");
?>