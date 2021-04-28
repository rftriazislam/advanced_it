<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Section;

class AjaxController extends Controller
{
   public function get_teacher_list(Request $request){
       $class_id=$request->class_id;
       $teachers = Teacher::where("class_id", $class_id)
       ->get();

       $load='';
foreach($teachers as $teacher){
     $load .='<option value="'.$teacher->id.'">'.$teacher->name.' ('.$teacher->subject.')</option>';
}

        $data = array(
          'load'  => $load,
     );

     echo json_encode($data);
   }

   public function get_section_list(Request $request){
    $class_id=$request->class_id;
    $section = Section::where("class_id", $class_id)
         ->pluck("section_name", "id");
     return response()->json($section);
}


public function get_section_list_subject(Request $request){
     $class_id=$request->class_id;
     $sections = Section::where("class_id", $class_id)
     ->get();

     $load='';
foreach($sections as $section){
   $load .='<option value="'.$section->id.'">'.$section->section_name.'   '.$section->teacher_info->subject.'  ('.$section->teacher_info->name.')</option>';
}

      $data = array(
        'load'  => $load,
   );

   echo json_encode($data);
 }
 public function get_subject_list(Request $request){
     $section_id=$request->section_id;
     $section = Section::where("id", $section_id)
     ->first();

     $load='';


   $load .=' <input type="text" disabled value="'.$section->section_name.'   '.$section->teacher_info->subject.'"  class="span6 " />';
   $load .=' <input type="hidden" name="subject" value="'.$section->teacher_info->subject.'" class="span6 " />';
   
      $data = array(
        'load'  => $load,
   );

   echo json_encode($data);
 }
}
