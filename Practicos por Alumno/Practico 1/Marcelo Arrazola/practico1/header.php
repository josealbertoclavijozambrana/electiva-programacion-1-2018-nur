<?php
// Insert the path where you unpacked log4php
require_once ('log4php/Logger.php');

// Tell log4php to use our configuration file.
Logger::configure('config.xml');

// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('Capa Datos:');
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Nesflis</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/fontawesome/css/fontawesome-all.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/fontawesome/css/fontawesome.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="menuContainer">
            <div class="menu">
                <a href="index.php" class="tituloPag">NESFLIS</a>
                <a class="nuevo" href="formulario.php">
                    <i class="iconoMenu fas fa-plus-circle"></i>
                    Nuevo
                </a>
                <div class="sub-menu">
                    <a href = "listaAdm.php" class = "link"><i class="far fa-user"></i>login/logout</a>
                </div>

            </div>
        </div>