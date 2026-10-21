<?php

session_start();

//se la sessione è già presente => location dashboard
if (isset($_SESSION["username"])) {
    header("Location: dashboard.php");
    exit();
}

$admin_username = "admin"; 
$admin_password = "password123";
$error = ""; 


if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? ""; 
    
    // Regex to see if username is valid => if not, the process dies; 
    if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        $error = "invalid username";  
    }

    elseif($admin_username === $username && $admin_password ===$password){
        session_regenerate_id(true); 
        
        //salviamo l'username come dato di sessione (quello che inseriamo all'interno dell'input)
        $_SESSION["username"] = $username; 
        
        //veniamo rendirizzati su dashboard.php
        header("location: dashboard.php");
        exit(); 
    }else{
        $error = "username o password errati";
    }


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

<?php if ($error !== ""): ?>
        <p><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

       
    <form method="POST">
         <label for="username">Inserisci il tuo username</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Inserisci la password del tuo account</label><br>
        <input type="password" id="password" name="password" required><br>
            <br>
        <button type="submit">Invia</button>
        
    </form>
</body>
</html>
