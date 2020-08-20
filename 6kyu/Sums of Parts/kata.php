<?php

function partsSums($ls) {
  $tab = [];
  $sum = array_sum($ls);
  foreach($ls as $n){
    $tab[] = $sum;
    $sum -= $n;
  }
  $tab[] = 0;
  return $tab;
}