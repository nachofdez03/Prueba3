<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

?>




<h1>ALTA DE PAISES</h1>

<form name= 'f1' method='get' action = '<?php echo $_SERVER['PHP_SELF']; ?>'>

<label for="Pais"> Pais </label><input type="text" name = "Pais">

<input type="submit" name="Guardar" value= "Guardar">

</form>

<?php

function ConseguirID(){

$id = 1;

$ids = array();


if (file_exists("Paises.txt")) {
  
    $fd = fopen('Paises.txt','r');

while (!feof($fd)) {
  
    $linea = fgets($fd);

    $campos = explode(' ', $linea); // Dividimos la linea en un array de campos

    if (count($campos)==2) {
       
        $ids[] = $campos[0];

    }
}

fclose($fd);

if (count($ids)>0) { // Hay ids en el array
  
    rsort($ids);
    $id = intval($ids[0])+1;
}

return $id;

}
}

function ExistePais($pais){

    $paises = array();

    $existe = false;

    if (file_exists("Paises.txt")) {

        $fd = fopen('Paises.txt','r');

        while (!feof($fd)){

            $linea = fgets($fd);

            $campos = explode(' ', $linea); // Convertimos la linea en un array

            if (count($campos)== 2) {

                $paises[] = $campos[1];

            }
            

        }

        for ($i=0; $i <count($paises) && !$existe ; $i++) { 
            
            if (trim($paises[$i]) == $pais) {
                
                $existe = true;
            }
            
        }

        return $existe;
    }





}

if (isset($_GET['Guardar'])) {

    $pais = $_GET['Pais'];

    if (!ExistePais($pais)) {
      
        $fd = fopen('Paises.txt','a+');

        $id = ConseguirID();

        $salto = "\n";
        $linea = $id. " ". $pais. " ". $salto;

        fputs($fd, $linea);
    
        
    }else {
        
        echo "Ese pais ya esta";
    }
  

    

}

?>



</body>
</html>