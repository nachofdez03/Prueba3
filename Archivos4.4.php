<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php

$cur = "";
$ciclo = "";

if (isset($_GET["Curso"])) {

    $cur = $_GET["Curso"];


} 

if (isset($_GET["Ciclos"])) {

    $ciclo = $_GET["Ciclos"];
 
}




?>
   <form name='f1' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
<fieldset>
            <legend>Alta de Modulos</legend>
            <label for='Nombre'>Nombre </label><input type='text' name='Nombre'>
            
            <label for='Curso'>Curso:</label>
            <select name='Curso'>
               <option value=''></option>

               <?php

                $curso = array(1,2);

                foreach ($curso as $clave => $valor) {
                    
                    echo "<option value='$clave' ";
                  
                  if (  $curso==$valor)
                  {
                      echo " selected ";
                  }
                      
                   
                  echo ">$valor</option>"; 
                }
            
                ?>
                </select>
                

            <label for='Ciclos'>Ciclos:</label>
            <select name='Ciclos'>
               <option value=''></option>

               <?php

                 $ciclos = ObtenerCiclos();

                foreach ($ciclos as $clave => $valor) {
    
                 echo "<option value='$clave' ";
  
                if (  $ciclo==$valor)
                {
                  echo " selected ";
                }
      
   
                echo ">$valor</option>"; 
                }

?>
 </select>
 <input type='submit' name='Guardar' value='Guardar'>
 </form>

<?php


     function ObtenerCiclos(){

        $ciclos = array();

        if (file_exists("Ciclos.txt")) {

            $fdd = fopen("Ciclos.txt","r") or die("No se puede abrir el archivo");

            while(!feof($fdd)){ // Mientras haya linea

                $linea = fgets($fdd);

                $campos = explode(" ", $linea);

                if (count($campos)==2) {
                    
                    $ciclos[$campos[0]] = $campos[1];

                }


            }

            return $ciclos;

            
            
        }
                

       }


// Formulario de alta de alumnos:  NIF, NOMBRE, APELLIDO1, MODULAR SI( ) - NO( )
// PAIS MULTIPLES DESPEGABLE, QUE ESTOS ARCHIVOS SE COGEN DE EL PAISES.TXT
// LO VAMOS GUARDANDO EN EN UN Alumnos.TXT

// Otro formulario que se llame alta de modulos
// Tiene un nombre, un curso que puede ser 1 y 2 despegable, tiene un ciclo despegable 
// Tenemos un archivo Ciclos.txt que tiene los siguientes datos
/*
* 1 DAW
* 2 DAM
* 3 ASIR
* 4 MIF
* 5 BIG DATA
* 6 VIDEOJUEGOS

*/
// El codigo del modulo es la primera letra del nombre del modulo+ curso + 3primerasLetrasciclo ( Ejemplo P1DAW )
// Despegable Alumno que va a mostrar el Apellido, Nombre y un boton mostrar
// Que muestra un formulario con los datos del archivo 


// Finde: Otra version que en vez de borrar lo que haga sea actualizar, El nif se puede ver pero no modificar
// Pero el nombre y apellido o se borran o se actualizan

// Por defecto los datos que borres lo muestras en una tabla, ademas tienen un checkbox de seleccionar




?>



</body>
</html>