<?php
session_start();

// se non è attiva la sessione con l'username, vieni riportato per loggarti; 
if(!isset($_SESSION["username"])){
    header("location: login.php"); 
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       <h1>Benvenuto, <?= htmlspecialchars($_SESSION["username"]) ?>!</h1>

    <a href="segreta.php">Pagina segreta</a>
    <a href="logout.php">Logout</a>
</body>
</html>
