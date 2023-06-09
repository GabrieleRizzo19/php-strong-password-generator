<?php 

    function getDictionary($dictionaryAll, $numberCheckbox, $letterCheckbox, $specialCheckbox){
        if($numberCheckbox == 'on' && $letterCheckbox == 'on' && $specialCheckbox == 'on'){
            return array_merge($dictionaryAll['number'],$dictionaryAll['letter'],$dictionaryAll['special']);
        }
        if($numberCheckbox == 'on' && $letterCheckbox == 'on'){
            return array_merge($dictionaryAll['number'],$dictionaryAll['letter']);
        }
        if($letterCheckbox == 'on' && $specialCheckbox == 'on'){
            return array_merge($dictionaryAll['letter'],$dictionaryAll['special']);
        }
        if($numberCheckbox == 'on' && $specialCheckbox == 'on'){
            return array_merge($dictionaryAll['number'],$dictionaryAll['special']);
        }
        if($numberCheckbox == 'on'){
            return $dictionaryAll['number'];
        }
        if($letterCheckbox == 'on'){
            return $dictionaryAll['letter'];
        }
        if($specialCheckbox == 'on'){
            return $dictionaryAll['special'];
        }

        return array_merge($dictionaryAll['number'],$dictionaryAll['letter'],$dictionaryAll['special']);
    }

    function generatePassword($passwordLength, $dictionary){
        $password = "";

        $dictionaryLength = count($dictionary);

        for($i=0; $i < $passwordLength; $i++){
            $password .= $dictionary[rand(0, $dictionaryLength)];
        }
        
        return $password;
    }

?>