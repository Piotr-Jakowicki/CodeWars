<?php

function duplicateCount($text) {
    $max = 0;
    foreach (count_chars(strtolower($text), 1) as $i => $val) {
     if($val > 1) $max++;
     }
     return $max;
  }