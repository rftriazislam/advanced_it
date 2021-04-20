<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classs;
use App\Models\ClassSchedule;

class GetController extends Controller
{
public function classes()
{
$classes=Classs::select(['id','class_name','class_number'])->with('sections')->get();

if ($classes) {
    return response()->json(['sucsess' => true, 'class' => $classes], 200);
} else {
    return response()->json(['success' => false, 'message' => 'something error'],400);
}


}

public function schedules(){
//     $classes=Classs::select(['id','class_name','class_number'])->with('sections')->get();

// if ($classes) {
//     return response()->json(['sucsess' => true, 'class' => $classes], 200);
// } else {
//     return response()->json(['success' => false, 'message' => 'something error'],400);
// }
}

}