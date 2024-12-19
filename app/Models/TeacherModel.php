<?php

namespace App\Models;

use CodeIgniter\Model;

class TeacherModel extends Model
{
    protected $table = 'teachers';
    protected $primaryKey = 'teacher_id';
    protected $allowedFields = [
        'user_id', 'first_name', 'last_name', 'phone_number', 'tpt_lhr', 
        'tgl_lhr', 'gender', 'address', 'hire_date', 'quality', 'status'
    ];

    public function getTeachers()
    {
        return $this->select('teachers.*, users.username, users.email')->join('users', 'users.user_id = teachers.user_id')->findAll();
    }
    
    public function getAllTeachers()
    {
        return $this->findAll();
    }

    public function saveTeacher($data)
    {
        return $this->save($data);
    }
}