<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$tam = "";

if (isset($_GET['Tamaño'])) {
    
    $tam = $_GET['Tamaño'];
}

function GenerarNumeros($tamaño){

    $numeros = array();

    for ($i=1; $i <=$tamaño ; $i++) { 

        for ($j=1; $j <=$tamaño ; $j++) { 
            
            $numeroAleatorio = rand(1,20);
            $numeros[] = $numeroAleatorio;
      
        }

    }

    return $numeros;

}

function mostrarTabla($numeros,$tamaño){

    $contador = 0;

    echo "<table border='2'>";

    for ($i=1; $i <=$tamaño ; $i++) { 

        echo "<tr>";
        
        for ($j=1; $j <=$tamaño ; $j++) { 
            
            echo "<td>$numeros[$contador]</td>";

            $contador = $contador + 1;
        
        }

        echo "</tr>";



    }

    echo "</table>";

}

?>
    
<form name='f1' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>

<label for="Tamaño">Tamaño:</label>
<select name="Tamaño">
<option value=""></option>

<?php

 for ($i = 1; $i <= 5; $i++) {

    if ($i == $tam) {

        echo "<option value='$i'selected>$i</option>";

    } else {

        echo "<option value='$i'>$i</option>";

    }

}

?>

</select>
<input type='submit' name='Mostrar' value='Mostrar'>
</form>

<?php

if (isset($_GET['Mostrar'])) {
    
    $tamaño = $_GET['Tamaño'];

    $numeros = GenerarNumeros($tamaño);
    mostrarTabla($numeros,$tamaño);

    $copia = implode(" ",$numeros); // Convertimos el array de numeros en cadena

    echo "<br>";
    echo "<input type='submit' name='Ascendente' value='Ascendente'>";
    echo "<input type='submit' name='Descendente' value='Descendente'>";
    echo "<input type='hidden' name='Copia' value='$copia' > ";
}

if (isset($_GET['Ascendente'])) {

    echo "Botón Ascendente presionado";
    $tamaño = $_GET['Tamaño'];
    $copia = $_GET['Copia'];
    $numeros = explode(" ",$copia); // Creamos el array
    sort($numeros);
    mostrarTabla($numeros,$tamaño);

}


if (isset($_GET['Descendente'])) {  
    
    $tamaño = $_GET['Tamaño'];
    $copia = $_GET['Copia'];
    $numeros = explode(" ",$copia);
    rsort($numeros);
    mostrarTabla($numeros,$tamaño);

 
    


}


?>

</body>
</html>