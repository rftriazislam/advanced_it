<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Helper\HelperController;
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
use App\Models\User;

use Auth;

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
      'day'=>'required'
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
   $classes=Classs::all();
    return view('admin.pages.material.create_material',compact(
       'classes'
    ));   
 }
 public function post_material(Request $request){

   
   $validatedData= $this->validate($request,[
      'section_id'=>'required',
      'material_name'=>'required',
      'subject'=>'required',
      'description'=>'required',
      'upload_file'=>'required|mimes:pdf',
   ]);
  $section_info=Section::where('id',$request->section_id)->first();
  $validatedData['teacher_id']=$section_info->teacher_info->id;

 
  if($request->file('upload_file')){  

   $name='class-'.$section_info->class_info->class_number  .'-'.$section_info->section_name.'-'.$request->subject.'-'.rand ( 0 ,100000);
      $uniqueFileName = $name.'.'. $request->upload_file->getClientOriginalExtension();
     $request->upload_file->move(public_path('material/') , $uniqueFileName);
  $validatedData['upload_file']= $uniqueFileName ;
  }
   $user = StudyMaterial::create($validatedData);
   return back()->with('success','Class save successfully');

}

 public function material_list(){

   $materials = StudyMaterial::with([
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
    return view('admin.pages.material.material_list',compact(
       'materials'
    ));   
 }
//----------------------------------------------material------------------------------------

//----------------------------------------------assignment------------------------------------
public function create_assignment(){
   $classes=Classs::all();
   return view('admin.pages.assignment.create_assignment',compact(
      'classes'
   ));   
}




public function post_assignment(Request $request){



   $validatedData= $this->validate($request,[
      'section_id'=>'required',
      'assignment_name'=>'required',
      'subject'=>'required',
      'description'=>'required',
      'deadline'=>'required',
      'upload_question'=>'required|mimes:pdf',
   ]);

  $section_info=Section::where('id',$request->section_id)->first();
  $validatedData['teacher_id']=$section_info->teacher_info->id;

 
  if($request->file('upload_question')){  

   $name='class-'.$section_info->class_info->class_number  .'-'.$section_info->section_name.'-'.$request->subject.'-'.rand ( 0 ,100000);
      $uniqueFileName = $name.'.'. $request->upload_question->getClientOriginalExtension();
     $request->upload_question->move(public_path('Assignment/question/') , $uniqueFileName);
  $validatedData['upload_question']= $uniqueFileName ;
  }
   $user = Assignments::create($validatedData);
   return back()->with('success','Class save successfully');

}






public function assignment_list(){

   $assignments = Assignments::with([
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
   return view('admin.pages.assignment.assignment_list',compact(
      'assignments'
   ));   
}
//----------------------------------------------assignment------------------------------------

//----------------------------------------------attendance------------------------------------
public function create_attendance(){
   $classes=Classs::all();
   return view('admin.pages.attendance.create_attendance',compact(
      'classes'
   ));   
}


public function post_attendance(Request $request){

 

   $validatedData= $this->validate($request,[
      'section_id'=>'required',
      'student_id'=>'required|exists:users,id',
      'date'=>'required',
      'attend'=>'required',
   ]);

  $section_info=Section::where('id',$request->section_id)->first();
  $validatedData['teacher_id']=$section_info->teacher_info->id;


   $user = Attendance::create($validatedData);
   return back()->with('success','Class save successfully');

}

public function attendance_list(){
   $attendances = Attendance::with([
      'teacher_info' => function ($query) {
         $query->select('id','name');
     },
     'student_info' => function ($query) {
      $query->select('id','name','class','section','roll_number');
  }
  ])
  ->get();

   return view('admin.pages.attendance.attendance_list',compact(
      'attendances'
   ));   
}
//----------------------------------------------attendance------------------------------------

//----------------------------------------------exam------------------------------------
public function create_exam(){
   $classes=Classs::all();
   return view('admin.pages.exam.create_exam',compact(
      'classes'
   ));   
}

public function post_exam(Request $request){

  
   $validatedData= $this->validate($request,[
      'section_id'=>'required',
      'start_time'=>'required',
      'end_time'=>'required',
      'exam_name'=>'required',
      'pass_mark'=>'required',
      'subject'=>'required',
      'total_question'=>'required',
      'date'=>'required'
   ]);
  $teacher_id=Section::where('id',$request->section_id)->first();
  $validatedData['teacher_id']=$teacher_id->teacher_info->id;

   $user = Exam::create($validatedData);
   return back()->with('success','Class save successfully');

}
public function exam_list(){
   
   return view('admin.pages.exam.exam_list');   
}
//----------------------------------------------exam------------------------------------

//----------------------------------------------question------------------------------------
public function create_question(){
   $exams=Exam::where('status',1)->get();
   return view('admin.pages.question.create_question',compact(
      'exams'
   ));   
}
public function post_question(Request $request){

  
   $validatedData= $this->validate($request,[
      'exam_id'=>'required|exists:exams,id',
      'question_name'=>'required',
      'question_number'=>'required',
      'A'=>'required',
      'B'=>'required',
      'C'=>'required',
      'D'=>'required',
      'answer'=>'required'
   ]);


   $user = McQuestion::create($validatedData);
   return back()->with('success','Class save successfully');

}


public function question_list(){
   return view('admin.pages.question.question_list');   
}
//----------------------------------------------question------------------------------------

//----------------------------------------------library------------------------------------
public function create_library(){
   return view('admin.pages.library.create_library');   
}

public function post_library(Request $request){

   
   $validatedData= $this->validate($request,[
      'book_name'=>'required',
      'book_type'=>'required',
      'author_name'=>'required',
      'upload_file'=>'required|mimes:pdf',
   ]);


 
  $validatedData['librarian_id']=Auth::user()->id;

 
  if($request->file('upload_file')){  

    $name=$request->book_name.'-'.$request->author_name.'-'.rand ( 0 ,10000);
      $uniqueFileName = $name.'.'. $request->upload_file->getClientOriginalExtension();
     $request->upload_file->move(public_path('library/') , $uniqueFileName);
  $validatedData['upload_file']= $uniqueFileName ;
  }
   $user = BookLibrary::create($validatedData);
   return back()->with('success','Class save successfully');

}

public function library_list(){
   $libraries=BookLibrary::all();
   return view('admin.pages.library.library_list',compact(
      'libraries'
   ));   
}
//----------------------------------------------library------------------------------------

//----------------------------------------------notice------------------------------------
public function create_notice(){
   $classes=Classs::all();
   return view('admin.pages.notice.create_notice',compact(
      'classes'
   ));   
}
public function post_notice(Request $request){



   $validatedData= $this->validate($request,[
      'date'=>'required',
      'title'=>'required',
      'description'=>'required',
   ]);

  if($request->section_id){
      $validatedData['section_id']=$request->section_id;
  }else{
   $validatedData['section_id']='all';
  }
 

   $user = Notice::create($validatedData);
   return back()->with('success','Class save successfully');

}
public function notice_list(){
   $notices=Notice::all();
   return view('admin.pages.notice.notice_list',compact(
      'notices'
   ));   
}
//----------------------------------------------notice------------------------------------

//----------------------------------------------vacation------------------------------------
public function create_vacation(){
   return view('admin.pages.vacation.create_vacation');   
}

public function post_vacation(Request $request){



   $validatedData= $this->validate($request,[
      'end_date'=>'required',
      'vacation_name'=>'required',
      'start_date'=>'required',
   ]);

  

   $user = Vacation::create($validatedData);
   return back()->with('success','Class save successfully');

}
public function vacation_list(){
   $vacations=Vacation::all();
   return view('admin.pages.vacation.vacation_list',compact(
      'vacations'
   ));   
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

   $students=User::where('role','student')->get();
   return view('admin.pages.student.student_list',compact(
      'students'
   ));   
}
//----------------------------------------------student------------------------------------

}
