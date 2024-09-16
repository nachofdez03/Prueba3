<!DOCTYPE html>
<html lang="en">


<body>

    <!--Aquí utilizamos una sentencia para hacer referencia a esta propia hoja-->
    <form name='f1' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>




        <label for='Tamaño'>Tamaño</label>
        <select name='Tamaño'>
            <option value=''></option>
            <?php

            for ($i = 1; $i <= 10; $i++) {

                if ($i == $Filas) {
                    echo "<option value='$i' selected >$i</option>";
                } else {
                    echo "<option value='$i'>$i</option>";
                }

            }

            ?>
        </select>

        <label for='Tipo'>Tipo</label>
        <select name='Tipo'>
            <option value=''></option>
            <option value='1'>Filas</option>
            <option value='2'>Columnas</option>

        </select>


        <label for="Contenido">Contenido</label><input type="text" name = "Contenido">

        <input type="submit" name='Mostrar' value='Mostrar'>

    </form>

    <?php

    if (isset($_GET['Mostrar'])) {

        $tamaño = $_GET['Tamaño'];
        $tipo = $_GET['Tipo'];
        $contenido = $_GET['Contenido'];

        if ($tipo == 1) {

            $filas = $tamaño;
            $columnas = 1;

        }

        if ($tipo == 2) {

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