<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_course',
        'class',
        'subject',
        'title',
        'hours',
        'summary',
        'video',
        'audio',
        'file',
        'test_file',
    ];
}
