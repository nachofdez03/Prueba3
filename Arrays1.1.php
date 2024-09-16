<?php


/* $alumnos = array('Juan'=>20, 'Pepe'=>21, 'Luis'=>22);   
   En este caso le estoy pasando la clave que tambien se pued poner*/

$alumnos = array(
    'Juan' => array('Fol' => 4, 'Ingles' => 8, 'Cliente' => 2),
    'Pepe' => array('Fol' => 5, 'Ingles' => 6, 'Cliente' => 3),
    'Luis' => array('Fol' => 7, 'Ingles' => 7, 'Cliente' => 4)
);



echo "<table border = '2'>";

foreach ($alumnos as $clave => $valor) {



    echo "<tr>";

    echo "<td>$clave</td>";

    foreach ($valor as $modulo => $nota) {

        echo "<td> Modulo: $modulo Nota: $nota </td>";


    }

    echo "</tr>";

}


echo "</table>";



// Te dice cuantos elementos tiene un array
count($numeros);

//Te dice en que posicion dentro de un array se encuentra un elemento
array('Fol' => 4, 'Ingles' => 8, 'Cliente' => 2);
in_array(10, $notas);

//Saber si la clave existe
array_key_exists('Fol', $notas);

// Buscar un valor y su clave
array_search($needle, $haystack);

// Ordenar un array de menor a mayor
sort($numeros);

// Ordenar un array de mayor a menor
rsort($numeros);


$resultados = array(4, 7, 8, 9);
$valor = 4;

if (array_search($valor, $resultados) != false) {

    echo "El elemento con valor: $valor esta en el array";

} else {

    echo "El elemento con valor: $valor no esta en el array";

}



function Mostrar($vector)
{

    foreach ($vector as $clave => $valor) {

        echo "Clave $clave valor $valor";

        echo "<br>";
    }



}

echo "Antes de ordenarlo";
Mostrar($resultados);
echo "<br>";

// K -> Ordena por clave y A-> Mantienen las claves asociativas
asort($resultados);
echo "Despues de ordenar";
Mostrar($notas);








?>