<!DOCTYPE html>
<html lang="en">

<head>

    <title>Bucles2Formulario</title>

</head>

<body>

    <form name='f1' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>

        <label for="Numero"></label>Numero<input type="Number">

        <input type="submit" name="Enviar" value="Enviar">

    </form>

    <?php

    if (isset($_GET['Enviar'])) {


        $numero = $_GET['Numero'];
        $contador = 0;

        if ($numero < 2 || $numero > 8) {

            echo "Error, el numero no puede ser mayor que 8";

        } else {

            echo "<table border= '1'>";

            while ($contador <= $numero) {

                for ($i = 0; $i < $numero; $i++) {

                    echo "<tr>";

                    for ($j = 0; $j < $numero; $j++) {

                        $condicion = 'false';

                        while ($numero <= $j || $condicion == true) {

                            if (($numero % $i) == 0) {


                                $condicion = false;
                            }


                        }

                        if ($condicion == true) {

                            echo "<td>$numero</td>";
                            $contador++;
                        }

                    }

                    echo "</tr>";
                }
            }

            echo "</table>";

        }
    }

    //mediante un forulario con un campo de entreada que te pida un numero n
//validar que el numero este entre 2 y 8
//si no, que muestre un error para que introduzca el numero correctamente
    
    ?>
</body>

</html>