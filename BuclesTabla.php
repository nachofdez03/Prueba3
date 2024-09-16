<html>

<title> Tabla De Bucles</title>

<head>

    <?php

    $contenido = '';
    $filas = '';
    $columnas = '';

    if (isset($_GET['Contenido'])) {

        $contenido = $_GET['Contenido'];
    }

    if (isset($_GET['Filas'])) {

        $filas = $_GET['Filas'];
    }

    if (isset($_GET['Columnas'])) {

        $columnas = $_GET['Columnas'];
    }



    ?>



</head>


<Body>

    <form name='f1' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
    <label for="Contenido">Contenido</label><input type="text" name='Contenido' value='<?php echo "$contenido"; ?>'>

    <label for="Filas">Filas</label>
    <select name="Filas">
        <option value=''></option>

        <?php

        for ($i = 0; $i < 10; $i++) {

            if ($i == $filas) {

                echo "<option value='$i'selected>$i</option>";

            } else {

                echo "<option value='$i'>$i</option>";

            }

        }

        ?>

    </select>

    <label for="Columnas">Columnas</label>
    <select name="Columnas">
        <option value=''></option>

        <?php

        for ($i = 0; $i < 10; $i++) {

            if ($i == $columnas) {

                echo "<option value='$i'selected>$i</option>";

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

        for ($i = 0; $i < $filas; $i++) {

            echo "<tr>";

            for ($j = 0; $j < $columnas; $j++) {

                echo "<td>$contenido</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

    }





    // Crear una pagina php que reciba por pantalla un numero de filas y de columnas mas un campo de texto que se llame contenido
    // En un despegables, pedir si quieres en filas o en columnas (en despegable)
    
    ?>




</Body>



</html>