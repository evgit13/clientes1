<?php
      require 'conexion_bd.php';

      $nombre = $_POST ['nombre'];
      $ap_p = $_POST ['ap_p'];
      $ap_m = $_POST ['ap_m'];
      $estado = $_POST ['estado'];
      $localidad = $_POST ['localidad'];
      $calleynum = $_POST ['calleynum'];
      $cdp = $_POST ['cdp'];
      $tel = $_POST ['tel'];

      $insert = "INSERT INTO clientes (nombre, ap_p, ap_m, estado, localidad, calleynum, cdp, tel)
           VALUES ('$nombre', '$ap_p', '$ap_m', '$estado', '$localidad', '$calleynum', '$cdp', '$tel')";
      $query = mysqli_query($conexion, $insert);

if($query){
    echo "<script> alert('Se agrego registro correctamente'); location.href='clientes.php';</script>";    
}
else{
    echo "<script> alert('Registro duplicado'); location.href='clientes.php';</script>";     
}
?>
