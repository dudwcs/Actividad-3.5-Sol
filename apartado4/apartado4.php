<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media ponderada</title>
</head>

<body>
    <h1>Cálculo de calificación final</h1>

    <form method="post">

        <p>
            <label for="cals">Introduzca las calificaciones separadas por /. Por ejemplo: 5/4</label>
            <input type="text" name="cals" id="cals" required>
        </p>


        <p>
            <label for="pesos">Introduzca los pesos separados por %. Por ejemplo: 50%50</label>
            <input type="text" name="pesos" id="pesos" required>
        </p>

        <input type="submit" value="Calcular media">

    </form>

    <?php

    const TOTAL_PERCENTAGE = 100;
    const MIN_CAL_VALUE = 0;
    const MAX_CAL_VALUE = 10;
    const MIN_PERCENTAGE_VALUE = 0;
    const MAX_PERCENTAGE_VALUE = 100;

    const CAL_EXTRA_PERCENTAGE = 0.1;

    function corregir_cals(array &$array_cals)
    {
        foreach ($array_cals as &$valor) {
            $valor += $valor * CAL_EXTRA_PERCENTAGE ;
            if ($valor > MAX_CAL_VALUE)
                $valor = MAX_CAL_VALUE;
        }

        unset($valor);
    }

    function is_valid_range(
        array $values_array,
        float $min,
        float $max
    ): bool {
        foreach ($values_array as $value) {
            if ($value < $min || $value > $max) {
                return false;
            }
        }
        return true;
    }

    function eliminar_cadenas_vacias(array $array): array
    {
        return array_filter($array, "es_equiv_cadena_vacia");
    }

    function es_equiv_cadena_vacia($var)
    {
        return trim($var) != "";
    }



    function validar_numeric_values(array $array): bool
    {
        foreach ($array as $value) {
            if (!is_numeric($value)) {
                return false;
            }
        }
        return true;
    }

    function validar_pesos(array $pesos_array): bool
    {
        $suma = array_sum($pesos_array);
        return ($suma == TOTAL_PERCENTAGE);
    }

    function validar_count_arrays(array $cals_array, array $pesos_array): bool
    {
        return sizeof($cals_array) == count($pesos_array);
    }

    function calcular_media_ponderada(array $cals_array, array $pesos_array): float
    {
        $media_ponderada = 0;
        for ($i = 0; $i < count($cals_array); $i++) {
            $media_ponderada += $cals_array[$i] * $pesos_array[$i] / TOTAL_PERCENTAGE;
        }
        return $media_ponderada;
    }

    if (isset($_POST["cals"], $_POST["pesos"])) {
        $cals = $_POST["cals"];
        $pesos = $_POST["pesos"];

        $cals_array = explode("/", $cals);
        $pesos_array = explode("%", $pesos);

        //depuración
        echo "<pre>";
        print_r($cals_array);
        var_dump($cals_array);
        echo "</pre>";


        echo "<pre>";
        print_r($pesos_array);
        var_dump($pesos_array);
        echo "</pre>";

        $cals_array = eliminar_cadenas_vacias($cals_array);
        $pesos_array = eliminar_cadenas_vacias($pesos_array);

        if (validar_numeric_values($cals_array) && validar_numeric_values($pesos_array)) {
            if (
                is_valid_range($cals_array, MIN_CAL_VALUE, MAX_CAL_VALUE)
                && is_valid_range($pesos_array, MIN_PERCENTAGE_VALUE, MAX_PERCENTAGE_VALUE)
            ) {            

                if (validar_pesos($pesos_array)) {
                    if (validar_count_arrays($cals_array, $pesos_array)) {

                        corregir_cals($cals_array);
                        var_dump($valor);
                        printf("<p> La media ponderada es %.2f </p>", calcular_media_ponderada($cals_array, $pesos_array));
                    } else {
                        echo "<p> El número de UDs y el números de porcentajes no coincide </p>";
                    }
                } else {
                    echo "<p> La suma de porcentajes debe ser " . TOTAL_PERCENTAGE . " </p>";
                }
            } else {
                echo "<p> Los valores mínimos y máximos para calificaciones son " . MIN_CAL_VALUE . " y " . MAX_CAL_VALUE . " </p>";
                echo "<p> Los valores mínimos y máximos para pesos son " . MIN_PERCENTAGE_VALUE . " y " . MAX_PERCENTAGE_VALUE . " </p>";
            }
        } else {
            echo "<p> Solo se permiten valores numéricos entre los símbolos / y % </p>";
        }
    }

    ?>