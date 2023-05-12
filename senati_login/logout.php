<?php
session_start();

// Destruimos todas las variables de sesión
session_destroy();

// Redirigimos al usuario al login
header("Location: index.php");
exit;
?>