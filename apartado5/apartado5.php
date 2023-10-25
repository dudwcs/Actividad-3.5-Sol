<?php
const MAX_ITERATIONS = 20;
$i = 1;


while ($i <MAX_ITERATIONS) {
   
    echo "<p> $i</p>";
    $i++;
    $j= $i;
    $buffer = ob_get_contents();
}
echo "<p> \$j vale $j</p>";