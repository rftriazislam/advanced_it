<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classs;
use App\Models\Teacher;
use App\Models\Section;
use App\Models\ClassSchedule;
use App\Models\StudyMaterial;
use App\Models\Assignments;
use App\Models\Attendance;
use App\Models\Notice;
use App\Models\BookLibrary;
use App\Models\Exam;
use App\Models\McQuestion;
use App\Models\Vacation;
use App\Models\Result;
use App\Models\Video;

use App\Models\User;

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
public function libraries(){
   
    $libraries = BookLibrary::select('id','book_name','book_type','author_name','upload_file')->get();
  
if ($libraries) {
    return response()->json(['sucsess' => true, 'Book libraries' => $libraries,'upload_file'=>url('public/library')], 200);
} else {
    return response()->json(['success' => false, 'message' => 'something error'],400);
}
}
public function exams(){
   
    $exams = Exam::select('id','section_id','teacher_id','exam_name','subject','pass_mark','total_question','date','start_time','end_time')->with([
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
  
if ($exams) {
    return response()->json(['sucsess' => true, 'exams' => $exams], 200);
} else {
    return response()->json(['success' => false, 'message' => 'something error'],400);
}
}

public function questions($exam_id){
   
    $questions = McQuestion::where('exam_id',$exam_id)->get();
  
if ($questions) {
    return response()->json(['sucsess' => true, 'questions' => $questions], 200);
} else {
    return response()->json(['success' => false, 'message' => 'something error'],400);
}
}

public function vacations(){
   
    $vacations = Vacation::where('status',1)->get();
  
if (count($vacations)>0) {
    return response()->json(['sucsess' => true, 'questions' => $vacations], 200);
} else {
    return response()->json(['success' => false, 'message' => 'something error'],400);
}
}

public function videos(){
   
    $videos = Video::where('status',1)->get();
  
if (count($videos)>0) {
    return response()->json(['sucsess' => true, 'videos' => $videos], 200);
} else {
    return response()->json(['success' => false, 'message' => 'something error'],400);
}
}


}