<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form name='f1' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>

        <label for="Numero"></label>Numero<input name="Numero" type="Number">

        <input type="submit" name="Enviar" value="Enviar">

    </form>

    <?php

    if (isset($_GET['Enviar'])) {

        $numero = $_GET['Numero'];
        $columnas = $numero;
        $filas = $numero;
        $contador = 0;


        if ($numero < 2 || $numero > 8) {

            echo "Error, el numero no puede ser mayor que 8";

        } else {

            echo "<table border= '1'>";


            while ($filas > 0) {

                echo "<tr>";

                while ($columnas > 0) {

                    if ($columnas % 2 == 0) {

                        echo "<td>&nbsp</td>";
                    } else {

                        echo "<td bgcolor='black'>&nbsp</td>";
                    }
                    $columnas--;
                

                }
                
                $columnas = $numero;
                echo "</tr>";
                $filas--;
            }
            echo "</table>";




        }

    }

    ?>
</body>

</html>