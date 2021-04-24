<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'teacher_id',
        'exam_name',
        'subject',
        'pass_mark',
        'total_question',
        'date',
        'start_time',
        'end_time',
        'status'

    ];
}
