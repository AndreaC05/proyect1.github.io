<?php include('conexion.php')?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container"> 
    <div class="row">
        

        <div class="col-md-6 offset-md-3">

            <h1 class="text-center">Formulario de Trabajadores</h1>

            <form class="form-block p-2 m-5 w-50" action="insertar_datos.php" name="frmDatos" method="POST">

                <div class="form-group">
                    <label for="name">Nombre: </label>
                    <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Nombre" name="txtName">
                </div>

                <div class="form-group">

                    <label for="categoria">Categoria: </label>
                    <input type="text" class="form-control" id="categoria" aria-describedby="categoria" placeholder="Categoria" name="txtCategoria">

                </div>

                <div class="form-group">

                    <label for="pago">Pago por hora extra: </label>
                    <input type="text" class="form-control" id="pago" aria-describedby="pago" placeholder="Pago por hora extra" name="txtPago">

                </div>

                <div class="form-group">

                    <label for="tardanzas">Tardanzas (min): </label>
                    <input type="text" class="form-control" id="tardanzas" aria-describedby="tardanzas" placeholder="Tardanzas" name="txtTardanzas">

                </div>
            
                <button type="submit" class="btn btn-primary form-control mt-2" name="btnEnviar">Enviar</button>
            </form>

            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        </div>
        
    </div>
</div>
    