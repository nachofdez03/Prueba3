<html>

<title> Login </title>



<body>

    <form name='ordenar' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>


        <label for="Usuario"> Usuario</label><input type="text" name="Usuario">
        <label for="Contraseña"> Contraseña </label><input type="password" name="Contraseña">

        <input type="submit" name="Login" value="Login">

    </form>

    <?php

    $usuario = "root";
    $contraseña = "clave123";

    if (isset($_GET['Login'])) {

        $usu = $_GET['Usuario'];
        $contra = $_GET['Contraseña'];

        if ($usu == $usuario) {

            if ($contra == $contraseña) {

                echo "<br> login realizado correctamente";

            } else {

                echo "<br> login incorrecto";
            }

        } else {


            echo "<br> <b> Formulario de registro: </b>";

            echo "<form name='f2'method='get' action=".$_SERVER['PHP_SELF'].">";
            echo "<label for='Usuario'> Usuario</label><input type='text' name='Usuario'>";
            echo "<label for='Contraseña'> Contraseña </label><input type='password' name='Contraseña'>";
            echo "<label for='Correo'> Correo </label><input type='text' name='Correo'>";

            echo "<br> <input type='submit' name='Registrar' value = 'Registrar'>";
           
        }

        if (isset($_GET['Registrar'])) {
                
            $usu = $_GET['Usuario'];
            $contra = $_GET['Contraseña'];
            $correo = $_GET['Correo'];

             echo "Usuario registrado con los datos: <br>";  
             echo "Usuario: $usu <br>";
             echo "Clave: $contra <br>";
             echo "Correo electrónico: $correo <br>";

            }
      



    }
  


    /* Tendras que crear un formulario de login, que pida usuario y contraseña: suponomes que el usuario y contraseña
    Esta declarada al inicio debido a que todavia no hemos visto como almacenar datos
    Si el usuario existe pero la clave es incorrecta poner: Error clave incorrecta pero si pone otro usuario que no es el
    root
    Tendra que poner debajo del usuario de login un usuario de login con el nombre la clave y correo y poner un boton que
    ponga
    se ha registrado correctamente
    usuario = root y contraseña = clave */

    ?>


</body>









</html>