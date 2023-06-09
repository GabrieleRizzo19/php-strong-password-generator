<?php 

    function generatePassword($passwordLength, $dictionaryAll, $numberCheckbox, $letterCheckbox, $specialCheckbox){
        $password = "";

        if($numberCheckbox == 'on' && $letterCheckbox == 'on' && $specialCheckbox == 'on'){
            $dictionary = array_merge($dictionaryAll['number'],$dictionaryAll['letter'],$dictionaryAll['special']);
        }else if($numberCheckbox == 'on' && $letterCheckbox == 'on'){
            $dictionary = array_merge($dictionaryAll['number'],$dictionaryAll['letter']);
        }else if($letterCheckbox == 'on' && $specialCheckbox == 'on'){
            $dictionary = array_merge($dictionaryAll['letter'],$dictionaryAll['special']);
        }else if($numberCheckbox == 'on' && $specialCheckbox == 'on'){
            $dictionary = array_merge($dictionaryAll['number'],$dictionaryAll['special']);
        }else if($numberCheckbox == 'on'){
            $dictionary = $dictionaryAll['number'];
        }else if($letterCheckbox == 'on'){
            $dictionary = $dictionaryAll['letter'];
        }else if($specialCheckbox == 'on'){
            $dictionary = $dictionaryAll['special'];
        }

        $dictionaryLength = count($dictionary);

        for($i=0; $i < $passwordLength; $i++){
            $password .= $dictionary[rand(0, $dictionaryLength)];
        }
        
        return $password;
    }

?>