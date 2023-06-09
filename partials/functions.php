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
            $_SESSION['controllo'] = "senza ripetizioni";
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
        }else{
            $_SESSION['controllo'] = "CON ripetizioni";
            for($i=0; $i < $passwordLength; $i++){
                $password .= $dictionary[rand(0, $dictionaryLength-1)];

            }  
        }
    
        return $password;
    }

?>