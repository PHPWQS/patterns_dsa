<?php

// Simple example of realisation of decorator design pattern

function multiple_decorator(callable $callback, float $multiple, ...$params)
{
  return $callback(...$params) * $multiple;
}

function sum(float $a, float $b)
{
  return $a + $b;
}

echo multiple_decorator('sum', 4, 3.2, 4.3), "\n";

?>