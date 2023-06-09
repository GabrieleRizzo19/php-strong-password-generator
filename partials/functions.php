<?php 


    function getDictionary($dictionaryAll, $numberCheckbox, $letterCheckbox, $specialCheckbox){
        
        $dictionary = [];
        
        if($numberCheckbox == 'on'){
            $dictionary = array_merge($dictionary, $dictionaryAll['number']);
        }
        if($letterCheckbox == 'on'){
            $dictionary = array_merge($dictionary, $dictionaryAll['letter']);
        }
        if($specialCheckbox == 'on'){
            $dictionary = array_merge($dictionary, $dictionaryAll['special']);
        }
        if(!$dictionary){
            $dictionary = array_merge($dictionary, $dictionaryAll['special'],$dictionaryAll['number'],$dictionaryAll['letter'],);
        }

        return $dictionary;
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
                $lastPasswordCharacter = substr($password, -1, 1);
                $characterToAdd = $dictionary[rand(0, $dictionaryLength-1)];

                // TERZO UGUALE SMINCHIA TUTTO
                if($lastPasswordCharacter == $characterToAdd){
                    $i--;
                }else{
                    $password .= $characterToAdd;
                }
            }  
        }
    
        return $password;
    }

?>