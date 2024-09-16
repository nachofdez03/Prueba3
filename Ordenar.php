
<html>
    <!-- // Un programa que te pida 3 numeros en tres campos de un formulario y luego un despegale con los valores de ascendente y descendente
con el valor ordenar -->


<title> Ordenar 3 numeros </title>

<body>
    
<form name='ordenar' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>



<label for="Numero"> Numero</label><input type="text" name="Numero">
<label for="Numero2"> Numero2 </label><input type="text" name="Numero2">
<label for="Numero3"> Numero3 </label><input type="text" name="Numero3">

<br>
<label for="Tipo">Tipo</label>
<select name = 'Tipo'>

    <option value ''></option>
    <option value '1'>Ascendente</option>
    <option value '2'>Descendente</option>

</select>
<br>


<input type="submit" name="Ordenar" value= "Ordenar">
</form>



<?php

if (isset($_GET['Ordenar'])) {
    
    $num = $_GET ['Numero'];
    $num2 = $_GET ['Numero2'];
    $num3 = $_GET ['Numero3'];

    $mayor = '';
    $medio = '';
    $menor = '';

    $tipo = $_GET['Tipo'];
    

        if ($num > $num2  && $num > $num3) {
            
            $mayor = $num;

            if ($num2 > $num3) {
                
                $medio = $num2;
                $menor = $num3;

    
            }else{

                $medio = $num3;
                $menor = $num2;

            
            }


        }else if ($num2 > $num && $num2 > $num3){ 

            $mayor = $num2;

            if ($num > $num3) {
            
            $medio = $num;
            $menor = $num3;

            }else{

            $medio = $num3;
            $menor = $num;


            }

        }else{

            
            $mayor = $num3;

            if ($num > $num2) {
            
            $medio = $num;
            $menor = $num2;

            }else{

            $medio = $num2;
            $menor = $num;

            }

        }

        switch ($tipo) {

            case 1:
                
                echo "<table border = 2>";
                echo "<tr><td> $mayor </td></tr>";
                echo "<tr><td> $medio </td></tr>";
                echo "<tr><td> $menor </td></tr>";
                echo "</table>";
    
                break;
            
            case 2:
               
                echo "<table border = 2>";
                echo "<tr><td> $menor </td></tr>";
                echo "<tr><td> $medio </td></tr>";
                echo "<tr><td> $mayor </td></tr>";
                echo "</table>";
    
                break;
    
            default:
    
    
            break;
    
    
        }

    }
        



?>






</body>



</html>


