<html>

<title>Calculadora </title>

<body>

    <?php


    $resultado = '';
    $num = '';
    $num2 = '';

    if (isset($_GET['Calcular'])) {

        // Recogemos los datos
    
        $num = $_GET ['Numero'];
        $num2 = $_GET ['Numero2'];

        $operacion = $_GET['Operacion'];

        switch ($operacion) {

            case 1:

                $resultado = $num + $num2;

                break;

            case 2:

                $resultado = $num - $num2;

                break;

            case 3:

                $resultado = $num * $num2;

                break;

            case 4:

                if ($num2 != 0) {

                    $resultado = $num / $num2;

                } else {

                    echo "<b> ERROR, No se puede dividir por 0 </b>";
                   


                }


                break;



            default:

                break;


        }


    }
    ?>
    <form name='f1' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>

        <label for="Numero"> Numero</label><input type="text" name="Numero" value <?php echo "$num"; ?>>
        <label for="Numero2"> Numero2 </label><input type="text" name="Numero2" value <?php echo "$num2"; ?>>

        <br><br>

        <label for="Operacion">Operacion</label>

        <select name='Operacion'>

            <option value ''></option>
            <option value '1'>Suma</option>
            <option value '2'>Resta</option>
            <option value '3'>Multiplicacion</option>
            <option value '4>Division</option>

        </select>

    <br><br><input type="submit" name="Calcular" value= "Calcular">
    <label for="Resultado"> Resultado </label><input type="text" name = "Resultado" value <?php echo "$resultado"; ?>>



    </form>

    
    </body>
</html>