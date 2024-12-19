<?php

namespace App\Controllers;

use App\Models\TeacherModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    public function viewFAQ()
    {
        return view('admim/admin_faq');
    }

    public function viewTeacher()
    {
        $teacherModel = new TeacherModel();
        $teachers = $teacherModel->getAllTeachers();

        return view('guest_teacher', ['teachers' => $teachers]);
    }

    public function viewDashboard()
    {
        return view('guest_dashboard');
    }

    public function teacherDashboard()
    {
        $teacherId = $this->request->getGet('teacher_id');

        if (empty($teacherId)) {
            return redirect()->to('/teachers')->with('error', 'ID guru/dosen tidak ditemukan.');
        }

        $teacherModel = new TeacherModel();
        $userModel = new UserModel();

        $teacher = $teacherModel->find($teacherId);

        if (!$teacher) {
            return redirect()->to('/teachers')->with('error', 'Data guru/dosen tidak ditemukan.');
        }

        $user = $userModel->find($teacher['user_id']);

        if (!$user) {
            return redirect()->to('/teachers')->with('error', 'Data pengguna tidak ditemukan.');
        }

        $salutation = ($user['gender'] === 'L') ? 'Pak' : 'Bu';

        $data = [
            'photo_profile' => $user['photo_profile'],
            'salutation' => $salutation,
            'first_name' => $teacher['first_name'],
        ];

        return view('teacher_dashboard', $data);
    }
    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $sessionData = [
                    'user_id' => $user['user_id'],
                    'username' => $user['username'],
                    'level' => $user['level'],
                    'logged_in' => true,
                ];
                session()->set($sessionData);

                if ($user['level'] == 1) {
                    return redirect()->to('/students/dashboard');
                } elseif ($user['level'] == 2) {
                    return redirect()->to('/teacher/dashboard');
                } elseif ($user['level'] == 3) {
                    return redirect()->to('/admin/dashboard');
                }
            } else {
                session()->setFlashdata('error', 'Password salah!');
                return view('guest-login');
            }
        } else {
            session()->setFlashdata('error', 'Username tidak ditemukan!');
            return view('guest-login');
        }
    }

    public function viewLogin()
    {
        return view('guest_login');
    }

    public function viewRegister()
    {
        return view('guest_register');
    }

    public function register()
    {
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $level = $this->request->getPost('level');

        $firstName = $this->request->getPost('first_name');
        $lastName = $this->request->getPost('last_name');
        $phoneNumber = $this->request->getPost('phone_number');
        $tptLhr = $this->request->getPost('tpt_lhr');
        $tglLhr = $this->request->getPost('tgl_lhr');
        $gender = $this->request->getPost('gender');
        $address = $this->request->getPost('address');

        $status = ($level == '2') ? $this->request->getPost('status') : null;

        $file = $this->request->getFile('profile_picture');
        if ($file && $file->isValid()) {
            $newFileName = $file->getRandomName();
            $file->move(WRITEPATH . 'assets/images', $newFileName);
        } else {
            $newFileName = null;
        }

        $data = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'level' => $level,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'phone_number' => $phoneNumber,
            'tpt_lhr' => $tptLhr,
            'tgl_lhr' => $tglLhr,
            'gender' => $gender,
            'address' => $address,
            'status' => $status,
            'profile_picture' => $newFileName,
        ];

        if ($userModel->insert($data)) {
            return redirect()->to('/guest-login')->with('success', 'Registrasi berhasil! Silakan login.');
        } else {
            return view('guest-register', ['error' => 'Registrasi gagal! Silakan coba lagi.']);
        }
    }
}