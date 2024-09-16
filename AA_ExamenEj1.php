<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>

<body>

    <?php


    $filas = '';
    $columnas = '';

    $filas2 = '';
    $columnas2 = '';



    if (isset($_GET['Filas'])) {
        $filas = $_GET['Filas'];
    }

    if (isset($_GET['Columnas'])) {
        $columnas = $_GET['Columnas'];
    }


    if (isset($_GET['Filas2'])) {
        $filas2 = $_GET['Filas'];
    }

    if (isset($_GET['Columnas2'])) {
        $columnas2 = $_GET['Columnas2'];
    }


    function GenerarNumeros($filas, $columnas)
    {

        $numeros = array();

        for ($i = 1; $i <= $filas; $i++) {

            for ($j = 1; $j <= $columnas; $j++) {

                $numeroAleatorio = rand(1, 30);
                $numeros[] = $numeroAleatorio;

            }

        }

        return $numeros;

    }

    function mostrarTabla($numeros, $filas, $columnas)
    {

        $contador = 0;

        echo "<table border='2'>";

        for ($i = 1; $i <= $filas; $i++) {

            echo "<tr>";

            for ($j = 1; $j <= $columnas; $j++) {

                echo "<td>$numeros[$contador]</td>";

                $contador = $contador + 1;

            }

            echo "</tr>";



        }

        echo "</table>";

    }

    function dividir($numeros, $filas2, $columnas2)
    {

        $tamaño = count($numeros); // El tamaño de todos los numeros que hay en el array
    
        $contador = 0; // Contador que iremos sumando de uno en uno hasta llegar al final
    
        while ($contador <= $tamaño) { // Mientras que el contador sea menor que el tamaño
    
            echo "<table border='2'>"; // Pues hará una tabla rellenando
    
            for ($i = 1; $i <= $filas2; $i++) {

                echo "<tr>";

                for ($j = 1; $j <= $columnas2; $j++) {

                    if ($contador <= $tamaño) {

                        echo "<td>$numeros[$contador]</td>";
                        $contador = $contador + 1;

                    } else { // Esto es por si termina el array pero todavia hay filas y columnas que rellenar
    
                        echo " ";
                        $contador = $contador + 1;

                    }


                }

                echo "</tr>";

            }
            echo "<br>"; // Salto de linea quiere decir que justo ha acabao de rellenar un array
    
        }

    }

    ?>
    <form name='f1' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>


        <label for='Filas'>Filas</label>
        <select name='Filas'>
            <option value=''></option>
            <?php
            for ($i = 1; $i <= 10; $i++) {

                if ($i == $filas) {
                    echo "<option value='$i' selected >$i</option>";
                } else {
                    echo "<option value='$i'>$i</option>";
                }

            }
            ?>
        </select>



        <label for='Columnas'>Columnas </label>
        <select name='Columnas'>
            <option value=''></option>
            <?php
            for ($i = 1; $i <= 10; $i++) {

                if ($i == $columnas) {
                    echo "<option value='$i' selected >$i</option>";
                } else {
                    echo "<option value='$i'>$i</option>";
                }

            }
            ?>

            <input type="submit" name='Enviar' value='Enviar'>



            <?php

            if (isset($_GET["Enviar"]) || (isset($_GET['Dividir']))) { // Entramos si le damos al boton  
            
                $numeros = array();
                $filas = $_GET["Filas"];
                $columnas = $_GET["Columnas"];


                if (isset($_GET["Enviar"])) {

                    $numeros = GenerarNumeros($filas, $columnas);
                    $filas = $_GET["Filas"];
                    $columnas = $_GET["Columnas"];

                } else {

                    $arrayAnterior = $_GET['arrayAnterior']; // Recogemos el antiguo array para copiarlo de nuevo, en el caso de que se le haya dao a dividir
                    $filas = $_GET["FilasAnteriores"];
                    $columnas = $_GET["ColumnasAnteriores"];


                    $numeros = explode(",", $arrayAnterior); // Convertimos cadena en Array
                }

                mostrarTabla($numeros, $filas, $columnas);


                echo "hola";
                echo "<br><br>";

                echo "<label for='Filas2'>Filas</label>";
                echo "<select name='Filas2'>";
                echo "<option value=''></option>";

                for ($i = 1; $i <= 10; $i++) {

                    if ($i == $filas2) {
                        echo "<option value='$i' selected >$i</option>";
                    } else {
                        echo "<option value='$i'>$i</option>";
                    }

                }

                echo "</select>";

                echo "<label for='Columnas2'>Columnas </label>";
                echo "<select name='Columnas2'>";
                echo "<option value=''></option>";

                for ($i = 1; $i <= 10; $i++) {

                    if ($i == $columnas2) {
                        echo "<option value='$i' selected >$i</option>";
                    } else {
                        echo "<option value='$i'>$i</option>";
                    }

                }

                echo "<input type='submit' name='Dividir' value='Dividir'>";



                $anterior = implode(",", $numeros); // Convertimos el array de numeros en cadena
            
                echo "<input type='hidden' name='arrayAnterior' value='$anterior'>"; // Guardamos las copias que vayamos a utilizar
                echo "<input type='hidden' name='ColumnasAnteriores' value='$filas'>";
                echo "<input type='hidden' name='FilasAnteriores' value='$columnas'>"; // Guardamos la copia aqui 
            
                if (isset($_GET['Dividir'])) {

                    echo "hola";

                    $filas2 = $_GET['Filas2'];
                    $columnas2 = $_GET['Columnas2'];

                    dividir($numeros, $filas2, $columnas2);






                }



                /* TENEMOS QUE DIVIR EN SUB TABLAS COGIENDO LOS NUMEROS QUE NOS VAN DICIENDO


                */
            }







            ?>




</body>

</html>