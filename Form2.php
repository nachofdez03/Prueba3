<html>

    <title>Formulario 2</title>

    <body>
    
    
    <form name= 'f2' method='get' action = '<?php echo $_SERVER['PHP_SELF']; ?>'>

    <label for="Nombre"> Nombre</label><input type="text" name = "Nombre">
    <label for="Apellido"> Apellido </label><input type="text" name = "Apellido">
    <label for="Apellido2"> Apellido2 </label><input type="text" name = "Apellido2">

    <input type="submit" name="Principio" value= "Principio">
    <input type="submit" name="Final" value="Final">



    </form>

    <?php

    //Recibimos los datos que vienen de Form1.php


    // El if indica que deben existir los datos en la url para que no haya error
    if (isset($_GET['Principio']))

    {

    $nombre =$_GET ['Nombre'];
    $apellido = $_GET['Apellido'];
    $apellido2 = $_GET['Apellido2'];

    echo "<table border = 2>";
    echo "<th>$nombre</th><th>$apellido</th><th>$apellido2</th>";
    echo "</table>";
  

    
    }

    if (isset($_GET['Final'])) 
    {
    
        $nombre =$_GET ['Nombre'];
        $apellido = $_GET['Apellido'];
        $apellido2 = $_GET['Apellido2'];

        echo "<table border = 2>";
        echo "<th>$apellido</th><th>$apellido2</th><th>$nombre</th>";
        echo "</table>";

    }

    ?>
    </body>
</html>