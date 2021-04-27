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
         ->pluck("name", "id");
     return response()->json($section);
}
}
