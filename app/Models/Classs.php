<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name',
        'class_number',
        'group',
    ];

    public function sections(){
        return $this->hasMany('App\Models\Section','class_id','id');
    }
}
