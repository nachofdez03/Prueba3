<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    



<?php

    $cadena = "Telescopio";     //Continente
    $cadena2 = "copio";         //Contenida

    function contieneCadena ($cadena, $cadena2){

        if (strlen($cadena2)<strlen($cadena)) {
          
            $contenido = false;
            $puntero1 = 0;          // Inicializamos indices
            $puntero2 = 0;          // Y el menor

            while   (($puntero1<strlen($cadena)) && ($contenido != -1) ){
                
                $puntero1Aux = $puntero1;   // Salvamos el inicio de la cadena1 desde donde empezamos a buscar coincidencias

                while (($cadena[$puntero1] == $cadena2[$puntero2]) && ($puntero2 <strlen($cadena2)) ) {
                    
                    $puntero++;
                    $puntero2++;
                }

                if ($puntero2 == strlen($cadena2)) {
                    
                    $contenido = true;

                }else { // Hemos encontrado una discrepancia sin llegar al final de la cadena2
                    
                    $puntero2 = 0;
                    $puntero1Aux++;
                    $puntero1 = $puntero1Aux;
                }


                if ($puntero1Aux == strlen($cadena)) {
                    
                    $puntero1Aux == -1;

                }

                return $puntero1Aux;

            }

            echo "La cadena $cadena2 esta en $cadena en la posicion ". contieneCadena($cadena,$cadena2);

        }else {
            
            
            echo "La cadena $cadena2 no puede estar contenida al ser menor que $cadena";
            
        }





    }





 /*funcion que reciba como parametros dos cadenas una mas grande y otra mas pequeña
    la funcion devuelva la posición de comienzo de la cadena pequeña dentro de la grande
        */

?>
</body>
</html>