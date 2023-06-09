<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PASSWORD GENERATOR</title>
</head>
<body>
    
    <?php 

    function generatePassword($passwordLength, $dictionary){
        $password = "";

        $dictionaryLength = count($dictionary);

        for($i=0; $i < $passwordLength; $i++){
            $password .= $dictionary[rand(0, $dictionaryLength)];
        }
        
        return $password;
    }
    
    $dictionary = array_merge(range('A','Z'), range('a', 'z'), range(0,9));

    $passwordLength = ($_GET['passwordLength'] ?? 0);

    $password = generatePassword($passwordLength, $dictionary);

    ?>

    <div class="container">
        <header>
            <div class="header-wrapper text-center">
                <h1>PASSWORD GENERATOR</h1>
            </div>
        </header>

        <main>
            <div class="main-wrapper text-center">

                <div class="show-password"> 
                    La tua password è <strong> <?php echo $password ?> </strong>
                </div>

                <form action="index.php" method="get" class="bg-light py-3">

                <label class="fw-bold me-3" for="passwordLength">Inserisci la lunghezza: </label>
                <input type="number" id="passwordLength" name="passwordLength">

                <button class="btn btn-primary" type="submit">GENERA</button>
                <button class="btn btn-primary" type="reset">RESET</button>

                </form>
            </div>
        </main>
    </div>

</body>
</html>