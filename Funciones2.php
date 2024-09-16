<!DOCTYPE html>
<html lang="en">

<head>

    <title> Funciones2 </title>

</head>

<body>

    <form name='f1' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>

        <label for="Numero">Número</label><input type="number" name="Numero">


        <label for='Celda'>Celdas</label>
        <select name='Celda'>
            <option value=''></option>
            <option value='1'>Par</option>
            <option value='2'>Impar</option>
            <option value='3'>Primo</option>
        </select>

        <input type='submit' name='Mostrar' value='Mostrar'>

    </form>

    <?php

    function par($num)
    {

        if (($num % 2) == 0) {
            return true;
        } else {
            return false;
        }
    }

    function imPar($num)
    {

        if (($num % 2) != 0) {
            return true;
        } else {
            return false;
        }

    }

    function esPrimo($numero)
    {
        // Los números menores o iguales a 1 no son primos
        if ($numero <= 1) {
            return false;
        }

        // Comprobamos si el número es divisible por algún otro número entre 2 y la mitad de $numero
        for ($i = 2; $i <= $numero / 2; $i++) {
            if ($numero % $i == 0) {
                return false; // No es primo
            }
        }

        return true; // Es primo
    }

    function imprimirTabla($num,$celda)
    {
        $contador = 0;
        $condicon = true;

        echo "<table border='1'>";

   
        for ($i = 0; $i < $num; $i++) {

            echo "<tr>";

            for ($j = 0; $j < $num; $j++) {

                switch ($celda) {

                    case '1':
                       
                    
                    break;

                    
                    case '2':
                           
                    break;

                    
                    case '3':
                    
                    break;
                    
                    
                    
                    default:
                       
                    break;
                }
            }
            echo "</tr>";
        }
        echo "</table>";

    }

    if (isset($_GET['Mostrar'])) {

        $celda = $_GET['Celda'];
        $num = $_GET['Numero'];

        echo "<table border='1'>";


        for ($i = 0; $i < $num; $i++) {

            echo "<tr>";

            for ($j = 0; $j < $num; $j++) {

                echo "<td>2</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }


    ?>




</body>

</html>