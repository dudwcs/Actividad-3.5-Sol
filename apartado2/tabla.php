<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <!-- Crear formulario cols y filas
    script PHP crea table html con cols y filas introducidas 
    y rellenar con números aleatorios del 0 al 10
-->
    <h1>Ejemplo tablas Html y Form</h1>
    <form>

        <p>
            <label for="filas">Introduzca nº de filas:</label>
            <input type="number" name="filas" id="filas">
        </p>

        <p>
            <label for="cols">Introduzca nº de columnas:</label>
            <input type="number" name="cols" id="cols">
        </p>

        <!-- <input type="submit" value="Enviar"> -->

        <button type="submit">Enviar</button>

    </form>

    <?php
    require_once 'util'.DIRECTORY_SEPARATOR. 'util.php';
    const MIN_CELL_VALUE = 0;
    const MAX_CELL_VALUE = 10;

    if (isset($_GET["filas"]) && isset($_GET["cols"])) {
        $filas = $_GET["filas"];
        $cols = $_GET["cols"];
        // var_dump($filas);
        // var_dump($cols);

        echo "<p> El número de columnas es: $cols</p>";
        echo "<p> El número de filas es: $filas</p>";

       // mostrar_tabla($filas, $cols);
       $array_creado = crear_array($filas, $cols);
       mostrar_array_tabla($array_creado);
      
    }

   

   
    ?>
</body>

</html>