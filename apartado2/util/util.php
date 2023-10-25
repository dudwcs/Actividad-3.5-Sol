<?php


function mostrar_tabla(int $filas, int $cols)
{
    echo "<table>
    <thead>
      <tr>";
    for ($i = 0; $i < $cols; $i++) {
        printf("<th> Col. %d </th>", $i + 1);
    }
    echo "</tr></thead><tbody>";

    for ($i = 0; $i < $filas; $i++) {
        echo "<tr>";

        for ($k = 0; $k < $cols; $k++) {
            printf("<td> %d </td>",  rand(MIN_CELL_VALUE, MAX_CELL_VALUE));
        }
        echo "</tr>";
    }

    echo "</tbody></table>";
}

// function crear_array(int $filas, int $cols): array
// {
//     $array = [];
//     for ($i = 0; $i < $filas; $i++) {
//         $array[$i] = array();

//         for ($k = 0; $k < $cols; $k++) {
//             $array[$i][$k] = rand(MIN_CELL_VALUE, MAX_CELL_VALUE);
//         }
//     }

//     //For debugging
//     echo "<p>Se ha creado el array:</p>";
//     echo "<pre>";
//     print_r($array);
//     echo "</pre>";


//     return $array;
// }

function crear_array(int $filas, int $cols): array
{

    for ($i = 0; $i < $filas; $i++) {
        for ($k = 0; $k < $cols; $k++) {
            $array[$i][$k] = rand(MIN_CELL_VALUE, MAX_CELL_VALUE);
        }
    }

    //For debugging
    echo "<p>Se ha creado el array:</p>";
    echo "<pre>";
    print_r($array);
    echo "</pre>";


    return $array;
}

// function mostrar_array_tabla(array $array): void
// {

//     echo "<table>
//     <thead>
//       <tr>";

//     //Suponemos que el array tiene el mismo nº de columnas para todas las filas
//     //Obtenemos el número de elementos, es decir, el nº de columnas, en la primera fila
//     // $count_array = count($array, COUNT_RECURSIVE);
//     // echo "<p>Total: $count_array </p>";

//     $cols = count($array[array_key_first($array)]);
//     //Sería lo mismo que:
//     //$cols = count($array[0]);
//     $filas = count($array);

//     for ($i = 0; $i < $cols; $i++) {
//         printf("<th> Col. %d </th>", $i + 1);
//     }
//     echo "</tr></thead><tbody>";


//     for ($i = 0; $i < $filas; $i++) {
//         echo "<tr>";

//         for ($k = 0; $k < $cols; $k++) {
//             printf("<td> %d </td>", $array[$i][$k]);
//         }
//         echo "</tr>";
//     }

//     echo "</tbody></table>";
// }


function mostrar_array_tabla(array $array): void
{

    echo "<table>
    <thead>
      <tr>";



    $cols = count($array[array_key_first($array)]);

    echo "<table>
    <thead>
      <tr>";

    for ($i = 0; $i < $cols; $i++) {
        printf("<th> Col. %d </th>", $i + 1);
    }
    echo "</tr></thead><tbody>";

    foreach ($array as $fila) {
        echo "<tr>";
        foreach ($fila as $col) {
            printf("<td> %d </td>", $col);
        }
        echo "</tr>";
    }

    echo "</tbody></table>";
}
