<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>

</head>

<body>

    <form name='f1' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>

        <label for="Contendio">Contenido</label><input type="text" name="Contenido">

        <label for="Tipo">Tipo</label>
            <select name="Tipo">
                <option value='1'></option>
                <option value='2'>Fila</option>
                <option value='3'>Columna</option>
            </select>

        
        <label for="Tamaño">Tamaño</label><input type="text" name= "Tamaño">

        <input type="submit" name='Mostrar' value='Mostrar'>

    </form>

    <?php

    if (isset($_GET['Mostrar'])) {
        
        $contenido = $_GET['Contenido'];
        $tamaño = $_GET['Tamaño'];
        $tipo = $_GET['Tipo'];
        $filas = '';
        $columnas = '';

        if ($tipo == 1) {

            $filas = $tamaño;
            $columnas = 1;
         
         }else if ($tipo == 2) {

            $filas = 1;
            $columnas = $tamaño;

         }      
         
         
         echo "<table border='2'>";

        for ($i = 0; $i<$filas; $i++) {

            echo "<tr>";

            for ($j = 0; $j<$columnas; $j++) {
                echo "<td>$contenido</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
            }
      







    // Crear una pagina php que reciba por pantalla un numero de filas y de columnas mas un campo de texto que se llame contenido
    // En un despegables, pedir si quieres en filas o en columnas (en despegable)

    ?>

</body>

</html>