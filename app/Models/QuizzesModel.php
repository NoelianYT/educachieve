<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizzesModel extends Model
{
    protected $table = 'quizzes';
    protected $primaryKey = 'quiz_id';
    protected $allowedFields = ['subject_id', 'teacher_id', 'questions', 'answers'];

    public function getQuizWithSubject($quiz_id)
    {
        $builder = $this->db->table('quizzes');
        $builder->select('quizzes.*, subjects.*');
        $builder->join('subjects', 'subjects.subject_id = quizzes.subject_id', 'left');
        $builder->where('quizzes.quiz_id', $quiz_id);
        return $builder->get()->getRowArray();  // Return the quiz data with subject_name
    }
}
