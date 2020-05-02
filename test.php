<?php
/*$NAME = "Вова";
$BALANCE = "1337";
echo "Привет, $NAME!" . ' Твой баланс равен ' . $BALANCE .  "$\n";*/
function writeF(int $a, int $b, int $c){
    echo "Уравнение: ";
    if ($a <> 0) {
        echo "$a"."x^2";
    }
    if ($b < 0) {
        echo "-$b"."x";
    } else {
        if ($b <> 0) {
            echo "+$b" . "x";
        }
    }
    if ($c < 0) {
        echo "-$c";
    } else {
        if ($c <> 0) {
            echo "+$c";
        }
    }
    echo "=0\n";
}

function myFunc(int $a, int $b, int $c) {
    $D = pow($b,2) - 4 * $a * $c;
    if ($D > 0) {
        $x1 = (-$b + sqrt($D))/($a*2);
        $x2 = (-$b - sqrt($D))/($a*2);
        writeF($a,$b,$c);
        echo "Корень 1: " . $x1 . "\n Корень 2:" . $x2 . "\n";
    } else {
        if ($D == 0) {
            $x = (-$b)/($a*2);
            writeF($a,$b,$c);
            echo "Корень: " . $x . "\n";
        }
        else {
            writeF($a,$b,$c);
            echo "Нет действительных корней. \n";
        }
    }
}

myFunc(2,9,0);//2 корня
myFunc(6,0,0);//1 корень
myFunc(1,2,5);//нет действительныйх
?>
