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
            <input type="text" name="cals" id="cals">
        </p>


        <p>
            <label for="pesos">Introduzca los pesos separados por %. Por ejemplo: 50%50</label>
            <input type="text" name="pesos" id="pesos">
        </p>

        <input type="submit" value="Calcular media">

    </form>

    <?php
    function validar_pesos(array $pesos): bool
    {
        return array_sum($pesos) == TOTAL_PERCENTAGE;
    }

    function validar_tamanho($cals, $pesos): bool
    {
        return count($cals) == count($pesos);
    }

    function calcular_media_ponderada(array $cals, array $pesos): float
    {
        $acumulador = 0;

        for ($i = 0; $i < count($cals); $i++) {
            $acumulador += $pesos[$i] / TOTAL_PERCENTAGE * $cals[$i];
        }
        return $acumulador;

       
    }
    const TOTAL_PERCENTAGE = 100;
    if (isset($_POST["cals"], $_POST["pesos"])) {

        $cals = explode("/", trim($_POST["cals"]));
        $pesos = explode("%", trim($_POST["pesos"]));



        if (validar_pesos($pesos)) {
            if (validar_tamanho($cals, $pesos)) {
                $media = calcular_media_ponderada($cals, $pesos);
                printf("La media ponderada es: %.2f", $media);
            } else {
                echo "<p> El número de calificiones debe coincidir con el número de pesos</p>";
            }
        } else {
            echo "<p> La suma de los pesos debe ser:" . TOTAL_PERCENTAGE . " </p>";
        }
        // var_dump($cals);
        // var_dump($pesos);
    }

    ?>
</body>

</html>