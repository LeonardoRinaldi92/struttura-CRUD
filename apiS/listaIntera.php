<?php

//1- ottengo i dati
$string = file_get_contents( "../listaSpesa.json" );
//2- trasformo in array i dati
$list = json_decode( $string, true );


header( 'Content-type: application/json' );

echo json_encode( $list );
