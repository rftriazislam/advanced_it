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
   
    $schedules = ClassSchedule::select('id','section_id','teacher_id','class_subject','start_time','end_time','status')->with([
        'section_info' => function ($query) {
            $query->select('id','section_name','class_id')
            ->with([
               'class_info'=> function ($query) {
                 $query->select('id','class_number')  ;
            }]) ;
           },
        'teacher_info' => function ($query) {
           $query->select('id','name');
       }
       
    ])
    ->where('status',1)
    ->get();
  
if ($schedules) {
    return response()->json(['sucsess' => true, 'schedules' => $schedules], 200);
} else {
    return response()->json(['success' => false, 'message' => 'something error'],400);
}
}

}