<?php

//1- ottengo i dati
$string = file_get_contents( "../listaSpesa.json" );
//2- trasformo in array i dati
$list = json_decode( $string, true );


if( isset( $_POST['listIndex'] ) ){
    $valoreIndice = $_POST['listIndex'];

    $list = $list[$valoreIndice];
   
}

header( 'Content-type: application/json' );

echo json_encode( $list );