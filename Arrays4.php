<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 Arrays</title>

</head>

<body>
    
    <?php

    if (isset($_GET['NumElementos'])) {
        
        $numElementos = $_GET['NumElementos'];  // Recogemos el numero de elementos

    }


    if (isset($_GET['Ordenar'])) {
        
        $orden = $_GET['Ordenar'];  // Recogemos el numero de elementos

    }




    ?>


    <form name='f1' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>

        <label for='NumElementos'>NumElementos</label>
        <select name='NumElementos'>

            <?php


            echo "<option value=''></option>";

            for ($i = 5; $i <= 15; $i++) {

                echo "<option value='$i'>$i</option>";

            }
            ?>

        </select>

        <input type='submit' name='Mostrar' value='Mostrar'>

    </form>


    <?php


    function Rellenar(&$numeros, $numElementos)
    {



        for ($i = 0; $i < $numElementos; $i++) {

            $numeros[$i] = rand(10, 30);

        }

    }

    function Mostrar($numeros)
    {


        foreach ($numeros as $clave => $valor) {

            echo "$valor,";
        }



    }


    if ( (isset($_GET['Mostrar'])) || (isset($_GET['Ordenar'])) ) {
        
        $numeros = array();

        if (isset($_GET['Mostrar'])) {  // Se muestra

            Rellenar($numeros,$numElementos);
            Mostrar($numeros);
        }else {                         // Se ordena
            
            $arrayAnterior = $_GET['ArrayAnterior'];
        }

        echo "<fieldset>";   

    
        echo "<br>"; 
        echo "<br>"; 
         
        echo "<label for='Ordenar'>Orden</label>";
        echo "<select name='Ordenar' >";
        echo "   <option value=''></option>";
        echo "   <option value='1'>Ascendente</option>";
        echo "   <option value='2'>Descendente</option>";
        echo "<input type='submit' name='Ordenar' value='Ordenar'>";
        
        if (isset($_GET['Ordenar'])) {
            
            echo "hola";
        }

    }



    // Un desplegable entre 5 a 15 elementos, el randon del 1 al 30
    // Cuando le des a mostrar, tiene que aparecer el array que sea mostrado con clave valor
    // Cuando salga el array te sale un despegable que te diga el tipo de ordenacion que quieres
    // Si ascescendente o descendente
    ?>

</body>

</html>