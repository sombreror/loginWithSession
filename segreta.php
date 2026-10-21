<?php

session_start();

// if utente not logged =>  location login.php;
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina segreta</title>
</head>
<body>

    <h1>Pagina segreta</h1>

    <h2>Benvenuto, <?= htmlspecialchars($_SESSION["username"]) ?>!</h2>

    <p>Questa pagina contiene informazioni riservate, accessibili solamente agli utenti autenticati.</p>

    <a href="dashboard.php">Torna alla dashboard</a>

    <a href="logout.php">Logout</a>

</body>
</html>
