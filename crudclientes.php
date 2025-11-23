<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>

    <link rel="stylesheet" href="estilocrud1.css">
    <script type="text/javascript">
        function confirmar() {
            return confirm('¿Estás segur@? Se eliminarán todos los datos del cliente.');
        }
    </script>
</head>
<body>

<?php 
require 'conexion_bd.php';
$sql = "SELECT * FROM clientes";
$resultado = mysqli_query($conexion, $sql);
?>

<h1>Lista de Clientes</h1>
<a href="clientes.php">Agregar Cliente</a><br><br>
<input type="text" id="busqueda" placeholder="Buscar cliente..." autocomplete="off"><br><br>
<style>
#busqueda {
    width: 300px;
    padding: 10px 15px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 25px;
    outline: none;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    margin-bottom: 20px;
}

#busqueda:focus {
    border-color: #4285f4;
    box-shadow: 0 0 5px rgba(66, 133, 244, 0.5);
}
</style>
<div id="tabla_clientes">

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
    </tbody>
</table>
</div>
<button onclick="mostrarCreditos()">Créditos</button>
<?php mysqli_close($conexion); ?>
<script>
    function buscarCliente() {
        var texto = document.getElementById("busqueda").value;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "buscarclientes.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("tabla_clientes").innerHTML = xhr.responseText;
            }
        };
        xhr.send("consulta=" + encodeURIComponent(texto));
    }

    document.addEventListener("DOMContentLoaded", function() {
        buscarCliente(); // Cargar todos los datos al inicio
        document.getElementById("busqueda").addEventListener("keyup", buscarCliente);
    });
</script>
<script>
function mostrarCreditos() {
    alert("Integrantes:\n\nLópez Zarate Andrea Monserrat\nVirgen Rico Yuliana\nNápoles Castellanos Stephanie Angeline\nRobles López Evelyn Gitzel\n\nGrupo 5C - Carrera Programación");
}
</script>
</body>
</html>