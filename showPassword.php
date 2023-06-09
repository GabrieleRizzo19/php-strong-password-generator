<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOW PASSWORD</title>
</head>
<body>

    <?php 
    
        session_start();

    ?>

    <div class="show-password text-break"> 
        La tua password è <strong> <?php echo $_SESSION['password'] ?> </strong>
    </div>

    <a href="index.php">GENERA NUOVA PASSWORD</a>

    <?php 
    
        $_SESSION['dictionary'] = "";
        $_SESSION['password'] = "";
    
    ?>

</body>
</html>