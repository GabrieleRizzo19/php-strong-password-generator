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

    session_start();

    // Includo il file con le funzioni 
    include __DIR__ . "./partials/functions.php";
    include __DIR__ . "./partials/variables.php";
    
    

    // Recupero i dati necessari alla creazione della password
    $passwordLength = ($_GET['passwordLength'] ?? 0);
    
    $numberCheckbox = ($_GET['numberCheckbox'] ?? false);
    $letterCheckbox = ($_GET['letterCheckbox'] ?? false);
    $specialCheckbox = ($_GET['specialCheckbox'] ?? false);
    $repeatRadio = ($_GET['repeatRadio'] ?? true);

    // Genero la password
    $_SESSION['password'] = generatePassword($passwordLength, $dictionaryAll, $numberCheckbox, $letterCheckbox, $specialCheckbox);

    

    if(strlen($_SESSION['password'] > 0)){
        header("Location: ./showPassword.php");
    }

    ?>

    <div class="container">
        <header>
            <div class="header-wrapper text-center">
                <h1>PASSWORD GENERATOR</h1>
            </div>
        </header>

        <main>
            <div class="main-wrapper text-center">

                <form action="index.php" method="get" class="bg-light py-3">

                <div class="mb-4">
                    <label class="me-3" for="passwordLength"><h5>Lunghezza password:</h5> </label>
                    <input type="number" id="passwordLength" name="passwordLength" value="<?php echo $passwordLength ?>">
                </div>

                <div class="mb-4">
                    <h5>Scegli quali caratteri usare</h5>
                    <div>
                        <label for="numberCheckbox">NUMERI:</label>
                        <input type="checkbox" name="numberCheckbox" id="numberCheckbox">
                    </div>

                    <div>
                        <label for="letterCheckbox">LETTERE:</label>
                        <input type="checkbox" name="letterCheckbox" id="letterCheckbox">
                    </div>

                    <div>
                        <label for="specialCheckbox">CARATTERI SPECIALI:</label>
                        <input type="checkbox" name="specialCheckbox" id="specialCheckbox">
                    </div>
                </div>

                

                <div class="mb-4">
                    <h5>Consenti ripetizione di caratteri</h5>
                    <label for="repeatRadioYes">SI</label>
                    <input type="radio" name="repeatRadio" id="repeatRadioYes" value="true">
                    <label for="repeatRadioYes">NO</label>
                    <input type="radio" name="repeatRadio" id="repeatRadioNo" value="false">
                </div>


                <button class="btn btn-primary" type="submit">GENERA</button>
                <button class="btn btn-primary" type="reset">RESET</button>

                </form>
            </div>
        </main>
    </div>

</body>
</html>