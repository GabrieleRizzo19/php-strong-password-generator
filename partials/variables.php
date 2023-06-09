<?php 

    // Creo il dizionario con i possibili caratteri per la password
    $dictionaryAll = [
        'letter' => array_merge(range('a','z'), range('A', 'Z')),
        'number' => array_merge(range(0,9)),
        'special' => ['?','!', '$', '%', '&','=']
    ];

?>