<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_id',
        'teacher_id',
        'start_time',
        'end_time',
        'class_subject',
        'day'
    ];
    public function section_info(){
        return $this->hasOne('App\Models\Section','id','section_id');
    }
    public function teacher_info(){
        return $this->hasOne('App\Models\Teacher','id','teacher_id');
    }
}
