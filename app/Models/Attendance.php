<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'teacher_id',
        'student_id',
        'attend',
        'date',
        'status',

    ];
    public function section_info(){
        return $this->hasOne('App\Models\Section','id','section_id');
    }
    public function teacher_info(){
        return $this->hasOne('App\Models\Teacher','id','teacher_id');
    }
    public function student_info(){
        return $this->hasOne('App\Models\User','id','student_id');
    }
}
