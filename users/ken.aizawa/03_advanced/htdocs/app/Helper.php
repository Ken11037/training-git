<?php
namespace App;

class Helper
{
    static function same($a,$b,$c){
        if($a === $b && $b === $c){
            return true;
            }
        return false;
    }
}
