<?php 

    function generatePassword($passwordLength, $dictionary){
        $password = "";

        $dictionaryLength = count($dictionary);

        for($i=0; $i < $passwordLength; $i++){
            $password .= $dictionary[rand(0, $dictionaryLength)];
        }
        
        return $password;
    }

?>