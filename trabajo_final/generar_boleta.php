<?php

    include('conexion.php');
    include('trabajadores.php');
    include('boleta.php');
    
    if (isset($_POST['btnEnviar'])){

        $query = "SELECT * FROM trabajadores";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {

                $trabajador = new Trabajador($row['nombre'], 
                    $row['categoria'] , 
                    $row['horas_extra'] , 
                    $row['tardanzas']);

                $boleta = new Boleta($row['nombre'], 
                    $row['categoria'] , 
                    $row['horas_extra'] , 
                    $row['tardanzas']);

                echo "<p style='color:red'>Trabajador: </p>";
                echo "<p>{$trabajador}</p>";

                echo "<p style='color:red'>Boleta: </p>";
                echo "<p>{$boleta->imprimir_boleta()}</p>";
            
            }

        }

    }

?>