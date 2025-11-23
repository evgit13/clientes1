
<?php
require 'conexion_bd.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM clientes WHERE id_cliente = $id";
    mysqli_query($conexion, $sql);
}

header("Location: crudclientes.php");
?>