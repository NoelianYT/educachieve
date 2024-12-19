<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'student_id';
    protected $useTimestamps = false;
    
    protected $allowedFields = [
        'user_id', 'teacher_id', 'class_id', 'first_name', 'last_name', 'phone_number', 'tpt_lhr', 'tgl_lhr', 'gender', 'address'
    ];
    
    public function getStudentsByUserId($userId)
    {
        return $this->where('user_id', $userId)->first();
    }

    public function getStudentsWithProfile()
    {
        return $this->select('students.student_id, students.first_name, students.last_name, users.photo_profile')->join('users', 'students.user_id = users.user_id')->findAll();
    }

    public function getStudentsByClass($classId)
    {
        return $this->where('class_id', $classId)->findAll();
    }

    public function addStudent($data)
    {
        return $this->insert($data);
    }

    public function updateStudent($studentId, $data)
    {
        return $this->update($studentId, $data);
    }
}