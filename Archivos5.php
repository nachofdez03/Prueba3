<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form name='f1' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
<fieldset>
<legend>Personas</legend>


<label for="Nombre">Nombre</label><input type='text' name='Nombre'>
<label for="Apellido">Apellido</label><input type='text' name='Apellido'>
<label for="NIF">NIF</label><input type='text' name='NIF'>
<input type='submit' name='Guardar' value='Guardar'>
<input type='submit' name='Mostrar' value='Mostrar'>

</fieldset>
</form>
<?php


if (isset($_GET['Guardar'])) {

    $nombre = $_GET['Nombre'];
    $apellido = $_GET['Apellido'];
    $nif = $_GET['NIF'];
    
    $id = buscarId();

    $linea = $id. ' '.$nombre. ' '.$apellido.' '.$nif;
    $fd = fopen('Personas.txt','a+') or die('No se puede abrir el archivo');
    fputs($fd, $linea. '\r\n";');


}

if (isset($_GET['Mostrar'])) {
    
    $personas = ObtenerPersonas();
    MostrarPersonas($personas);
}

function buscarId(){

    $id = 1;
    $ids = array();


    if (file_exists("Personas.txt")) {
       
        $fd = fopen('Personas.txt','r') or die('No se encuentra el archivo');

        while (!feof($fd)) {
            
            $linea = fgets($fd);

            $campos = explode(' ', $linea); // Cadena a array

            if (count($campos) == 4) {
                
                $ids[] = $campos[0];
            }

           
        }

        fclose($fd);

        if (count($ids)>0) {    // Si habia ids en el array
            
            rsort($ids);

            $id = intval($ids[0] +1);

        }

        return $id;
    }
}
    function ObtenerPersonas(){

        if (file_exists('Personas.txt')) {

            $personas = array();
            
            $fd = fopen('Personas.txt','r') or die('No se puede abrir el archivo');

            while (!feof($fd)) {

                $linea = fgets($fd);

                $campos = explode(' ', $linea);

                foreach ($campos as $clave => $value) {
                    
                    $personas[] = $campos[$clave];
                }

            }
            
            fclose($fd);

            return $personas;
            
        }

    }

    function MostrarPersonas($personas){

        
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>NIF</th></tr>";
    
        $count = count($personas);

        for ($i = 0; $i < $count; $i += 4) {
            echo "<tr>";
            echo "<td>{$personas[$i]}</td>";
            echo "<td>{$personas[$i + 1]}</td>";
            echo "<td>{$personas[$i + 2]}</td>";
            echo "<td>{$personas[$i + 3]}</td>";
            echo "</tr>";
        }
    
        echo "</table>";

}

// Un un formulario que tenga: NOMBRE, APELLIDO, NIF, y tenga las siguientes opciones:
// Guardar o Mostrar, Si lo guardamos los guardaremos en un fichero: Personas.txt
// Pero si le damos al boton mostrar, mostraremos una tabla con el un ID autoincremental
// Seguido del NIF, Nombre y apellido





?>
    
</body>
</html>