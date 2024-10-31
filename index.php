<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once('app/vars.php');
    include_once('app/functions.php');
    $letrasAFiltrar =array();

    if(isset($_POST['letras']) && !empty($_POST['letras'])){
        $postFiltrado = filter_input_array(INPUT_POST);

        $letrasAFiltrar = $postFiltrado['letras'];

        $listaFiltrada = filterVideojuegosLetras($videojuegos, $letrasAFiltrar);

        $formOutput = getFormMarkup($listaFiltrada,$abecedario,$letrasAFiltrar);

    }else{
        $formOutput = getFormMarkup($videojuegos,$abecedario,$letrasAFiltrar);
    }

    include_once('templates/templateIndex.php');
?>