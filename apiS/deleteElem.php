<?php

//1- ottengo i dati
$string = file_get_contents( "../listaSpesa.json" );
//2- trasformo in array i dati
$list = json_decode( $string, true );


if( isset( $_POST['listIndex'] ) ){

    $valoreIndice = $_POST['listIndex'];

    //cancelliamo il dato singolo
    array_splice( $list, $valoreIndice, 1 );

    file_put_contents( '../listaSpesa.json', json_encode($list) );
   
}

header( 'Content-type: application/json' );

echo json_encode( $list );