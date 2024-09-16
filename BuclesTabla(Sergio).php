<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 1</title>
</head>

<?php

$filas='';
$columnas='';
$contenido='';

if (isset($_GET['Filas'])) {
    $filas=$_GET['Filas'];
}

if (isset($_GET['Columnas'])) {
    $columnas=$_GET['Columnas'];
}

if (isset($_GET['Contenido'])) {
    $contenido=$_GET['Contenido'];
}

?>

<body>

<!--Aquí utilizamos una sentencia para hacer referencia a esta propia hoja-->
<form name='f1' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
  
    <label for='Contenido'>Contenido</label>
        <input type='text' name='Contenido' value='<?php echo "$contenido"; ?>'>



<label for='Filas'>Filas</label>
<select name='Filas'>
<option value=''></option>
    <?php
    for ($i=1; $i <= 10; $i++) { 

        if ($i == $Filas) {
            echo "<option value='$i' selected >$i</option>";
        } else {
            echo "<option value='$i'>$i</option>";
        }

    }
    ?>
</select>

<label for='Columnas'>Columnas</label>
<select name='Columnas'>
<option value=''></option>
    <?php
    for ($i=1; $i <= 10; $i++) { 

        if ($i == $columnas) {
            echo "<option value='$i' selected >$i</option>";
        } else {
            echo "<option value='$i'>$i</option>";
        }

    }
    ?>
</select>

    <input type="submit" name='Enviar' value='Enviar'>

</form>

<?php

if (isset($_GET['Enviar'])) {

echo "<table border='2'>";

for ($i=0; $i < $filas; $i++) { 
    
    echo "<tr>";

    for ($j=0; $j < $columnas; $j++) { 
        echo "<td>$contenido</td>";
     }
     echo "</tr>";
}

echo "</table>";

}

?>

</body>
</html>