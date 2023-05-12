<?php
session_start();

require_once('Usuario.php');
require_once('aulaDAO.php');

// Verificamos si hay una sesión activa
if(isset($_SESSION['usuario'])) {
  // Obtenemos el objeto Usuario de la sesión
  $usuario = unserialize($_SESSION['usuario']);
} else {
  // Redirigimos al login
  header("Location: index.php");
}

// Verificamos si se ha enviado el formulario
if(isset($_POST['enviar'])) {

  $var_aula = $_POST['aula'];
  $var_seccion = $_POST['seccion'];  
  $var_sede = $_POST['sede'];
  $var_alumnado = $_POST['alumnado'];

  $objeto = new aulaDAO();
  $objeto->agregarAula($var_aula, $var_seccion, $var_sede, $var_alumnado  );
  
}



?>

<!DOCTYPE html>
<html>
<head>
  <title>VENTANA</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <h2>AULA</h2>
  <p class="text-right">Hola <?php echo $usuario->nombres; ?></p>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a href="welcome.php">Inicio</a></li>
        <li><a href="alumnolista.php">Alumno</a></li>
        <li><a href="cursolista.php">Curso</a></li>
        <li><a href="ProductoLista.php">Producto</a></li>
        <li><a href="aulaLista.php">Aula</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Salir</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
  <h2>AULA</h2>
  <form method="post" action="">
    <?php if(isset($error)) { ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php } ?>

    <div class="form-group">
      <label for="aula">Aula:</label>
      <input type="text" class="form-control" id="aula" name="aula">
    </div>

    <div class="form-group">
      <label for="supercodigo">Seccion:</label>
      <input type="text" class="form-control" id="seccion" name="seccion">
    </div>

    <div class="form-group">
      <label for="supercodigo">Sede:</label>
      <input type="text" class="form-control" id="sede" name="sede">
    </div>

    <div class="form-group">
      <label for="alumnado">Alumnado:</label>
      <input type="text" class="form-control" id="alumnado" name="alumnado">
    </div>    
    <button type="submit" class="btn btn-default" name="enviar">Ingresar</button>
  </form>
  </div>


</div>

</body>
</html>