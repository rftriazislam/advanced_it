<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AssignmentAnswer;

class PostController extends Controller
{
    public function assignment_answer(Request $request){
    

        $validatedData= $this->validate($request,[
           'user_id'=>'required|exists:users,id',
           'assignment_id'=>'required|exists:assignments,id',
           'upload_answer'=>'required|mimes:pdf',
        ]);
        // $ass=Assignment::where('id',$request->assignment_id)->get();
     
       $user=User::where('id',$request->user_id)->first();
        if($request->file('upload_answer')){  
     
           $name='class-'.$user->class_number  .'-'.$user->section_name.'-'.$request->roll_number.'-'.rand ( 0 ,100000);
              $uniqueFileName = $name.'.'. $request->upload_answer->getClientOriginalExtension();
             $request->upload_answer->move(public_path('Assignment/answer/') , $uniqueFileName);
          $validatedData['upload_answer']= $uniqueFileName ;
          }
         $answer= AssignmentAnswer::create($validatedData);
     
          if ($answer) {
            return response()->json(['sucsess' => true, 'message' => 'success'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'something error'],400);
        }
     }
     
}
