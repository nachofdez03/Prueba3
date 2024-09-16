<?php

// Una funcion que reciba como parametro un array de numeros y el segundo un numero, entonces la funcion tiene que devolver
// -1 si el numero si no esta en el array y si el numero esta decir en que posicion esta 


function Rellenar(&$numeros)
{

    for ($i = 0; $i <= 20; $i++) {

        $numeros[$i] = rand(0, 20);
    }


}


function Mostrar($numeros)
{


    foreach ($numeros as $key => $value) {

        echo "posicion: $key valor: $value <br>";
    }


    function seRepite($numeros, $num)
    {


        $i = 0;

        while (($i < count($numeros)) && ($numeros[$i] != $num)) {

            $i++;

        }

        if ($i == count($numeros)) {

            $i = -1;

        }

        return $i;


    }
}

$numeros = array();

Rellenar($numeros);
Mostrar($numeros);
echo "veremos si se repite:" . seRepite($numeros, 2);







?>