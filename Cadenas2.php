<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $cadena="La 33 sera en Qatar";

        echo"<br>";

        for($i=0;$i<strlen($cadena);$i++)
        {
            echo"$cadena[$i]";
        }

        function Mayusculas($cadena)
        {
            $arrayMayus=array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

            $arrayMinus=array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');

            $convertida="";

            for($i=0; $i<strlen($cadena); $i++)
            {
                if(in_array($cadena[$i], $arrayMayus))
                {
                    $convertida.=$cadena[$i];
                }else
                {
                    $posicion=array_search($cadena[$i],$arrayMinus);

                    if($posicion===false) //cuandoes un caracter no alfabetico
                    {
                        $convertida.=$cadena[$i];
                    }else
                    {
                        $convertida.=$arrayMayus[$posicion];
                    }
                }
            }
            return $convertida;
        }

        echo Mayusculas($cadena);

    ?>
</body>
</html>


