<?php

namespace App\Controllers;

use App\Models\UserModel;

class Guest extends BaseController
{
    public function viewDashboard()
    {
        return view('guest_dashboard');
    }

    public function viewFAQ()
    {
        return view('guest_faq');
    }

    public function viewTeacher()
    {
        return view('guest_teacher');
    }

    public function viewLogin()
    {
        return view('guest_login');
    }

    public function viewRegister()
    {
        return view('guest_register');
    }
}