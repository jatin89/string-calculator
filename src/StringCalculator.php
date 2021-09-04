<?php

namespace jatinpatel;

use http\Exception\InvalidArgumentException;
use PHPUnit\Util\Exception;

class StringCalculator
{
    public function Add($number_string){
        $total = 0;
        if(empty($number_string)){
            return 0;
        }
        $delimiter = false;
        //separate by newline to get delimiter
        $number_string_arr = explode('\n',$number_string);

        $delimiter = str_replace("//","",$number_string_arr[0]);
        // go in if we have delimiter and size is morethan 1
        if($delimiter && count($number_string_arr) > 1){
            $numbers_with_delimiter = $number_string_arr[1];
            $numbers_without_delimiter = explode($delimiter,$numbers_with_delimiter);
            foreach ($numbers_without_delimiter as $number){
                if($number < 0){
                    throw new InvalidArgumentException("Negative not allowed");
                }else if($number <= 1000){
                    $total += $number;
                }
            }
        }else{
            preg_match_all('/\d+/', $number_string, $matches);
            foreach($matches[0] as $match){
                if ($match > 1000){ //skip if number is bigger than 1000
                    continue;
                }
                // negative number not allowed in add
                if ($match < 0) {
                    throw new Exception("Negatives not allowed");
                }
                //keep adding to total as there could be more than one number
                $total += $match;
            }
        }
        return $total;
    }
}