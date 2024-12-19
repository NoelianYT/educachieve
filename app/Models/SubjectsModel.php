<?php

namespace App\Models;

use CodeIgniter\Model;

class SubjectsModel extends Model
{
    protected $table = 'subjects';
    protected $primaryKey = 'subject_id';
    protected $useTimestamps = false;
    
    protected $allowedFields = [
        'class_id', 'teacher_id', 'subject_name', 'material_name', 'material'
    ];
}