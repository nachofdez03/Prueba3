<html>

    <title>Formulario 3</title>

    <body>
    
    
    <form name= 'f1' method='get' action = '<?php echo $_SERVER['PHP_SELF']; ?>'>

    <label for="Nombre"> Nombre</label><input type="text" name = "Nombre">
    <label for="Apellido"> Apellido </label><input type="text" name = "Apellido">
    <label for="Apellido2"> Apellido2 </label><input type="text" name = "Apellido2">

    <input type="submit" name="Enviar" value= "Enviar">

    <fieldset> <!-- Permite agrupar en grupos los campos del formulario -->

    <legend>intereses</legend>

    <label for="Futbol">Futbol</label><input type="Checkbox" name = "Futbol" >
    <label for="Tenis">Tenis</label><input type="Checkbox" name = "Tenis">
    <label for="Billar">Billar</label><input type="Checkbox" name = "Billar">

    </fieldset>
    <fieldset>

    <legend>Estado Civil</legend>

    Soltero<input type="radio" name="Estado" value="Soltero" checked>
    Casado<input type="radio" name="Estado" value="Casado">

    </fieldset>

    <label for="Pais">Pais</label>

        <select name = 'Pais'>
            
            <option value ''></option>
            <option value '1'>España</option>
            <option value '2'>Francia</option>
            <option value '3'>Catalunya</option>

         </select>
    <br>
    <br>
   
    <textarea name="Observaciones" id="" cols="40" rows="5">Indique sus Observaciones
    </textarea>


    </form>

    <?php

    if(isset($_GET['Enviar'])){    // Si pulso el boton enviar, recogemos los datos del nombre

    $nombre = $_GET['Nombre'];
    $apellido = $_GET['Apellido'];
    $apellido2 = $_GET['Apellido2'];

    echo "El usuario: $nombre $apellido $apellido2 <br>";
    
       //Recogemos los intereses de la etiqueta legend

    if(isset($_GET['Futbol']))
        
    {
        echo "Futbol";
    }

    if(isset($_GET['Tenis']))
        
    {
        echo "Tenis";
    }

    if(isset($_GET['Tenis']))
        
    {
        echo "Tenis";
    }


    

    $pais = $_GET['Pais'];
    echo "<br>Pais seleccionado: $pais ";
     
    $estadoCivil = $_GET['Estado'];
    echo "<br>Estado Civil: $estadoCivil";

    $observaciones = $_GET['Observaciones'];
    echo "<br> observaciones: $observaciones";
  

    }
    
   


    ?>
    </body>
</html>