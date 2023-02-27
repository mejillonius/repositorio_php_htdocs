<?php
//modelo

function modelo_suma($a, $b) { return $a + $b; }
function modelo_resta($a, $b) { return $a - $b; }
function modelo_multi($a, $b) { return $a * $b; }
function modelo_division($a, $b) { return $a / $b; }
function modelo_modulo($a, $b) { return $a % $b; }
function model_divisores($a) { 
    if ($a < 1) return $a;
    $res = [];
    $res[] = 1;
    for($i = 2; $i <= $a/2; $i++) {
        if (floor($a / $i) == ($a / $i)) {
            $res[] = $i;
        }
    }
    $res[] = $a;
    return $a;
}
function modelo_factorial($a) { 
    $res = 1;
    if ($a < 1) return 1;
    while ($a > 0) {
        $res *= $a;
        $a--;
    }
    return $res;
}

?>