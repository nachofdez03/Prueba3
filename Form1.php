<html>

    <title>Formulario 1</title>

    <body>
    
                                            
    <form name= 'f1' method='get' action = '<?php echo $_SERVER['PHP_SELF']; ?>'>

    <label for="Nombre"> Nombre</label><input type="text" name = "Nombre">
    <label for="Apellido"> Apellido </label><input type="text" name = "Apellido">
    <label for="Apellido2"> Apellido2 </label><input type="text" name = "Apellido2">

    <input type="submit" name="Enviar" value= "Enviar">



    </form>

    <?php

    // Me han llegado los datos del formulario

    if (isset($_GET['Enviar']))
    {
    
    $nombre =$_GET ['Nombre'];
    $apellido = $_GET['Apellido'];
    $apellido2 = $_GET['Apellido2'];

    echo "Hola $nombre $apellido $apellido2";

    }

    ?>
    </body>
</html>