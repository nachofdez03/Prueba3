<?php

// Rellenar un array con valores al azar del 0 al 30 con numeros del 0 al 50, despues por pantalla html,
// una tabla que ponga los valores del array y cuantas veces se repite cada uno 

function Rellenar(&$numeros)
{

    for ($i = 0; $i < 20; $i++) {

        $numeros[$i] = rand(0, 50);

    }

}

function Mostrar($numeros)
{

    echo "[";

    foreach ($numeros as $clave => $valor) {

        echo "$valor,][";
    }



}

function Contar($numeros, &$repeticiones)
{

    for ($i = 0; $i < count($numeros); $i++) {

        if (!isset($repeticiones[$numeros[$i]])) { // Si ese numero no esta en el array de repeticiones

            $repeticiones[$numeros[$i]] = 1;

        } else { // Ese numero ya tenia una entrada

            $repeticiones[$numeros[$i]] = $repeticiones[$numeros[$i]] + 1;
        }
    }
}

function MostrarTabla($repeticiones)
{


    echo "<table border = '2'>";
    echo "<th>Numero</th><th>Repeticiones</th>";

    foreach ($repeticiones as $clave => $valor) {

        echo "<tr>";
        echo "<td>$clave</td><td>$valor</td>";
        echo "</tr>";

    }

    echo "</table>";

}


$numeros = array(); //Array con numeros al azar
$repeticiones = array(); //Array cuya clave son los numeros del array anterior y las veces que el numero se repetir

Rellenar($numeros);
Mostrar($numeros);

Contar($numeros, $repeticiones);
MostrarTabla($repeticiones);