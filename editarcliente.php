<?php
require 'conexion_bd.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id_cliente = $id";
    $resultado = mysqli_query($conexion, $sql);
    $cliente = mysqli_fetch_assoc($resultado);
}

if (isset($_POST['actualizar'])) {
    $id = $_POST['id_cliente'];
    $nombre = $_POST['nombre'];
    $ap_p = $_POST['ap_p'];
    $ap_m = $_POST['ap_m'];
    $estado = $_POST['estado'];
    $localidad = $_POST['localidad'];
    $calleynum = $_POST['calleynum'];
    $cdp = $_POST['cdp'];
    $tel = $_POST['tel'];

    $sql = "UPDATE clientes SET 
        nombre = '$nombre',
        ap_p = '$ap_p',
        ap_m = '$ap_m',
        estado = '$estado',
        localidad = '$localidad',
        calleynum = '$calleynum',
        cdp = '$cdp',
        tel = '$tel'
        WHERE id_cliente = $id";

    $actualizado = mysqli_query($conexion, $sql);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="estilosclientess.css">
    <?php if (isset($actualizado)): ?>
        <meta http-equiv="refresh" content="2;url=crudclientes.php">
    <?php endif; ?>
</head>
<body>

<?php if (isset($actualizado)): ?>
    <div class="form">
        <h4>✅ Cliente actualizado correctamente</h4>
        <p>Serás redirigida a la lista de clientes en unos segundos...</p>
        <a href="crudclientes.php">Ir ahora</a>
    </div>
<?php else: ?>
    <form method="POST" class="form">
        <h4>Editar Cliente</h4>
        <input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente'] ?>">
        <p><input type="text" name="nombre" value="<?= $cliente['nombre'] ?>" placeholder="Nombre"></p>
        <p><input type="text" name="ap_p" value="<?= $cliente['ap_p'] ?>" placeholder="Apellido Paterno"></p>
        <p><input type="text" name="ap_m" value="<?= $cliente['ap_m'] ?>" placeholder="Apellido Materno"></p>
        <p><input type="text" name="estado" value="<?= $cliente['estado'] ?>" placeholder="Estado"></p>
        <p><input type="text" name="localidad" value="<?= $cliente['localidad'] ?>" placeholder="Localidad"></p>
        <p><input type="text" name="calleynum" value="<?= $cliente['calleynum'] ?>" placeholder="Calle y número"></p>
        <p><input type="text" name="cdp" value="<?= $cliente['cdp'] ?>" placeholder="Código Postal"></p>
        <p><input type="text" name="tel" value="<?= $cliente['tel'] ?>" placeholder="Teléfono"></p>
        <button type="submit" name="actualizar">Actualizar</button>
    </form>
<?php endif; ?>

</body>
</html>