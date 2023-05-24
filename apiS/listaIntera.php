<?php

//1- ottengo i dati tramite "file_get_contents(path del file json)" da listaSpesa.json
$string = file_get_contents( "../listaSpesa.json" );
//2- trasformo in array i dati con json_decode da json ad array asscoiativo multidimensionale
$list = json_decode( $string, true );


header( 'Content-type: application/json' );

//ritrasformo l'array associativo in json con "json_encode($cosa?)
echo json_encode( $list );
