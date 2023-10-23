<?php
function operar(int $tipo_operacion, float $op1, float $op2): float
{
    $resultado = 0;
    // if ($tipo_operacion == OP_SUMA) {
    //     $resultado = $op1 + $op2;
    // } elseif ($tipo_operacion == OP_PRODUCTO) {
    //     $resultado = $op1 * $op2;
    // }

    switch ($tipo_operacion) {
        case OP_SUMA:
            $resultado = $op1 + $op2;
            break;
        case OP_PRODUCTO:
            $resultado = $op1 * $op2;
            break;
        default:
           echo "<p> Operación no soportada </p>";
            break;
    }
    return $resultado;
}
