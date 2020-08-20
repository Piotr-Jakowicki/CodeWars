<?php

function digPow($n, $p) {
  $b = str_split($n,1);
  $sum = 0;
  for($i=0;$i<count($b);$i++){
    $sum += pow($b[$i],$p+$i);
  }
  $k = 1;
  while($n * $k <= $sum){
    if($n * $k == $sum) return $k;
    $k++;
  }
  return -1;
}