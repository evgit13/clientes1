<?php
require 'conexion_bd.php';

$consulta = "SELECT * FROM clientes";

if (isset($_POST['consulta']) && $_POST['consulta'] != '') {
    $busqueda = mysqli_real_escape_string($conexion, $_POST['consulta']);
    $consulta = "SELECT * FROM clientes WHERE 
    CONCAT(nombre, ' ', ap_p, ' ', ap_m, ' ', estado, ' ', localidad, ' ', calleynum, ' ', cdp, ' ', tel) 
    LIKE '%$busqueda%'";

}

$resultado = mysqli_query($conexion, $consulta);
?>

<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Estado</th>
            <th>Localidad</th>
            <th>Calle y número</th>
            <th>Código Postal</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (mysqli_num_rows($resultado) > 0): ?>
            <?php while ($cliente = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td><?= $cliente['nombre'] ?></td>
                    <td><?= $cliente['ap_p'] ?></td>
                    <td><?= $cliente['ap_m'] ?></td>
                    <td><?= $cliente['estado'] ?></td>
                    <td><?= $cliente['localidad'] ?></td>
                    <td><?= $cliente['calleynum'] ?></td>
                    <td><?= $cliente['cdp'] ?></td>
                    <td><?= $cliente['tel'] ?></td>
                    <td>
                        <a href="editarcliente.php?id=<?= $cliente['id_cliente'] ?>">Editar</a> 
                        <a href="eliminarcliente.php?id=<?= $cliente['id_cliente'] ?>" onclick="return confirmar()">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        <?php else: ?>
            <tr><td colspan="9">No se encontraron resultados</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<?php mysqli_close($conexion); ?>