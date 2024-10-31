<?php
    function getFormMarkup($table,$abecedario,$letrasChecked){
        $output='<form method="post">';
        foreach ($abecedario as $letra) {

            
            if(in_array($letra,$letrasChecked)){
                $output.="<input type='checkbox' checked name='letras[]' value='" . $letra . "'>".$letra."</input>";
            }else{
                $output.="<input type='checkbox' name='letras[]' value='" . $letra . "'>".$letra."</input>";
            }
            
            
        }
        $output .='<br><br><button type="submit">Filtrar</button> | <a href="index.php">Reiniciar</a>';
        $output .= getTableMarkup($table);
        $output .="</form>";
        return $output;
    }


    function getTableMarkup($table){
        $output = '<table>
        <tr style="text-align:center;">
        <td><b>Nombre</b></td>
        <td><b>Fecha Lanzamiento</b></td>
        <td><b>Creador</b></td>
        </tr>';
        foreach ($table as  $registro) {
            $output .= "<tr>";
            $output.="<td>".$registro['nombre']."</td>";
            
            if(array_key_exists('anio',$registro)){
                $output.="<td>".$registro['anio']."</td>";
            }else{
                $output.="<td>".$registro['fecha']."</td>";
            }
            
            $output.="<td>".$registro['creador']."</td>";
        }
        $output.="</table>";
        return $output;

    }


    function filterVideojuegosLetras($table,$letras){
        $filteredList = array();
        foreach ($table as $registro) {
            
            foreach ($letras as $letra) {
                $nombreRegistro = str_split($registro['nombre']);

                if( $nombreRegistro[0] == $letra){

                    array_push($filteredList,$registro);

                }

            }

        }
        return $filteredList;
    }
