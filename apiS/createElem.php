<?php

//1- ottengo i dati tramite "file_get_contents(path del file json)" da listaSpesa.json
$string = file_get_contents( "../listaSpesa.json" );
//2- trasformo in array i dati con json_decode da json ad array asscoiativo multidimensionale
$list = json_decode( $string, true );


//se viene ricevuta l'informazione [''nuovo elemento = a qualcosa]
 if( isset($_POST['nuovoElemento']) ){


    //associo $varaibile al valore ottenuto dal $_POST
    $testoNuovoELemento = $_POST['nuovoElemento'];

    //l'oggetto xhe pushjero nell'array sara uguale a = $oggetto = ['text' => $varaibile testo associata precedentemente]
    $elementoDaPushare = [
        'text' => $testoNuovoELemento,
        'done' => false
    ];

    //$list[] = $elementoDaPushare;


    //pusho nell'array decodificato prima il nuovo elemento creato sopra ^^
    array_push( $list, $elementoDaPushare );


    //con la funzione file_put_contents ('scelgo in file in cui verra inserito il contenuto [[ATTENZIONE ILC ONTENUTO VERRA TOTALEMTE SOSTITUITO!!]]', 
    //funzione di codifica dell'array in sjon di cosa ($tutto l'array)
    file_put_contents( '../listaSpesa.json', json_encode($list) );

 }

header( 'Content-type: application/json' );

//ritrasformo l'array associativo in json con "json_encode($cosa?)
echo json_encode( $list );