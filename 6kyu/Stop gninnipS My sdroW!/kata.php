<?php

function spinWords(string $strr): string {
  $str = [];
  $str = explode(' ',$strr);
  for($i=0;$i<count($str);$i++){
    if(strlen($str[$i])>=5) $str[$i] = strrev($str[$i]);
  }
  return implode(' ',$str);
}