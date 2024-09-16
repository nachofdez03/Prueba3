<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

$modular = "";
$cur = "";
$pais='';

if (isset($_GET["Modular"])) {
    $modular = $_GET["Modular"];
}

if (isset($_GET["Cuso"])) {

    $cur = $_GET["Curso"];

}

if (isset($_GET['Pais'] ) )
{
    $pais=$_GET['Pais'];
}



function ObtenerPaises(){

if (file_exists("Paises.txt")) {

    $fd = fopen("Paises.txt","r");
    
    $paises = array();

    while (!feof($fd)) {   // Mientras haya linea
        
        $linea = fgets($fd);

        $campos = explode(" ", $linea); // Dividimos la linea en un array de campos

        if (count($campos)==2) {
            
            $paises[$campos[0]] = $campos[1];
        }

        
    }

    fclose($fd);
}

return $paises;



}

function GuardarLinea($linea,$nombreArchivo){

    $fd = fopen($nombreArchivo,"a+") or die("No se puede abrir el archivo");

    fputs($fd, $linea);
    fclose($fd);
}




?>
<form name='f1' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>


<fieldset>

        <legend>Alta de Alumnos</legend>
        <label for='NIF'>NIF </label><input type='text' name='NIF'>
        <label for='Nombre'>Nombre </label><input type='text' name='Nombre'>
        <label for='Apellido1'>Apellido1 </label><input type='text' name='Apellido1'><br>
            
        <label for="Modular">Modular:</label>  
    
        <?php

        $modulares = array("Si"=>1,"No"=>0);

        foreach ($modulares as $clave => $valor) {
            
            echo "$clave<input type='radio' name='Modular' value='$valor' ";

            if ($valor==$modular)
            {
                echo " checked ";
            }
         
            echo  ">";
        }

        ?>

        <label for="Curso">Curso: </label>
        <select name="Curso">
        <option value=""></option>

        <?php

        $curso = array(1,2);

        foreach ($curso as $clave=>$valor)
        {
           echo "<option value='$clave' ";
           
           if ($cur==$valor)
           {
               echo " selected ";
           }
               
           echo ">$valor</option>"; 
            
        }
        

        ?>

        </select>

        <label for='Pais'>Pais:</label>
            <select name='Pais'>
            <option value=""></option>

        <?php

        $paises = ObtenerPaises();


        foreach ($paises as $clave=>$valor)
        {
           echo "<option value='$clave' ";
           
           if ($cur==$valor)
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


if (isset($_GET["Guardar"])){

    $nif = $_GET['NIF'];
    $nombre = $_GET['Nombre'];
    $apellido1 = $_GET['Apellido1'];
    
    $modular = $_GET['Modular'];    
    $cur = $_GET['Curso']; 
    
    $pais = $_GET['Pais'];

    $salto = "\r\n";
    
    $linea=$nif." ".$nombre." ".$apellido1." ".$modular." ".$cur." ".$pais.$salto;
 
    $nombreArchivo="Alumnos.txt";

    GuardarLinea($linea,$nombreArchivo);



}








// Formulario de alta de alumnos:  NIF, NOMBRE, APELLIDO1, MODULAR SI( ) - NO( )
// PAIS MULTIPLES DESPEGABLE, QUE ESTOS ARCHIVOS SE COGEN DE EL PAISES.TXT
// LO VAMOS GUARDANDO EN EN UN ALMUNOS.TXT




?>



</body>


</html>