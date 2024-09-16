<?php



    function trocearCadena($cadena, $posicion, $tamaño){

        $subcadena = '';
        
        if ($tamaño<strlen($cadena)) {  // Comprobar que el tamaño es menor que la longitud de la cadena

            if ($tamaño>=0) {
            
                for ($i=$posicion; $i < $posicion + $tamaño && $tamaño < strlen($cadena) ; $i++) { 
            
                    $subcadena.= $cadena[$i];
        
                  }
                    

            }else {

                for ($i=$tamaño + $posicion; $i < strlen($cadena) ; $i--) { 
            
                    $subcadena.= $cadena[$i];
        
                  }
    
                
            }
          

 
            




        }else {
            
            echo "No se puede trocear debido a que el tamaño que has uesto es mayor que el length de $cadena";

        }


        return $subcadena;


    }

    echo "La subcadena es: ".trocearCadena("Faker",2,-3);



    /*  La funcion subcadena, recibes una cadena y un numero y tienes que trocear esa cadena
        desde la posicion que se indica, si el numero es negativo empiezas desde abajo, y 
        tambien el tamaño que quieres

    */





?>