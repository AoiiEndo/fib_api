<?php

namespace App\Services;

class FibonacciService
{
    public function calculateFibonacci(int $n): string
    {
        if ($n === 0) {
            return '0';
        } elseif ($n === 1) {
            return '1';
        }

        $a = '0';
        $b = '1';

        for ($i = 2; $i <= $n; $i++) {
            $c = bcadd($a, $b);
            $a = $b;
            $b = $c;
        }

        return $b;
    }
}
