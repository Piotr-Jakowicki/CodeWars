<?php

function prime($n){
  for($i = 2; $i * $i <= $n; $i++)
    if ($n % $i == 0)                
    return false;              
  return true;
}

function numPrimorial($n) {
  $primes = [];
  $i = 2;
  while(count($primes) != $n){
    if(prime($i)) $primes[] = $i;
    $i++;
  }
  $result = 1;
  foreach($primes as $prime){
    $result *= $prime;
  }
  return $result;
}