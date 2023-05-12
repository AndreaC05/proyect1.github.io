<?php

    include('conexion.php');
    
    if (isset($_POST['btnEnviar'])){

        $sql = "SELECT max(ID) FROM trabajadores";

        $rs = mysqli_query($conn,$sql);

        $fila = mysqli_fetch_row($rs);

        if($fila[0] == NULL){
            $id = "1";
        }else {
            $id = str_pad($fila[0]+1,1,STR_PAD_LEFT);
        }

        $nombre = $_POST['txtName'];
        $categoria = $_POST['txtCategoria'];
        $horas_extra = $_POST['txtPago'];
        $tardanzas = $_POST['txtTardanzas'];

        $sql = "INSERT INTO trabajadores(ID,nombre, categoria, horas_extra, tardanzas) VALUES ('$id','$nombre','$categoria','$horas_extra', '$tardanzas')";

        mysqli_query($conn,$sql);

        mysqli_close($conn);

        header("location: mostrar_datos.php");
    }

?>