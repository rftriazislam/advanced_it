<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentAnswer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'assignment_id',
        'upload_answer',
        'status',
    ];
}


