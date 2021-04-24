<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLibrary extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_name',
        'book_type',
        'author_name',
        'upload_file',
        'librarian_id',
        'status',

    ];
}
