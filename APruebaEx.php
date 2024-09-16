<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

$pais = "";
$modular = 0;   // Por defecto sabemos que no es modular

if (isset($_GET["Pais"])) {
    
    $pais = $_GET["Pais"];
}


if (isset($_GET['Modular'] ) )
{
    $modular=$_GET['Modular'];
}


function ObtenerPaises()      //Obtenemos 
{
    $paises=array();
    
    if (file_exists("Paises.txt")) //
    {
        $fd = fopen("Paises.txt", "r");
        
        while ( !feof($fd) )
        {
            $linea = fgets($fd);
            
            $campos = explode(" ", $linea);
            
            if (count($campos) == 2) //
            {
                $paises[$campos[0]]=$campos[1]   ;
                
            }
        }
        
        fclose($fd);
        
    }
    
    return $paises;
    
}


function ExisteAlumno($nif){

    $existe = false;
    if (file_exists("Alumnos.txt")) {
        
       $fd = fopen("Alumnos.txt", "r");

       while ( !feof($fd) ){

        $linea = fgets($fd);

        $campos = explode(" ", $linea);

        if (count($campos) == 6) {

            if ($campos[0] == $nif) {

            $existe = true;
            
            }

       }
    }

}

return $existe;

}

function  MeterAlumno($linea){

    if (file_exists("Alumnos.txt")) {

        $fd = fopen("Alumnos.txt", "a+") or die ("No se puede abrir el archivo");
        
        fputs($fd, $linea);



    }

}


?>
<form name='f1' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
  
  <fieldset>  
    <Legend>Agenda de Alumnos</Legend>
    <label for='NIF'>NIF</label><input type='text' name='NIF' >
    <label for='Nombre'>Nombre</label><input type='text' name='Nombre'>
    <label for='Apellido'>Apellido</label><input type='text' name='Apellido'>
    <br>
    
    <label for="Pais">Pais</label>
    <select name='Pais'>
    <option value=''></option>

    <?php

    $paises=ObtenerPaises();   //Obtenemos los paises

    foreach ($paises as $clave=>$valor)
    {
       echo "<option value='$clave' ";
       
       if (  $pais==$clave)
       {
           echo " selected ";
       }
           
        
       echo ">$valor</option>"; 
        
    }

    ?>
       
    </select>
    <label for='Modular'>Modular:</label>
            
    <?php 
       
       $modulares=array('Si'=>1,'No'=>0);
       
       foreach ($modulares as $clave=>$valor)
       {
          echo "$clave<input type='radio' name='Modular' value='$valor' ";

          if ($valor==$modular)
          {
              echo " checked ";
          }
       
          echo  ">";
       
       }
       
       function ObtenerAlumnos()
       {
           $alumnos=array();
           
           if (file_exists("Alumnos.txt")) 
           {
               $fd = fopen("Alumnos.txt", "r");
               
               while ( !feof($fd) )
               {
                   $linea = fgets($fd);
                   
                   $campos = explode(" ", $linea);
                   
                   if (count($campos) == 5)
                   {
                       $alumnos[trim($campos[0])]=$linea   ;
                       
                   }
               }
               
               fclose($fd);
           }
           
           return $alumnos;
           
       }
    ?>

    <br><br>
    <input type='submit' name='Guardar' value='Guardar'>
    <input type='submit' name='Mostrar' value='Mostar'>


</fieldset>
  
    </form>

<?php

if (isset($_GET['Guardar'])) {
    
    $nif = $_GET['NIF'];
    $nombre = $_GET['Nombre'];
    $apellido = $_GET['Apellido'];
    $pais = $_GET['Pais'];
    $modular = isset($_GET['Modular']) ? $_GET['Modular'] : 0; // Por defecto, no es modular
    $linea = $nif.' '.$nombre. " ". $apellido. " ". $pais. " ".$modular. "\r\n";;
 
    if (empty($nif) || empty($nombre) || empty($apellido) || empty($pais)){    // Falta algun campo

        echo "Error: Todos los campos deben estar rellenos.";

    }else { // Hemos rellenado todos los campos
    
        $existe = ExisteAlumno($nif);

        if ($existe == false) { // Si el alumno no existe lo metemos
        
        MeterAlumno($linea);

        }else {
            
            echo "El alumno ya existe";
        }

    }

}


if (isset($_GET["Mostrar"])) {

    $alumnos=ObtenerAlumnos();

    echo "<table border='2'>";
    echo "<th>Selec</th>
          <th>NIF</th>
          <th>Nombre</th>
          <th>Apellido1</th>
          <th>Modular</th>
          <th>Pais</th>";
    
    foreach($alumnos as $alu )
    {
       echo "<tr>";    
       
       $alu=explode(" ",$alu);   //convertimos la linea con los datos del alumno en un array
        
       echo "<td><input type='checkbox' name='Selec[".trim($alu[0])."]'></td>";
       
       for($i=0;$i<count($alu);$i++)
       {
           if ($i==5)
           {
               echo "<td>".array_search($alu[$i],$modulares)."</td>";
           }
           elseif ($i==4)
           {
               echo "<td>".$paises[trim($alu[$i])]."</td>";
           }
           else 
           {
            echo "<td>$alu[$i]</td>";
           }
       }
        
       echo "</tr>"; 
    }
   
    echo "</table>";





}





/*
if (isset($_GET['Guardar'])) {
    $nif = $_GET['NIF'];
    $nombre = $_GET['Nombre'];
    $apellido1 = $_GET['Apellido1'];
    $pais = $_GET['Pais'];
    $modular = isset($_GET['Modular']) ? $_GET['Modular'] : 0; // Por defecto, no es modular

    if (empty($nif) || empty($nombre) || empty($apellido1) || empty($pais)) {
        echo "Error: Todos los campos deben estar rellenos.";
    } else {
        $existe = ExisteAlumno($nif);

        if ($existe == false) {
            // Realiza aquí la lógica para guardar el alumno
        } else {
            echo "El alumno ya existe";
        }
    }
}
*/

// Hacer un formulario que pida nombre y apellidos dni y un despegable con todos los paises y si es modular o no 
// Le puedes dar a guardar, mostrar los datos que ahí en ese momento o borrar, saldran con un checkbox

?>
</body>
</html>