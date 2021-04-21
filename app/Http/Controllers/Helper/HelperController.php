<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function class_name($class_number){
 $class_name=($class_number == 1) ? "One" : 
      (($class_number == 2)  ? "Two" 
      : (($class_number == 3)  ? "Three" 
      :(($class_number == 4)  ? "Four" 
      :(($class_number == 5)  ? "Five" 
      :(($class_number == 6)  ? "Six" 
      :(($class_number == 7)  ? "Seven" 
      :(($class_number == 8)  ? "Eight" 
      :(($class_number == 9)  ? "Nine" 
      :(($class_number == 10)  ? "Ten" 
      :(($class_number == 11)  ? "Eleven" 
      :(($class_number == 12)  ? "Twelve" 
      : "error"
       )))))))))));

        return $class_name;
    }
}
