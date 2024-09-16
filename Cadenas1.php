<?php


$nombre = "Juan";
$apellido = "Lopez";

$nombreCompleto = $nombre . " " . $apellido;

echo "El nombre completo es $nombreCompleto";

echo "<br>";


$cadena = "abracadabra          ";

echo "La cadena es $cadena <br>";

echo "La longitd de la cadena es ". strlen(trim($cadena)); // El trim quita los espacios de delante y final de una cadena

echo "<br>";

for ($i = 0; $i < strlen($cadena); $i++) { //Para saber el length de la cadena

    echo $cadena[$i];

}


strlen($cadena);    // Te dice el length de la cadena
trim($cadena);      // Te quita los espacios de delante y final de una cadena 
strpos($cadena,$cadena2);   // Te dice si una cadena esta contenido en la otra
str_replace(" ","",$cadena);    // Te remplaza los caracteres por los que has indicado de una cadena


?>