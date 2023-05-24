<?php

//1- ottengo i dati tramite "file_get_contents(path del file json)" da listaSpesa.json
$string = file_get_contents( "../listaSpesa.json" );
//2- trasformo in array i dati con json_decode da json ad array asscoiativo multidimensionale
$list = json_decode( $string, true );

//se è stata inviata l'informazione ['scegliInformazione']
if( isset( $_POST['listIndex'] ) ){

     //associo la variabile php al valore di index 
    $valoreIndice = $_POST['listIndex'];

    //$singoloElem = $list[$valoreIndice];

    //struttiamo la key "done" per renderla l'opposto di quello che è al momento del click
    $list[$valoreIndice]['done'] = !$list[$valoreIndice]['done'];

    //con la funzione file_put_contents ('scelgo in file in cui verra inserito il contenuto [[ATTENZIONE ILC ONTENUTO VERRA TOTALEMTE SOSTITUITO!!]]', 
    //funzione di codifica dell'array in sjon di cosa ($tutto l'array)
    file_put_contents( '../listaSpesa.json', json_encode($list) );
   
}

header( 'Content-type: application/json' );

//ritrasformo l'array associativo in json con "json_encode($cosa?)
echo json_encode( $list );