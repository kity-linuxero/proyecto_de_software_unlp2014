<?php

require_once './php/ValidadorSesion.php';

$sesion= ValidadorSesion::validar();

if(!$sesion){
	header('Location: index.html'); 
	
  exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Alta de </title>

    <link rel="stylesheet" media="screen" href="./estilos/form.css" >
    <link rel="stylesheet" media="(max-width: 320px)" href="./estilos/formMobile.css" />
    
    
</head>
<body>

<form class="formulario" method="post" name="formulario" action="./controlador.php?action=altaEntidad">

<ul>
    <li>
         <h2>Alta de Entidades receptoras</h2>

		<!-- Fecha -->
         <span class="textoChico">Fecha de alta<input type="text" name="fecha" pattern="\d{1,2}/\d{1,2}/\d{4}" title="Ingrese una fecha válida" placeholder="DD/MM/AAAA" ></span>      
    </li>
    <li>
        <label for="razon">*Razón social:</label>
        <input type="text" name="razon" required/>
    </li>
    <li>
        <label for="tel">*Teléfono:</label>
        <input type="tel" name="tel" required/>
    </li>
    
    <li>
        <label for="domicilio">*Domicilio:</label>
        <input type="text" name="domicilio" required/>
    </li>
    
   
    <li><label for="servicio">Servicio prestado</label>
    <select name="servicio">
		<option value=1>Comedor infantil</option> 
		<option value=2>Hogar de dia</option> 
		<option value=3>Hogar de adolescentes</option>
		<option value=4>Jardin maternal</option> 
	</select>
    </li>
    
    
    
    
    <li><label for="necesidad">Necesidad</label>
    <select name="necesidad">
		<option value=1>Máxima</option> <!-- Maxima será el id 1-->
		<option value=2>Mediana</option> <!-- Mediana será el id 2-->
		<option value=3>Mínima</option> <!-- Mínima será el id 3-->
	</select>
    </li>
    
	<li><label for="estado">Estado</label>
    <select name="estado">
		<option value=1>Alta</option> <!-- Alta id 1-->
		<option value=2>En trámite</option> <!-- En trámite id 2-->
		<option value=3>Suspendida</option> <!-- Suspendida id 3-->
		<option value=4>Baja</option> <!-- Baja id 4-->
	</select>
    </li>

<li>
    <button type="submit" name= "boton">Generar Alta</button>
</li>

</ul>
<div class="obligatorios">*Campos obligatorios</div>


</form>



</body>
</html>