<?php

namespace Calculator;

class StringCalculator
{
    public function add(string $numbers = '')
    {
        $result = 0;
        $negativeNumbers = [];

        if (empty($numbers)) {
            return $result;
        }

        foreach (preg_split( "/[\n,]+/", $numbers) as $number) {
            if (!is_numeric($number)) {
                continue;
            }

            if ((int) $number < 0) {
                $negativeNumbers[] = $number;
                continue;
            }

            if ((int) $number > 1000) {
                continue;
            }

            $result += $number;
        }

        if (!empty($negativeNumbers)) {
            throw new \InvalidArgumentException(
                sprintf('Negative numbers not allowed: %s', implode(',', $negativeNumbers))
            );
        }

        return $result;
    }
}
