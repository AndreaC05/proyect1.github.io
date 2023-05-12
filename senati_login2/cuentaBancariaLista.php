<?php
session_start();

require_once('Usuario.php');
require_once('cuentaBancariaDAO.php');

// Verificamos si hay una sesión activa
if(isset($_SESSION['usuario'])) {
  // Obtenemos el objeto Usuario de la sesión
  $usuario = unserialize($_SESSION['usuario']);
} else {
  // Redirigimos al login
  header("Location: index.php");
}

// Verificamos si se ha enviado el formulario
if(isset($_POST['eliminar'])) {
  $objeto = new cuentaBancariaDAO();
  $bancarias = $objeto->obtenerCuenta();
  foreach($bancarias as $bancaria) {
    if(isset($_POST['eliminar_'.$bancaria['codigo']])) {
      $objeto->eliminarCuenta($bancaria['codigo']);
    }
  }
}

$objeto = new cuentaBancariaDAO();
$bancarias = $objeto->obtenerCuenta();

?>

<!DOCTYPE html>
<html>
<head>
  <title>VENTANA</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <h2>PAGINA</h2>
  <p class="text-right">Hola <?php echo $usuario->nombres; ?></p>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a href="welcome.php">Inicio</a></li>
        <li><a href="alumnolista.php">Alumno</a></li>
        <li><a href="ProductoLista.php">Producto</a></li>
        <li><a href="cuentaBancariaLista.php">Cuentas Bancarias</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Salir</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h2>Cuentas Bancarias</h2>
    <form method="post" action="">
      <?php if(isset($error)) { ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
      <?php } ?>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Cuenta</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($bancarias as $bancaria) { ?>
            <tr>
              <td><?php echo $bancaria['nombre']; ?></td>
              <td><?php echo $bancaria['dni']; ?></td>
              <td><?php echo $bancaria['cuenta']; ?></td>
              <td>
                <div class="checkbox">
                  <label><input type="checkbox" name="eliminar_<?php echo $bancaria['codigo']; ?>">Eliminar</label>
                </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <a href="cuentaBancariaForm.php" class="btn btn-success">AGREGAR</a>
      <a href="cuentaBancariaEditar.php" class="btn btn-warning">EDITAR</a>
      <button type="submit" class="btn btn-danger" name="eliminar">Eliminar seleccionados</button>
    </form>
  </div>


</div>

</body>
</html>