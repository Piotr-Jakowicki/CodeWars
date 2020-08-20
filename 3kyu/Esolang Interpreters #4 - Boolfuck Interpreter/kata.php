<?php

function boolfuck(string $code, string $input = ""){
    $tape = [];
    $iterator = 0;
    $cell = 0;
    $final = '';
    $result = '';
    $inputBin = [];  
    $inputIndex1 = 0;
    $inputIndex2 = 0;
    for($i=0;$i<strlen($input);$i++){
      $inputBin[$i] = intval(decbin(ord($input[$i])));
      for($j=strlen($inputBin[$i]);$j<8;$j++){
        $inputBin[$i] = 0 . $inputBin[$i];
      }
    }
    for($i=0;$i<strlen($input);$i++){
        $inputBin[$i] = strrev($inputBin[$i]);
    }
    
    for($i=0;$i<strlen($code);$i++){
        if(empty($tape[$iterator])) $tape[$iterator] = array_fill(0,7,0);
        
      switch($code[$i]){
        case '+':
            if($tape[$iterator][$cell] == 0) $tape[$iterator][$cell] = 1;
            else $tape[$iterator][$cell] = 0;
            break;
        case '<':
            $cell--;
            if($cell < 0){
                $cell = 7;
                $iterator--;
            }
          break;
        case '>':
            $cell++;
            if($cell > 7){
                $cell = 0;
                $iterator++;
            }
          break;
        case ',':
            $tape[$iterator][$cell] = $inputBin[$inputIndex1][$inputIndex2];
            $inputIndex2++;
            if($inputIndex2 == 8){
                $inputIndex1++;
                $inputIndex2 = 0;
            }
          break;
        case ';':
            $result .= $tape[$iterator][$cell];
            if(strlen($result) == 8){
                $final .= chr(bindec(strrev($result)));
                $result = '';
            }
            
          break;
        case '[':
            if($tape[$iterator][$cell] == 0){
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
            break;
        case ']':
            if($tape[$iterator][$cell] == 1){
                $bracket = 1;
                while($bracket > 0){
                  $i--;
                  if($code[$i] == '['){
                    $bracket--;
                  }
                  if($code[$i] == ']'){
                    $bracket++;
                  }
                }
                $i--;
              }
        break;
      }
    }
    if(strlen($result) != 0){
        for($i = 0;$i<8-strlen($result);$i++){
            $result .= 0;
        }
        $final .= chr(bindec(strrev($result)));
    }
    return $final;
  }