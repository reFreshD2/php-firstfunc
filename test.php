<?php
readEq("eq.txt");

function writeEq(int $a, int $b, int $c)
{
    echo "Уравнение: ";
    if ($a <> 0) {
        echo "$a" . "x^2";
    }
    if ($b < 0) {
        echo "-$b" . "x";
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

function solveEq(int $a, int $b, int $c)
{
    $D = pow($b, 2) - 4 * $a * $c;
    if ($D > 0) {
        $x1 = (-$b + sqrt($D)) / ($a * 2);
        $x2 = (-$b - sqrt($D)) / ($a * 2);
        writeEq($a, $b, $c);
        echo "Корень 1: " . $x1 . "\n Корень 2:" . $x2 . "\n";
    } else {
        if ($D == 0) {
            $x = (-$b) / ($a * 2);
            writeEq($a, $b, $c);
            echo "Корень: " . $x . "\n";
        } else {
            writeEq($a, $b, $c);
            echo "Нет действительных корней. \n";
        }
    }
}

function readEq($filename)
{
    if (file_exists($filename)) {
        $fp = fopen($filename, "r");
        if ($fp) {
            $a = 0;
            $b = 0;
            $c = 0;
            $getEq = false;
            $var = "";
            while (!feof($fp) && !$getEq) {
                $char = fgetc($fp);
                if ($char <> 'x' && $char && 'X' && $char <> '=') {
                    if ($char <> '*') $var = $var . $char;
                } else {
                    if ($char == '=') {
                        $c = (int)$var;
                        $getEq = true;
                    } else {
                        $nextChar = fgetc($fp);
                        switch ($nextChar) {
                            case '^':
                                $a = (int)$var;
                                fgetc($fp);
                                $var = "";
                                break;
                            case '+':
                                $b = (int)$var;
                                $var = "";
                                break;
                            case '-':
                                $b = (int)$var;
                                $var = $nextChar;
                                break;
                            case '=':
                                $b = (int)$var;
                                $getEq = true;
                                break;
                        }
                    }
                }
            }
            solveEq($a, $b, $c);
            fclose($fp);
        } else echo "Ошибка при открытии файла";
    } else echo "Файл не существует";
}