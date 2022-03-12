<?php

namespace App\Helpers;

class Format
{
    public static function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; $i++) {
            if ($mask[$i] == '#') {
                if (isset($val[$k]))
                    $maskared .= $val[$k++];
            } else {
                if (isset($mask[$i]))
                    $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }

    public static function money($value, $symbol = 'R$', $decimal = ',', $thousands = '.', $round = 2)
    {
        return $symbol . number_format($value, $round, $decimal, $thousands);
    }

    public static function extractNumbers($value)
    {
        return preg_replace('[\D]', '', $value);
    }

    public static function cpfExpression($value)
    {
        $value = preg_replace('[\D]', '', $value);
        $substr1 = substr($value, 0, 3);
        $substr2 = substr($value, 3, 3);
        $substr3 = substr($value, 6, 3);
        $substr4 = substr($value, -2);
        $expression = ($substr1 . '.' . $substr2 . '.' . $substr3 . '-' . $substr4);
        return $expression;
    }
}
