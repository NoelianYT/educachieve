<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\TeacherModel;
use App\Models\UserModel;

class Students extends BaseController
{
    public function viewDashboard()
    {
        $userId = session()->get('user_id');

        $teacherModel = new TeacherModel();

        $teacher = $teacherModel
            ->select('teachers.teacher_id, users.username, users.level, users.profile_picture')
            ->join('users', 'users.user_id = teachers.user_id')
            ->where('users.user_id', $userId)
            ->first();

        if (!$teacher) {
            return redirect()->to('/logout')->with('error', 'Data guru tidak ditemukan atau tidak valid.');
        }

        session()->set([
            'teacher_id' => $teacher['teacher_id'],
            'username' => $teacher['username'],
            'level' => $teacher['level'],
            'profile_picture' => $teacher['profile_picture'],
            'logged_in' => true
        ]);

        $data = [
            'users' => $teacher
        ];

        return view('students/students_dashboard', $data);
    }

    public function viewCourses(){
        
    }

    public function viewProfile($teacher_id){
        $teacherModel = new TeacherModel();

        $teacher = $teacherModel
            ->select('teachers.*, users.profile_picture')
            ->join('users', 'users.user_id = teachers.user_id')
            ->where('teachers.teacher_id', $teacher_id)
            ->first();

        if (!$teacher) {
            return view('errors/404');
        }

        if (empty($teacher['profile_picture'])) {
            $teacher['profile_picture'] = 'default';
        }

        $data = [
            'teacher' => $teacher
        ];

        return view('students/students_teachers', $data);
    }

    public function editProfile($student_id)
    {
        $userId = session()->get('user_id');
        $db = \Config\Database::connect();
        
        $studentModel = new StudentModel();
        $studentData = $studentModel->find($student_id);
        
        if (!$studentData) {
            return redirect()->to('/students')->with('error', 'Data guru tidak ditemukan.');
        }

        return view('student/edit_profile', ['studentData' => $studentData]);
    }

    public function updateProfile($student_id)
    {
        $studentModel = new studentModel();

        $validation = $this->validate([
            'first_name' => 'required|min_length[2]',
            'phone_number' => 'required|numeric|max_length[15]',
            'tgl_lhr' => 'required|valid_date',
            'gender' => 'required|in_list[L,P]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'first_name'    => $this->request->getPost('first_name'),
            'last_name'     => $this->request->getPost('last_name'),
            'phone_number'  => $this->request->getPost('phone_number'),
            'tpt_lhr'       => $this->request->getPost('tpt_lhr'),
            'tgl_lhr'       => $this->request->getPost('tgl_lhr'),
            'gender'        => $this->request->getPost('gender'),
            'address'       => $this->request->getPost('address'),
        ];

        if ($file = $this->request->getFile('profile_picture')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('uploads/students', $newName);
                $data['profile_picture'] = $newName;
            }
        }

        $studentModel->update($student_id, $data);

        return redirect()->to('/student/profile/' . session()->get('student_id'))->with('success', 'Profil berhasil diperbarui.');
    }
}