<?php

function prime($n){
  for($i = 2; $i * $i <= $n; $i++)
    if ($n % $i == 0)                
    return false;              
  return true;
}

function step($g, $m, $n) {
  $primes = [];
  for($i=$m;$i<=$n;$i++){
    if(prime($i)){
      
      for($j=0;$j<count($primes);$j++){
        if($i - $primes[$j] == $g) return [$primes[$j],$i];
      }
      $primes[] = $i;
    }
  }
  return null;
}