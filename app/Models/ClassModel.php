<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassModel extends Model
{
    protected $table = 'classes';
    protected $primaryKey = 'class_id';
    protected $allowedFields = ['teacher_id', 'class_name', 'class_level'];
}
