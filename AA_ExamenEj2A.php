<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
</head>
<body>
    
<?php

$esta = "";
$depo = "";

if (isset($_GET["Estados"])) {
    
    $esta = $_GET["Estados"] ;
}

if (isset($_GET["Deportes"])) {
    
    $depo = $_GET["Deportes"] ;
}

    function obtenerEstados(){

        $estados = array();
        if (file_exists("Estados.txt")) {
            
            $fd = fopen("Estados.txt", "r");

            while (!feof($fd)) {

                $linea = fgets($fd);
                   
                   $campos = explode(" ", $linea);

                   if (count($campos) == 2) {

                    $estados[$campos[0]] = $campos[1];

                   }

            }
        }
        return $estados;
    }

    function obtenerDeportes(){

        $deportes = array();
        if (file_exists("Deportes.txt")) {
            
            $fd = fopen("Deportes.txt", "r");

            while (!feof($fd)) {

                $linea = fgets($fd);
                   
                   $campos = explode(" ", $linea);

                   if (count($campos) == 2) {

                    $deportes[$campos[0]] = $campos[1];

                   }

            }
        }
        return $deportes;
    }

    



?>
<form name='f1' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>

<fieldset>

        <legend>Alta de Clientes</legend>
        <label for='NIF'>NIF: </label><input type='text' name='NIF'><br>
        <label for='Nombre'>Nombre: </label><input type='text' name='Nombre'><br>
        <label for='Apellido1'>Apellido1: </label><input type='text' name='Apellido1'><br>
        <label for='Apellido2'>Apellido2: </label><input type='text' name='Apellido2'><br><br>

        <legend>Estado Civil: </legend>

        <?php

        $estados = obtenerEstados();

        foreach ($estados as $clave => $valor) {
            
            echo "$valor<input type='radio' name='Estados' value='$valor' ";

            if ($esta==$valor)
            {
                echo " checked ";
            }
         
            echo  ">";
        }

        ?>
        <br><br>

        <legend>Deportes: </legend>
        <?php

        $deportes = obtenerDeportes();
        
    
        foreach ($deportes as $clave => $valor) {

            $seleccion = explode(" ",$valor);

            echo "$valor<input type='Checkbox' name=Selec[".trim($seleccion[0])."]>";

            if ($clave == "Selec[".trim($seleccion[0])."]") {
                
                echo "checked";

            }
            echo "<br>";
        
        
        }

        ?>
        <br>

        <input type="submit" name="Guardar" value= "Guardar">

    

</fieldset>
</form>

<?php

if (isset($_GET["Guardar"]) || ( isset($_GET['Selec'] ) ) ) {

    $nif = $_GET["NIF"];
    $nombre = $_GET["Nombre"];
    $apellido1 = $_GET['Apellido1'];
    $apellido2 = $_GET['Apellido2'];
    $estadoCivil = "";
    $depor = "";

    if (isset($_GET["Estados"])) {
       
        $estadoCivil = $_GET["Estados"];
    }

    if (isset($_GET["Selec"])) {
        
        $selec=$_GET['Selec'];   //Recogemos el array con los códigos(NIF) de los checkboxes
   
        $claveDeporte=array();

        foreach ($selec as $clave => $valor) {
            
            $claveDeporte[]=$clave;
        }

        $depor=implode(' ',$claveDeporte);
    }
    $salto = "\r\n";

    


    $linea = $nif.' '.$nombre.' '.$apellido1." ".$apellido2." ".$estadoCivil. " ".$depor. " ". $salto;

    echo "$depor";

    $fd = fopen("Clientes.txt", "a+") or die("Error al abrir el archivo.");

    fputs($fd,$linea);

    fclose($fd);

}


?>
</body>
</html>