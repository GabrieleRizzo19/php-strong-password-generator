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

    function generatePassword($passwordLength, $dictionary, $repeatRadio){
        $password = "";

        $dictionaryLength = count($dictionary);

        if($repeatRadio == 'true'){
            for($i=0; $i < $passwordLength; $i++){
                $password .= $dictionary[rand(0, $dictionaryLength-1)];
            }
        }else{
            for($i=0; $i < $passwordLength; $i++){
                $lastPasswordCharacter = substr($password, -1);
                do{
                    $characterToAdd = $dictionary[rand(0, $dictionaryLength-1)];
                }while($lastPasswordCharacter == $characterToAdd);
                $password .= $characterToAdd;
            }  
        }
    
        return $password;
    }

?>