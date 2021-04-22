<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classs;
use App\Models\ClassSchedule;
use App\Models\StudyMaterial;
use App\Models\Assignments;
use App\Models\Attendance;
use App\Models\Notice;


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
   
    $schedules = ClassSchedule::select('id','section_id','teacher_id','class_subject','day','start_time','end_time','status')->with([
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

public function materials(){
   
    $materials = StudyMaterial::select('id','section_id','teacher_id','material_name','subject','description','upload_file','status')->with([
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
  
if ($materials) {
    return response()->json(['sucsess' => true, 'metarials' => $materials,'upload_file'=>url('public/material/')], 200);
} else {
    return response()->json(['success' => false, 'message' => 'something error'],400);
}
}

public function assignments(){
   
    $materials = Assignments::select('id','section_id','teacher_id','assignment_name','subject','description','deadline','upload_question','status')->with([
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
  
if ($materials) {
    return response()->json(['sucsess' => true, 'metarials' => $materials,'upload_file'=>url('public/Assignment/question/')], 200);
} else {
    return response()->json(['success' => false, 'message' => 'something error'],400);
}
}


public function attendances(){
   
    $attendances = Attendance::select('id','section_id','teacher_id','student_id','attend','date')->with([
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

    ->get();
  
if ($attendances) {
    return response()->json(['sucsess' => true, 'attendances' => $attendances], 200);
} else {
    return response()->json(['success' => false, 'message' => 'something error'],400);
}
}


public function notices(){
   
    $notices = Notice::select('id','section_id','title','description','date')->with([
        'section_info' => function ($query) {
            $query->select('id','section_name','class_id')
            ->with([
               'class_info'=> function ($query) {
                 $query->select('id','class_number')  ;
            }]) ;
           },

    ])

    ->get();
  
if ($notices) {
    return response()->json(['sucsess' => true, 'notices' => $notices], 200);
} else {
    return response()->json(['success' => false, 'message' => 'something error'],400);
}
}

}