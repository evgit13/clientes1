<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del cliente</title>
   <link href="estilosclientes.css" rel="stylesheet">
</head>
<body>

<form action="agregarclientes.php" method="POST" target="" name="clientes" class="form">

  <h4>DATOS DEL CLIENTE</h4>

 
  <p type="Nombre:"><input name="nombre" placeholder="Escriba su nombre.."></input></p>
  <p type="Apellido Paterno:"><input name="ap_p" placeholder="Escriba su Apellido Paterno.."></input></p>
  <p type="Apellido Materno:"><input name="ap_m" placeholder="Escriba su Apellido Materno.."></input></p>
  <p type="Estado:"><input name="estado"  placeholder="Escriba su Estado.."></input></p>
  <p type="Localidad:"><input name="localidad" placeholder="Escriba su Localidad.."></input></p>
  <p type="Calle y número:"><input name="calleynum" placeholder="Escriba su Calle y el Número.."></input></p>
  <p type="Código postal:"><input name="cdp" placeholder="Escriba su Código Postal.."></input></p>
  <p type="Teléfono:"><input name="tel" placeholder="Escriba su Teléfono.."></input></p>
   
  <button type="button" onclick="validarFormulario()">Agregar</button>
  <div>
  <span class="fa fa-phone"></span>3257859232
    <a href="crudclientes.php"> <span style="color: white;">Lista de clientes</span> 
  </div>

</form>
<script>
function validarFormulario() {
  const campos = ["nombre", "ap_p", "ap_m", "estado", "localidad", "calleynum", "cdp", "tel"];
  let vacio = false;

  for (let i = 0; i < campos.length; i++) {
    const valor = document.forms["clientes"][campos[i]].value.trim();
    if (valor === "") {
      vacio = true;
      break;
    }
  }

  if (vacio) {
    alert("Por favor, llena todos los campos antes de continuar.");
  } else {
    document.forms["clientes"].submit();
  }
}
</script>
</body>
</html>
