<?php

namespace App\Http\Controllers;
use App\Models\Classs;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\StudyMaterial;
use App\Models\Assignments;
use App\Models\Attendance;
use App\Models\Exam;
use App\Models\McQuestion;

class TeacherController extends Controller
{
    public function index(){
        return view('teacher.pages.dashboard');
    }
    //----------------------------------------------material------------------------------------
public function create_material(){
    $classes=Classs::all();
     return view('teacher.pages.material.create_material',compact(
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
     return view('teacher.pages.material.material_list',compact(
        'materials'
     ));   
  }
 //----------------------------------------------material------------------------------------
 
 //----------------------------------------------assignment------------------------------------
 public function create_assignment(){
    $classes=Classs::all();
    return view('teacher.pages.assignment.create_assignment',compact(
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
    return view('teacher.pages.assignment.assignment_list',compact(
       'assignments'
    ));   
 }
 //----------------------------------------------assignment------------------------------------
 
 //----------------------------------------------attendance------------------------------------
 public function create_attendance(){
    $classes=Classs::all();
    return view('teacher.pages.attendance.create_attendance',compact(
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
    return view('teacher.pages.attendance.attendance_list');   
 }
 //----------------------------------------------attendance------------------------------------
 
 //----------------------------------------------exam------------------------------------
 public function create_exam(){
    $classes=Classs::all();
    return view('teacher.pages.exam.create_exam',compact(
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
    return view('teacher.pages.exam.exam_list');   
 }
 //----------------------------------------------exam------------------------------------
 
 //----------------------------------------------question------------------------------------
 public function create_question(){
    $exams=Exam::where('status',1)->get();
    return view('teacher.pages.question.create_question',compact(
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
    return view('teacher.pages.question.question_list');   
 }
 //----------------------------------------------question------------------------------------
}
