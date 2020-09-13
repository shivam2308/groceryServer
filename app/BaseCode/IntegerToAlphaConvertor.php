<?php

namespace App\BaseCode;

class IntegerToAlphaConvertor {
  
  function toNum($data) {
        $alphabet = array( 'n','r','m','t','a','j','g','u','y','q','k','f','l','x','o','z','v','i','d','e','c','h','p','s','w','b','N','Y','S','W','L','O','M','E','Z','J','B','Q','K','T','C','X','R','F','G','V','U','A','P','H','I','D','-','_','9','2','7','0','8','4','3','5','1','6');
        $alpha_flip = array_flip($alphabet);
        $return_value = -1;
        $length = strlen($data);
        for ($i = 0; $i < $length; $i++) {
            $return_value +=
                ($alpha_flip[$data[$i]] + 1) * pow(62, ($length - $i - 1));
        }
        return $return_value;
    }
    
    function toAlpha($data){
        $alphabet = array( 'n','r','m','t','a','j','g','u','y','q','k','f','l','x','o','z','v','i','d','e','c','h','p','s','w','b','N','Y','S','W','L','O','M','E','Z','J','B','Q','K','T','C','X','R','F','G','V','U','A','P','H','I','D','-','_','9','2','7','0','8','4','3','5','1','6');
        $alpha_flip = array_flip($alphabet);
        if($data <= 61){
          return $alphabet[$data];
        }
        elseif($data > 61){
          $dividend = ($data + 1);
          $alpha = '';
          $modulo;
          while ($dividend > 0){
            $modulo = ($dividend - 1) % 62;
            $alpha = $alphabet[$modulo] . $alpha;
            $dividend = floor((($dividend - $modulo) / 62));
          } 
          return $alpha;
        }
    }
    
}

?>