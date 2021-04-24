<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'question_name',
        'question_number',
        'A',
        'B',
        'C',
        'D',
        'answer',
        'status'

    ];
}
