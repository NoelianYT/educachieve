<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\StudentModel;
use App\Models\TeacherModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    public function viewFAQ()
    {
        $userId = session()->get('user_id');
        $adminModel = new AdminModel();
        $admin = $adminModel
            ->select('admins.admin_id, users.username, users.level, users.profile_picture')
            ->join('users', 'users.user_id = admins.user_id')
            ->where('users.user_id', $userId)
            ->first();

        if (!$admin) {
            return redirect()->to('/logout')->with('error', 'Data guru tidak ditemukan atau tidak valid.');
        }

        session()->set([
            'admin_id' => $admin['admin_id'],
            'username' => $admin['username'],
            'level' => $admin['level'],
            'profile_picture' => $admin['profile_picture'],
            'logged_in' => true
        ]);

        $data = [
            'users' => $admin
        ];

        return view('admin/admin_faq', $data);
    }

    public function viewDashboard()
    {
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT 
                c.class_name, 
                c.class_level, 
                AVG(g.score) AS average_score
            FROM 
                grades g
            JOIN 
                students s ON g.student_id = s.student_id
            JOIN 
                classes c ON s.class_id = c.class_id
            GROUP BY 
                c.class_id
        ");
        $data['class_statistics'] = $query->getResultArray();
        
        $userId = session()->get('user_id');
    
        $adminModel = new AdminModel();
    
        $admin = $adminModel
            ->select('admins.admin_id, users.username, users.level, users.profile_picture')
            ->join('users', 'users.user_id = admins.user_id')
            ->where('users.user_id', $userId)
            ->first();
    
        if (!$admin) {
            return redirect()->to('/logout')->with('error', 'Data guru tidak ditemukan atau tidak valid.');
        }
    
        session()->set([
            'admin_id' => $admin['admin_id'],
            'username' => $admin['username'],
            'level' => $admin['level'],
            'profile_picture' => $admin['profile_picture'],
            'logged_in' => true
        ]);
    
        $data['users'] = $admin;
        
        return view('admin/admin_dashboard', $data);
    }    

    public function viewStudents()
    {
        $adminModel = new AdminModel();
        
        $admin = $adminModel
            ->select('users.profile_picture')
            ->join('users', 'users.user_id = admins.user_id')
            ->where('admins.admin_id', session()->get('admin_id'))
            ->first();

        if (!$admin) {
            return redirect()->to('/logout')->with('error', 'Teacher tidak ditemukan.');
        }

        $db = \Config\Database::connect();
        $builder = $db->table('students');
        
        $builder->select('students.*, users.profile_picture as photo_profile');
        $builder->join('users', 'users.user_id = students.user_id');
        $builder->where('users.level', 1);
        $query = $builder->get();

        $students = $query->getResultArray();

        $data = [
            'students' => $students,
            'admin' => $admin
        ];

        return view('admin/admin_students', $data);
    }

    public function viewTeachers()
    {
        $adminModel = new AdminModel();
        $admin = $adminModel
            ->select('users.profile_picture')
            ->join('users', 'users.user_id = admins.user_id')
            ->where('admins.admin_id', session()->get('admin_id'))
            ->first();

        if (!$admin) {
            return redirect()->to('/logout')->with('error', 'Admin tidak ditemukan.');
        }

        $db = \Config\Database::connect();
        $builder = $db->table('teachers');
        
        $builder->select('teachers.*, users.profile_picture as photo_profile');
        $builder->join('users', 'users.user_id = teachers.user_id');
        $builder->where('users.level', 2);
        $query = $builder->get();

        $teachers = $query->getResultArray();

        $data = [
            'teachers' => $teachers,
            'admin' => $admin
        ];

        return view('admin/admin_teachers', $data);
    }

    public function viewProfile($admin_id){
        $adminModel = new AdminModel();

        $admin = $adminModel
            ->select('admins.*, users.profile_picture')
            ->join('users', 'users.user_id = admins.user_id')
            ->where('admins.admin_id', $admin_id)
            ->first();

        if (!$admin) {
            return view('errors/404');
        }

        if (empty($admin['profile_picture'])) {
            $admin['profile_picture'] = 'default';
        }

        $data = [
            'admin' => $admin
        ];

        return view('admin/admin_profile', $data);
    }

    public function editProfile($admin_id)
    {
        $userId = session()->get('user_id');
        $db = \Config\Database::connect();
        
        $adminModel = new AdminModel();
        $adminData = $adminModel->find($admin_id);
        
        if (!$adminData) {
            return redirect()->to('/admins')->with('error', 'Data guru tidak ditemukan.');
        }

        return view('admin/edit_profile', ['adminData' => $adminData]);
    }

    public function updateProfile($admin_id)
    {
        $adminModel = new adminModel();

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
                $file->move('uploads/admins', $newName);
                $data['profile_picture'] = $newName;
            }
        }

        $adminModel->update($admin_id, $data);

        return redirect()->to('/admin/profile/' . session()->get('admin_id'))->with('success', 'Profil berhasil diperbarui.');
    }

    public function deleteStudent($id)
    {
        $db = \Config\Database::connect();
        $builderStudents = $db->table('students');
        $builderUsers = $db->table('users');

        $student = $builderStudents->getWhere(['student_id' => $id])->getRowArray();
        
        if (!$student) {
            return redirect()->to('/admin/students')->with('error', 'Akun tidak ditemukan.');
        }

        $user_id = $student['user_id'];

        $db->transStart();

        $builderStudents->where('student_id', $id);
        $builderStudents->delete();

        $builderUsers->where('user_id', $user_id);
        $builderUsers->delete();

        if ($db->transStatus() === FALSE) {
            $db->transRollback();
            return redirect()->to('/admin/students')->with('error', 'Terjadi kesalahan saat menghapus akun.');
        } else {
            $db->transCommit();
            return redirect()->to('/admin/students')->with('success', 'Akun berhasil dihapus.');
        }
    }

    public function studentProfile($student_id){
        $studentModel = new StudentModel();
        $adminModel = new AdminModel();
        
        $student = $studentModel
            ->select('students.*, users.profile_picture')
            ->join('users', 'users.user_id = students.user_id')
            ->where('students.student_id', $student_id)
            ->first();
    
        if (!$student) {
            return view('errors/404');
        }
    
        if (empty($student['profile_picture'])) {
            $student['profile_picture'] = 'no_profile.jpg';
        }
    
        $admin = $adminModel->where('admin_id', session()->get('admin_id'))->first();
        
        if (empty($admin['profile_picture'])) {
            $admin['profile_picture'] = 'no_profile.jpg';
        }
    
        $data = [
            'student' => $student,
            'admin' => $admin
        ];
    
        return view('admin/admin_studentprofile', $data);
    }    

    public function teacherProfile($teacher_id)
    {
        $teacherModel = new TeacherModel();

        $adminModel = new AdminModel();

        $teacher = $teacherModel
            ->select('teachers.*, users.profile_picture')
            ->join('users', 'users.user_id = teachers.user_id')
            ->where('teachers.teacher_id', $teacher_id)
            ->first();

        $admin = $adminModel
            ->where('admin_id', session()->get('admin_id')) // Get admin based on session
            ->first();

        if (!$teacher) {
            return view('errors/404');
        }

        if (!$admin) {
            return view('errors/404');
        }

        if (empty($teacher['profile_picture'])) {
            $teacher['profile_picture'] = 'no_profile.jpg';
        }
        if (empty($admin['profile_picture'])) {
            $admin['profile_picture'] = 'no_profile.jpg';
        }

        $data = [
            'teacher' => $teacher,
            'admin' => $admin
        ];

        return view('admin/admin_teacherprofile', $data);
    }
}