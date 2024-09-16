<?php

    $fd=fopen("agenda.txt","a+") or die("Error al abrir el archivo") ; //devuelve el descriptor del archivo

    $linea="Unos fucking burpees a las 100k\r\n";

    fputs($fd,$linea); // Guardamos este string en el archivo

    fclose($fd);

    /*

    //Apertura en modo lectura

    $fd=fopen("datos.txt","r") or die("Error al abrir el archivo") ; //Devuelve el descriptor del archivo

    //$linea=fgets($fd);  // Obtenemos una linea de este archivo

    while($linea=fgets($fd))  // Mientras haya lineas
    {
        echo $linea."<br>";
    }

    fclose($fd);  // Para cerrar el archivo

    */




    // Vamos a hacer una pagina ( Formulario ) que se va a llamar paises , con un solo campo 
    // que va a ser el nombre del pais en un archivo .txt, se tienen que guardar en el archivo 
    // con un campo que tiene que ser el id del pais





?>