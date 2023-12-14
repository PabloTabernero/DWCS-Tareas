<?php

    function imprimirCoches($array) {
        echo "<table>
                <tr>
                    <th>Marca</th>
                    <th>Stock</th>
                    <th>Ventas</th>
                </tr>";

        foreach($array as $detalleMarca){
            echo "<tr>";
            foreach($detalleMarca as $dato) {
                echo "<td>$dato</td>";
            }
            echo "</tr>";
        }       
        
        echo "</table>";
    }
