<?php

namespace jatinpatel;

use PHPUnit\Util\Exception;

class StringCalculator
{
    public function Add($number_string, $delimiter)
    {
        $total = 0;
        if (empty($number_string)){
            return 0;
        }
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
        return $total;
    }
}