<?php

function autentificado()
{
    if (!revisar_session()) {
        header('location: ../index.php');
    }
}

function revisar_session()
{
    return isset($_SESSION['admin']);
}
session_start();
autentificado();
?>