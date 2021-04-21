<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Helper\HelperController;
use App\Models\Classs;
use App\Models\Teacher;
use App\Models\Section;
use App\Models\ClassSchedule;


class AdminController extends Controller
{
   private $helper;

   public function __construct(HelperController $helper)
   {
       $this->helper = $helper;
   }

 public function index(){
     return view('admin.pages.dashboard');
 }
//----------------------------------------------class------------------------------------
 public function create_class(){
    
    return view('admin.pages.class.create_class');   
 }

public function post_class(Request $request){

   $validatedData= $this->validate($request,[
      'class_number'=>'required|unique:classses,class_number,' . $request->class_number . ',id,group,' . $request->group,
      'group'=>'required',
   ]);
   $validatedData['class_name']=$this->helper->class_name($request->class_number);
   $user = Classs::create($validatedData);
   return back()->with('success','Class save successfully');

}

 public function class_list(){
   $classes=Classs::all();
   return view('admin.pages.class.class_list',
  compact(
     'classes'
  ));   
 }
//----------------------------------------------class------------------------------------

//----------------------------------------------Section------------------------------------
public function create_section(){
   $classes=Classs::all();
    return view('admin.pages.section.create_section',
   compact(
      'classes',
   ));   
 }

 public function post_section(Request $request){

   $validatedData= $this->validate($request,[
      'class_id'=>'required|unique:sections,class_id,' . $request->class_id . ',id,section_name,' . $request->section_name,
      'section_name'=>'required',
      'teacher_id'=>'required',

   ]);

   
   $user = Section::create($validatedData);
   return back()->with('success','Class save successfully');

}

 public function section_list(){

   $sections=Section::with([
      'class_info' => function ($query) {
          $query->select('id', 'class_name','class_number');
      },
      'teacher_info' => function ($query) {
          $query->select('id', 'name');
      }
  ])
  ->get();


    return view('admin.pages.section.section_list',
   
   compact(
      'sections'
   ));   
 }
//----------------------------------------------Section------------------------------------


//----------------------------------------------schedule------------------------------------
public function create_schedule(){
   $classes=Classs::all();
    return view('admin.pages.schedule.create_schedule',compact(
       'classes'
    ));   
 }

 public function post_schedule(Request $request){

   
   $validatedData= $this->validate($request,[
      'section_id'=>'required',
      'start_time'=>'required',
      'end_time'=>'required',
      'class_subject'=>'required',
   ]);
  $teacher_id=Section::where('id',$request->section_id)->first();
  $validatedData['teacher_id']=$teacher_id->teacher_info->id;
   $user = ClassSchedule::create($validatedData);
   return back()->with('success','Class save successfully');

}
 public function schedule_list(){
   $schedules = ClassSchedule::with([
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


    return view('admin.pages.schedule.schedule_list',compact(
       'schedules'
    ));   
 }
//----------------------------------------------schedule------------------------------------

//----------------------------------------------material------------------------------------
public function create_material(){
    return view('admin.pages.material.create_material');   
 }
 public function material_list(){
    return view('admin.pages.material.material_list');   
 }
//----------------------------------------------material------------------------------------

//----------------------------------------------assignment------------------------------------
public function create_assignment(){
   return view('admin.pages.assignment.create_assignment');   
}
public function assignment_list(){
   return view('admin.pages.assignment.assignment_list');   
}
//----------------------------------------------assignment------------------------------------

//----------------------------------------------attendance------------------------------------
public function create_attendance(){
   return view('admin.pages.attendance.create_attendance');   
}
public function attendance_list(){
   return view('admin.pages.attendance.attendance_list');   
}
//----------------------------------------------attendance------------------------------------

//----------------------------------------------exam------------------------------------
public function create_exam(){
   return view('admin.pages.exam.create_exam');   
}
public function exam_list(){
   return view('admin.pages.exam.exam_list');   
}
//----------------------------------------------exam------------------------------------

//----------------------------------------------question------------------------------------
public function create_question(){
   return view('admin.pages.question.create_question');   
}
public function question_list(){
   return view('admin.pages.question.question_list');   
}
//----------------------------------------------question------------------------------------

//----------------------------------------------library------------------------------------
public function create_library(){
   return view('admin.pages.library.create_library');   
}
public function library_list(){
   return view('admin.pages.library.library_list');   
}
//----------------------------------------------library------------------------------------

//----------------------------------------------notice------------------------------------
public function create_notice(){
   return view('admin.pages.notice.create_notice');   
}
public function notice_list(){
   return view('admin.pages.notice.notice_list');   
}
//----------------------------------------------notice------------------------------------

//----------------------------------------------vacation------------------------------------
public function create_vacation(){
   return view('admin.pages.vacation.create_vacation');   
}
public function vacation_list(){
   return view('admin.pages.vacation.vacation_list');   
}
//----------------------------------------------vacation------------------------------------

//----------------------------------------------teacher------------------------------------
public function create_teacher(){
   return view('admin.pages.teacher.create_teacher');   
}
public function teacher_list(){
   return view('admin.pages.teacher.teacher_list');   
}
//----------------------------------------------teacher------------------------------------

//----------------------------------------------student------------------------------------
public function student_list(){
   return view('admin.pages.student.student_list');   
}
//----------------------------------------------student------------------------------------

}
