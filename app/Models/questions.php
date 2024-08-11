<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_course',
        'question_text',
        'option1',
        'option2',
        'option3',
        'option4',
        'answer',
        'answer_explanation',
    ];
}
