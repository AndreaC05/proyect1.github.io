<?php
session_start();

require_once('usuario.php');

// Verificamos si ya hay una sesión activa
if(isset($_SESSION['usuario'])) {
  // Redirigimos a la pantalla de bienvenida
  header("Location: welcome.php");
}

// Verificamos si se ha enviado el formulario
if(isset($_POST['login'])) {
  // Verificamos si las credenciales son correctas
  if($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
    // Creamos un objeto Usuario
    $usuario = new usuario('Roberto', 'admin', 'admin');
    // Guardamos el objeto en la sesión
    $_SESSION['usuario'] = serialize($usuario);
    // Redirigimos a la pantalla de bienvenida
    header("Location: welcome.php");
  } else {
    $error = 'Mensaje de ERROR';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <h2>Login</h2>
  <form method="post" action="">
    <?php if(isset($error)) { ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php } ?>
    <div class="form-group">
      <label for="username">Usuario:</label>
      <input type="text" class="form-control" id="username" name="username">
    </div>
    <div class="form-group">
      <label for="password">Clave:</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-default" name="login">Ingresar</button>
  </form>
</div>

</body>
</html>