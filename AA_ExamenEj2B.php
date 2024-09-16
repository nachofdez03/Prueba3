<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2B</title>
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


        function  comprobarClientes($estadoCivil,$depor) {

            $personas = array();

            if (isset($depor) && isset($estadoCivil)) { // Si tiene datos de los dos

                if (file_exists("Clientes.txt")) {
                
                    $fd = fopen("Clientes.txt", "r");

                    while (!feof($fd)) {

                        $linea = fgets($fd);
                        $campos = explode(" ", $linea);
                       
                        if ($campos[5] == $estadoCivil) {

                            echo "$campos";

                        }
                            
                }
            }
              
    
        }


        }
    
    function  MostrarPersonas($personas){

        foreach ($personas as $clave => $valor) {

            echo "$valor";
        }

    }




?>
<form name='f1' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>

<fieldset>
<legend>Busqueda de Clientes</legend>

        <legend>Estado Civil: </legend>

        <?php

        $estados = obtenerEstados();

        foreach ($estados as $clave => $valor) {
            
            echo "$valor<input type='radio' name='Estados' value='$valor' ";

            if ($esta==$clave)
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
            echo "<br>";
        
        }

        ?>
        <br>

        <input type="submit" name="Enviar" value= "Enviar">

        
</fieldset>
</form>

<?php

    if (isset($_GET["Enviar"])) {
        
        $estadoCivil = "";         // ESTADO CIVIL
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
            comprobarClientes($depor,$estadoCivil);
        }

    }



    /*Tenemos que guardadr las cosas en el isset, las mandamos a un metodo que compruebe si alguien tiene las seleccionados


    */

?>


</body>
</html>