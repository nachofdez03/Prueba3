<!DOCTYPE html>
<html>
    <head>


    </head>

<?php 

// BORRAR ARCHIVO
// nos sacará el nombre del alumno y su apellido 
function obtenerNombres()
{
    $arrAlumnos = array();

    if (file_exists("Alumnos.txt")) {
        $fd = fopen("Alumnos.txt", "r");

        while (!feof($fd)) {
            $linea = fgets($fd);

            $campos = explode(" ", $linea);

            if (count($campos) == 6) {
                $arrAlumnos[$campos[0]] = $campos[1] . " " . $campos[2];
            }
        }

        fclose($fd);
    }

    return $arrAlumnos;
}

    function ObtenerDatos($alumno){

        if (file_exists("Alumnos.txt")){

            $fd = fopen("Alumnos.txt", "r"); // abrimos
            $alumnos = array(); 

            while (!feof($fd)) {
                
                $linea = fgets($fd); // recoge lineas

                $campos = explode(" ", $linea); // separa campos

                if (count($campos) == 6 && $campos[0] == $alumnos) {

                    $datosAlumno = $campos;
                    

                }
            }


        } 

        return $datosAlumno;
        
            


    }
$alu = "";

if (isset($_GET['Alumnos'])) {
    
    $alu = $_GET['Alumnos'];
    
}


?>

<body>
<form name='f1' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>

<fieldset>
    <legend>Borrado de Alumnos</legend>

    <label for='Alumnos'>Alumnos</label>
    <select name='Alumnos'>
        <?php
        $arrAlumnos = obtenerNombres();
        foreach ($arrAlumnos as $clave => $valor) {
            echo "<option value='$clave' ";

            if ($alu == $clave) {
                echo " selected ";

            }


            echo ">$valor</option>";
        }
        ?>
    </select>
    <input type='submit' name='Mostrar' value='Mostrar'>
    </fieldset>

    </form>




<?php



if (isset($_GET['Mostrar'])) 
{
  
    $nif = $_GET['Alumnos'];

    $linea = $alumnos[$nif];
   
    $campos = obtenerDatos($alumno);

    

 

}

// Finde: Otra version que en vez de borrar lo que haga sea actualizar, El nif se puede ver pero no modificar
// Pero el nombre y apellido o se borran o se actualizan

// Por defecto los datos que borres lo muestras en una tabla, ademas tienen un checkbox de seleccionar




?>
</body>
</html>