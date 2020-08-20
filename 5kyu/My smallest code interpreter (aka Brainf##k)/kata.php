<?php

function brainfuck(string $code, string $input): string {
  
  $iterator = 0;
  $tape = array_fill(0,10000,0);
  $result = "";
  $test = 0;
  $i = 0;
  for($i=0;$i<strlen($code);$i++){
    if($code[$i] == '>'){
      $iterator++;
    }
    else if ($code[$i] == '<'){
      $iterator--;
    }
    else if ($code[$i] == '+'){
      $tape[$iterator] = $tape[$iterator] + 1;
      if($tape[$iterator] > 255) $tape[$iterator] = 0;
    }
    else if ($code[$i] == '-'){
      $tape[$iterator] = $tape[$iterator] - 1;
      if($tape[$iterator] < 0) $tape[$iterator] = 255;
    }
    else if ($code[$i] == '.'){
      $result = $result . chr($tape[$iterator]);
    }
    else if ($code[$i] == ','){
      $tape[$iterator] = ord($input[$test]);
      $test++;
    }
    else if($code[$i] == '['){
      if($tape[$iterator] == 0){
        $bracket = 1;
        while($bracket > 0){
          $i++;
          if($code[$i] == '['){
            $bracket++;
          }
          if($code[$i] == ']'){
            $bracket--;
          }
        }
      }
    } 
    else if($code[$i] == ']'){
      if($tape[$iterator] != 0){
        $bracket2 = 1;
        while($bracket2 > 0){
          $i--;
          if($code[$i] == '['){
            $bracket2--;
          }
          if($code[$i] == ']'){
            $bracket2++;
          }
        }
        $i--;
      }
      
    } 
  }
  return $result;
 
}