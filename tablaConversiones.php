<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tablas de Conversiones</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>
            .true {
                color: green;
            }
            .false {
                color: red;
            }
        </style>
    </head>
    <body>
        <?php
            // put your code here
        function tablaConversiones() {
            
            $array = array();
            $contador = 0;
            $output = "";
            $output2 = "";
            $heading = array('Numero ','Contenido de $var ', 'isset($var) ', 'empty($var) ', '(bool) $var ', 'is_null($var)');
            $var = array(null, 0, true, false, "0", "", "foo", $array, 2);
            $funciones = array('llamarIsset', 'llamarEmpty', 'llamarBool', 'llamarIsnull');
            
            $output .= "<table class='table table-bordered'>";
            $output .= "<tr>";
            // imprimimos cabecera
            foreach ($heading as $value) {
                $output .= "<th>" . $value . " </th>";
            }
            $output .= "</tr>";
            foreach ($var as $valor) {
                
                $contador++;
                $output .= "<th> {$contador} </th>";
                
                if ($valor === null) {
                    $output2 = "null";
                } elseif($valor === true) {
                    $output2 = "true";
                } elseif($valor === 2) {
                    $output2 = "unset(\$var)";
                } elseif($valor === "") {
                    $output2 = "\"\"";
                } elseif($valor === false) {
                    $output2 = "false";
                }else {
                    $output2 = $valor;
                }
                
                $output .= "<th> \$var= ". $output2 ." </th>";
                
                foreach ($funciones as $funcion) {
                    
                    if ($valor == 2) {
                        unset($valor);
                    }
                    if ($funcion($valor)) {
                        $output .= "<td class='true'> True </td>";
                    } else {
                        $output .= "<td class='false'> False </td>";
                    }
                }
                $output .= "<tr>";
            }
            
            $output .= "</table>";

            echo $output;
        }
        
        function llamarIsset($valor) {
            return isset($valor);
        };
        
        function llamarEmpty($valor) {
            
            return empty($valor);
        };
        
        function llamarBool($valor) {
            
            return (bool) $valor;
        };
        
        function llamarIsnull($valor) {
            
            return is_null($valor);
        };
        
        tablaConversiones();
        /*$funciones = array('llamarIsset', 'llamarEmpty', 'llamarBool');
        foreach ($funciones as $value) {
              echo $value(true);
            }*/
        ?>
    </body>
</html>