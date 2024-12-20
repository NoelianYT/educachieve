<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ClassModel;
use App\Models\TeacherModel;
use App\Models\StudentModel;

class Guest extends BaseController
{
    public function viewDashboard()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        
        $builder->select('teachers.teacher_id, users.profile_picture, teachers.first_name, teachers.gender');
        $builder->join('teachers', 'teachers.user_id = users.user_id');
        $builder->where('users.level', 2);
        $builder->where('teachers.quality', 'A');
        $query = $builder->get();

        $teachers = $query->getResultArray();

        $data = [
            'teachers' => $teachers
        ];

        return view('guest_dashboard', $data);
    }

    public function viewFAQ()
    {
        return view('guest_faq');
    }

    public function viewTeacher()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('teachers');
        
        $builder->select('teachers.*, users.profile_picture as photo_profile');
        $builder->join('users', 'users.user_id = teachers.user_id');
        $builder->where('users.level', 2);
        $query = $builder->get();

        $teachers = $query->getResultArray();

        $data = [
            'teachers' => $teachers
        ];

        return view('guest_teacher', $data);
    }

    public function viewLogin()
    {
        return view('guest_login');
    }

    public function viewRegister()
    {
        $classModel = new ClassModel();
        $teacherModel = new TeacherModel();

        $classes = $classModel->findAll();
        $teachers = $teacherModel->findAll();

        return view('guest_register', [
            'classes' => $classes,
            'teachers' => $teachers
        ]);
    }

    public function login()
    {
        helper('cookie');
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('guest_login', ['errors' => $validation->getErrors()]);
        }

        $username = htmlspecialchars($this->request->getPost('username'));
        $password = $this->request->getPost('password');
        $remember_me = $this->request->getPost('remember_me');

        if (empty($username) || empty($password)) {
            return redirect()->back()->with('error', 'Username dan Password harus diisi.');
        }

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user) {
            if (md5($password) ==  $user['password']) {
                session()->set([
                    'user_id' => $user['user_id'],
                    'username' => $user['username'],
                    'level' => $user['level'],
                    'logged_in' => true
                ]);
                session()->regenerate();

                set_cookie([
                    'name'   => 'username',
                    'value'  => $username,
                    'expire' => 3600 * 24 * 30,
                    'secure' => true,
                    'httponly' => true
                ]);
                
                if ($remember_me) {
                    set_cookie('username', $username, 3600 * 24 * 30, '', '', true, true);
                }

                $level = (int)$user['level'];
                switch ($level) {
                    case 1:
                        return redirect()->to('/students/dashboard');
                    case 2:
                        return redirect()->to('/teacher/dashboard');
                    case 3:
                        return redirect()->to('/admin/progress');
                    default:
                        return redirect()->back()->with('error', 'Level pengguna tidak valid.');
                }
            } else {
                return redirect()->back()->with('error', 'Password salah.');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan.');
        }
    }

    public function register()
    {
        $level = $this->request->getPost('level');
        $firstName = $this->request->getPost('first_name');
        $lastName = $this->request->getPost('last_name');
        $email = $this->request->getPost('email');
        $phoneNumber = $this->request->getPost('phone_number');
        $placeOfBirth = $this->request->getPost('tpt_lhr');
        $dob = $this->request->getPost('tgl_lhr');
        $address = $this->request->getPost('address');
        $gender = $this->request->getPost('gender');
        $classId = ($level == 1) ? $this->request->getPost('class_id') : null;
        $teacherId = ($level == 1) ? $this->request->getPost('teacher_id') : null;

        // Get the profile picture file
        $profilePicture = $this->request->getFile('profile_picture');
        $profilePictureName = $profilePicture->getRandomName();

        // Determine the path for the profile picture
        $path = $level == 1 ? 'uploads/students/' : 'uploads/teachers/';
        $profilePicture->move($path, $profilePictureName);

        // Hash the password using md5()
        $hashedPassword = md5('default_password'); // Using MD5 for password hashing

        // Insert into the users table
        $userModel = new UserModel();
        $userData = [
            'username' => strtolower($email), // Using email as username
            'email' => $email,
            'password' => $hashedPassword,  // Save the MD5 hashed password
            'level' => $level,
            'profile_picture' => $profilePictureName,
        ];
        $userModel->insert($userData);
        $userId = $userModel->insertID();

        // Insert into student or teacher table based on the level
        if ($level == 1) {
            // Insert into students table
            $studentModel = new StudentModel();
            $studentData = [
                'user_id' => $userId,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'phone_number' => $phoneNumber,
                'tpt_lhr' => $placeOfBirth,
                'tgl_lhr' => $dob,
                'address' => $address,
                'gender' => $gender,
                'class_id' => $classId,
                'teacher_id' => $teacherId,
            ];
            $studentModel->insert($studentData);
        } elseif ($level == 2) {
            // Insert into teachers table
            $teacherModel = new TeacherModel();
            $teacherData = [
                'user_id' => $userId,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'phone_number' => $phoneNumber,
                'tpt_lhr' => $placeOfBirth,
                'tgl_lhr' => $dob,
                'address' => $address,
                'gender' => $gender,
            ];
            $teacherModel->insert($teacherData);
        }

        // Redirect to login page after successful registration
        return redirect()->to('/guest-login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
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

        return view('guest_profile', $data);
    }
}