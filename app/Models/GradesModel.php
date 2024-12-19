<?php

namespace App\Models;

use CodeIgniter\Model;

class GradesModel extends Model
{
    protected $table = 'grades';
    protected $primaryKey = 'grade_id';
    protected $allowedFields = ['quiz_id', 'student_id', 'grade', 'score'];
}
