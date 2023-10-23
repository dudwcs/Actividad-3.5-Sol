<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operaciones HTML5</title>
</head>

<body>
    <h1>Operaciones aritméticas</h1>
    <form method="post">

        <p>
            <label for="operacion">Seleccione la operación:</label>
            <select name="operacion" id="operacion" required>
                <option value="1">Suma</option>
                <option value="2">Producto</option>
                
            </select>
        </p>

        <p>
            <label for="op1"> Operando 1:</label>
            <input type="number" name="op1" id="op1" step="0.01" required>
        </p>

        <p>

            <label for="op2"> Operando 2:</label>
            <input type="number" name="op2" id="op2" step="0.01" required>
        </p>

        <input type="submit" value="Enviar">

    </form>

    <?php
    const OP_SUMA = 1;
    const OP_PRODUCTO = 2;

    require_once 'util.php';
   

    if (isset($_POST["operacion"]) && isset($_POST["op1"]) && isset($_POST["op2"])) {
        $operacion = $_POST["operacion"];
        $op1 = $_POST["op1"];
        $op2 = $_POST["op2"];

        $resultado = operar($operacion, $op1, $op2);

        echo "<p> El resultado de la operación es: $resultado</p>";
    }

   
    ?>
</body>

</html>