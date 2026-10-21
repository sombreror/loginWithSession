<?php

session_start();

// Svuota le variabili di sessione
$_SESSION = [];

// Distrugge la sessione
session_destroy();

// Reindirizza al login
header("Location: login.php");
exit();

?>
