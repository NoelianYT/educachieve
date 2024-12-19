<?php

namespace App\Controllers;

use App\Models\TeacherModel;
use App\Models\UserModel;

class Students extends BaseController
{
    public function viewDashboard()
    {
        return view('students/students_dashboard');
    }
}