<?php

function simple_assembler($program)
{
$register = [];
for($i=0;$i<count($program);$i++){
    $command[$i] = explode(' ',$program[$i]);
}
  for($i=0;$i<count($program);$i++){
    
    switch($command[$i][0]){
      case 'mov':
        if(is_numeric($command[$i][2]))
        $register[$command[$i][1]] = intval($command[$i][2]);
        else 
        $register[$command[$i][1]] = intval($register[$command[$i][2]]);

      break;
      
      case 'inc':
        $register[$command[$i][1]]++;
      break;
      
      case 'dec':
        $register[$command[$i][1]]--;
      break;
      
      case 'jnz':
        if(is_numeric($command[$i][1])){
            if($command[$i][1] != 0){
                $i = ($i + intval($command[$i][2])-1);
            }
        }else {
            if(intval($register[$command[$i][1]]) != 0){
                $i = ($i + intval($command[$i][2])-1);
            }
        }
        
      break;
      
    }
  }
  return $register;
}