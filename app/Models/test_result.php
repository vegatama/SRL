<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test_result extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_course',
        'question_text',
        'user_id',
        'result',
        'created_at',
    ];
}
