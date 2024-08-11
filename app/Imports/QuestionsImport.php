<?php

namespace App\Imports;

use App\Models\questions;
use Maatwebsite\Excel\Concerns\ToModel;

class QuestionsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new questions([
            // 'id' => $row[0],
            'id_course'  => $row[0],
            'question_text'  => $row[1],
            'option1'  => $row[2],
            'option2'  => $row[3],
            'option3'  => $row[4],
            'option4'  => $row[5],
            'answer'  => $row[6],
            'answer_explanation'  => $row[7],
        ]);
    }
}
