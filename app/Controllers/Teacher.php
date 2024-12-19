<?php

namespace App\Controllers;

use App\Models\TeacherModel;
use App\Models\UserModel;

class Teacher extends BaseController
{
    public function viewDashboard()
    {
        return view('teacher/teacher_dashboard');
    }
}