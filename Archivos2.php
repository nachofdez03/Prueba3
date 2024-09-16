<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form name="f1" method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <fieldset>
        <legend>Alta de paises</legend>
        <label for="Pais">Pais: </label><input type="text" name="Pais">
        <input type="submit" name="Guardar" value="Guardar">
    </fieldset>
</form>
<?php

    function SiguienteId()
    {

        $id=1;  //indica el id a devolver, ponemos uno porque el primero no va a estar

        $ids=array();  //array con los ids del archivo .txt

        if(file_exists("Paises.txt"))  //si esta creado el archivo de paises
        {
            $fd=fopen("Paises.txt", "r") or die("Error al abrir el archivo.");

            while(!feof($fd))  //mientras no lleguemos al final del archivo
            {
                $linea=fgets($fd);  //cogemos una linea
    
                $campos=explode(" ",$linea);    //dividimos la linea en un array de campos
    
                if(count($campos)==2)   //si la linea tiene los dos campos
                {
                    $ids[]=$campos[0];  //cogemos el campo 0 y lo añadimos al array de ids
                }
    
            }

        fclose($fd);
        }

        if(count($ids)>0)  //si habia arrays en el id
        {
            rsort($ids);  //ordenamos el array id decreciente x valor

            $id=intval($ids[0])+1;  //sumamos 1 a ese id
        }

        return $id;
    }


    function ExistePais($pais){

        $existe=false;  

        if(file_exists("Paises.txt"))  //si esta creado el archivo de paises
        {
            $fd=fopen("Paises.txt", "r") or die("Error al abrir el archivo.");

            while((!feof($fd)) && (!$existe))  //mientras no lleguemos al final del archivo
            {
                $linea=fgets($fd);  //cogemos una linea
    
                $campos=explode(" ",$linea);    //dividimos la linea en un array de campos
    
                if(count($campos)==2){


                    $existe = (trim($campos[1]) == $pais);


                }
                }
            }

        fclose($fd);

        return $existe;
    }

    if(isset($_GET['Guardar']))
    {
        $pais=$_GET['Pais'];

        if (!ExistePais($pais)) {   // Si el pais que han metido en el formulario no esta
            
            $id=SiguienteId();

            $salto="\r\n";
    
            $linea=$id." ".$pais.$salto;
    
            $fd=fopen("Paises.txt", "a+") or die("Error al abrir el archivo.");
    
            fputs($fd,$linea);
    
            fclose($fd);

        }else{

            echo "<br> Error, esa pais ya esta metido en pantalla";

        }


       

    }


    
    // Vamos a hacer una pagina ( Formulario ) que se va a llamar paises , con un solo campo 
    // que va a ser el nombre del pais en un archivo .txt, se tienen que guardar en el archivo 
    // con un campo que tiene que ser el id del pais

?>
</body>
</html>