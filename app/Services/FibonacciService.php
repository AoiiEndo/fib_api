<?php

namespace App\Services;

class FibonacciService
{
    public function calculateFibonacci(int $n): string
    {
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
