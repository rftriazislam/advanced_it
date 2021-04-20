<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
 public function index(){
     return view('admin.pages.dashboard');
 }
//----------------------------------------------class------------------------------------
 public function create_class(){
    return view('admin.pages.class.create_class');   
 }
 public function class_list(){
    return view('admin.pages.class.class_list');   
 }
//----------------------------------------------class------------------------------------

//----------------------------------------------Section------------------------------------
public function create_section(){
    return view('admin.pages.section.create_section');   
 }
 public function section_list(){
    return view('admin.pages.section.section_list');   
 }
//----------------------------------------------Section------------------------------------


//----------------------------------------------schedule------------------------------------
public function create_schedule(){
    return view('admin.pages.schedule.create_schedule');   
 }
 public function schedule_list(){
    return view('admin.pages.schedule.schedule_list');   
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

}
