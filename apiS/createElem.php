<?php

//1- ottengo i dati
$string = file_get_contents( "../listaSpesa.json" );
//2- trasformo in array i dati
$list = json_decode( $string, true );

 if( isset($_POST['nuovoElemento']) ){

    $testoNuovoELemento = $_POST['nuovoElemento'];

    $elementoDaPushare = [
        'text' => $testoNuovoELemento,
        'done' => false
    ];

    //$list[] = $elementoDaPushare;

    array_push( $list, $elementoDaPushare );
    
    file_put_contents( '../listaSpesa.json', json_encode($list) );

 }

header( 'Content-type: application/json' );

echo json_encode( $list );