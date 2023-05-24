<?php
$list = [
    [
        'typo' => "pizza"
    ],
    [
        'typo' => "mela"
    ],
    [
        'typo' => "banna"
    ],
    [
        'typo' => "pera"
    ],

];

header( 'Content-type: application/json' );

echo json_encode( $list );

// echo $list;

// var_dump( $list );