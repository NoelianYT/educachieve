<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizzesModel extends Model
{
    protected $table = 'quizzes';
    protected $primaryKey = 'quiz_id';
    protected $allowedFields = ['subject_id', 'teacher_id', 'questions', 'answers'];
}