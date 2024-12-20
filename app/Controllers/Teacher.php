<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\TeacherModel;
use App\Models\SubjectsModel;
use App\Models\ClassModel;
use App\Models\QuizzesModel;
use App\Models\GradesModel;
use App\Models\UserModel;

class Teacher extends BaseController
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

        return view('teacher/teacher_dashboard', $data);
    }

    public function viewCourses()
    {   
        $subjectModel = new SubjectsModel();
        
        $userId = session()->get('user_id');
        $teacherModel = new TeacherModel();
        
        $teacher = $teacherModel->select('teachers.teacher_id, users.profile_picture')
            ->join('users', 'users.user_id = teachers.user_id')
            ->where('users.user_id', $userId)
            ->first();

        if (!$teacher) {
            return redirect()->to('/error-page')->with('message', 'Teacher data not found.');
        }

        $subjects = $subjectModel->select('subjects.*')
            ->where('subjects.teacher_id', $teacher['teacher_id'])
            ->findAll();

        return view('teacher/teacher_courses', [
            'subjects' => $subjects,
            'users' => $teacher
        ]);
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

        return view('teacher/teacher_profile', $data);
    }

    public function editProfile($teacher_id)
    {
        $userId = session()->get('user_id');
        $db = \Config\Database::connect();
        
        $teacherModel = new TeacherModel();
        $teacherData = $teacherModel->find($teacher_id);
        
        if (!$teacherData) {
            return redirect()->to('/teachers')->with('error', 'Data guru tidak ditemukan.');
        }

        return view('teacher/edit_profile', ['teacherData' => $teacherData]);
    }

    public function updateProfile($teacher_id)
    {
        $teacherModel = new TeacherModel();

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
            'introduction'  => $this->request->getPost('introduction'),
        ];

        $teacherModel->update($teacher_id, $data);

        return redirect()->to('/teacher/profile/' . session()->get('teacher_id'))->with('success', 'Profil berhasil diperbarui.');
    }

    public function deleteAccount()
    {
        $teacherId = session()->get('user_id');
        $teacherModel = new TeacherModel();
        $userModel = new UserModel();

        $teacherModel->delete($teacherId);

        $userModel->delete($teacherId);

        session()->destroy();

        return redirect()->to('/')->with('success', 'Akun berhasil dihapus.');
    }

    public function viewFAQ()
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

        return view('teacher/teacher_faq', $data);
    }

    public function viewStudents()
    {
        $teacherModel = new TeacherModel();
        $teacher = $teacherModel
            ->select('users.profile_picture')
            ->join('users', 'users.user_id = teachers.user_id')
            ->where('teachers.teacher_id', session()->get('teacher_id'))
            ->first();

        $db = \Config\Database::connect();
        $builder = $db->table('students');

        $builder->select('students.*, users.profile_picture as photo_profile');
        $builder->join('users', 'users.user_id = students.user_id');
        $builder->join('teachers', 'teachers.teacher_id = students.teacher_id');
        $builder->where('students.teacher_id', session()->get('teacher_id'));
        $builder->where('users.level', 1);
        
        $query = $builder->get();
        $students = $query->getResultArray();

        $data = [
            'students' => $students,
            'teacher' => $teacher
        ];

        return view('teacher/teacher_students', $data);
    }

    public function studentProfile($student_id){
        $studentModel = new StudentModel();
        $teacherModel = new TeacherModel();
    
        $student = $studentModel
            ->select('students.*, users.profile_picture')
            ->join('users', 'users.user_id = students.user_id')
            ->where('students.student_id', $student_id)
            ->first();
    
        if (!$student) {
            return view('errors/404');
        }
    
        if (empty($student['profile_picture'])) {
            $student['profile_picture'] = 'default';
        }
    
        $teacher = $teacherModel
            ->select('teachers.*, users.profile_picture')
            ->join('users', 'users.user_id = teachers.user_id')
            ->where('teachers.teacher_id', session()->get('teacher_id'))
            ->first();
    
        if (!$teacher) {
            return redirect()->to('/logout')->with('error', 'Data guru tidak ditemukan.');
        }
    
        $data = [
            'student' => $student,
            'teacher' => $teacher
        ];
    
        return view('teacher/teacher_studentprofile', $data);
    }

    public function create()
    {
        $classModel = new ClassModel();
        $teacherModel = new TeacherModel();
        
        $classes = $classModel->findAll();
        $teachers = $teacherModel->findAll();

        return view('teacher/new_course_form', [
            'classes' => $classes,
            'teachers' => $teachers
        ]);
    }

    public function store()
    {
        $this->validate([
            'class_id' => 'required',
            'teacher_id' => 'required',
            'subject_name' => 'required|string|max_length[100]',
            'material_name' => 'required|string|max_length[255]',
            'material' => 'uploaded[material]|max_size[material,10240]|ext_in[material,pdf]'
        ]);

        $courseModel = new SubjectsModel();
        $material = $this->request->getFile('material');
        
        $material->move(ROOTPATH . 'public/uploads/materials');
        
        $courseModel->save([
            'class_id' => $this->request->getPost('class_id'),
            'teacher_id' => $this->request->getPost('teacher_id'),
            'subject_name' => $this->request->getPost('subject_name'),
            'material_name' => $this->request->getPost('material_name'),
            'material' => $material->getName()
        ]);

        return redirect()->to('/teacher/course')->with('message', 'New course created successfully!');
    }

    public function viewQuizzes()
    {
        $quizModel = new QuizzesModel();
        $quizBuilder = $quizModel->select('quizzes.quiz_id, subjects.subject_name, subjects.material_name, quizzes.questions, quizzes.answers')
                                ->join('subjects', 'subjects.subject_id = quizzes.subject_id')
                                ->findAll();

        $teacherId = session()->get('teacher_id'); // Get teacher_id from session

        // Fetch teacher's user data (including profile_picture) from users table
        $userModel = new UserModel();  // Assuming you have a UserModel
        $teacher = $userModel->find($teacherId);  // Assuming teacher_id is the same as user_id

        return view('teacher/teacher_quizzes', [
            'quizzes' => $quizBuilder,
            'teacher' => $teacher,
        ]);
    }

    public function viewGrades()
    {
        $studentId = $this->request->getGet('student_id');
        if (!$studentId) {
            $studentId = 1;
        }

        $gradesModel = new GradesModel();
        $grades = $gradesModel->where('student_id', $studentId)->findAll();

        $studentsModel = new StudentModel();
        $students = $studentsModel->findAll();  // Get all students

        $student = $studentsModel->find($studentId);  // Get the selected student details

        $quizzesModel = new QuizzesModel();
        $quizzes = $quizzesModel->findAll();

        $subjectModel = new SubjectsModel();
        $subjects = $subjectModel->findAll();

        $usersModel = new UserModel();
        $teacher = $usersModel->find(session()->get('teacher_id'));

        return view('teacher/teacher_grades', [
            'grades' => $grades,
            'students' => $students,
            'student' => $student,
            'quizzes' => $quizzes,
            'teacher' => $teacher,
            'subjects' => $subjects
        ]);
    }

    public function editGrade($gradeId)
    {
        $gradesModel = new GradesModel();
        $studentModel = new StudentModel();
        $subjectModel = new SubjectsModel();

        $grade = $gradesModel->find($gradeId);
        $student = $studentModel->find($grade['student_id']);
        $subjects = $subjectModel->findAll();

        if (!$grade) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Grade not found");
        }

        return view('teacher/edit_grade', [
            'grade' => $grade,
            'student' => $student,
            'subjects' => $subjects,
        ]);
    }

    public function updateGrade($gradeId)
    {
        $subjectId = $this->request->getPost('subject_id');
        $grade = $this->request->getPost('grade');
        $score = $this->request->getPost('score');

        $gradesModel = new GradesModel();

        $gradesModel->update($gradeId, [
            'subject_id' => $subjectId,
            'grade' => $grade,
            'score' => $score,
        ]);

        return redirect()->to('/teacher/grade');
    }

    public function deleteGrade($gradeId)
    {
        $gradesModel = new GradesModel();

        $gradesModel->delete($gradeId);

        return redirect()->to('/teacher/grade');
    }

    public function editQuiz($quiz_id)
    {
        $quizModel = new QuizzesModel();
        $data['quiz'] = $quizModel->getQuizWithSubject($quiz_id);  // Fetch quiz with subject_name

        if (!$data['quiz']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Quiz not found');
        }

        return view('teacher/new_quiz', $data);
    }

    public function createQuiz($quiz_id = null)
    {
        $quizModel = new QuizzesModel();

        if ($quiz_id) {
            $data['quiz'] = $quizModel->find($quiz_id);
            if (!$data['quiz']) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Quiz not found');
            }
        }

        return view('teacher/new_quiz', $data ?? []);
    }

    public function storeQuiz()
    {
        // Validation rules
        $validation = \Config\Services::validation();
        $validation->setRules([
            'subject_name' => 'required',
            'material_name' => 'required',
            'questions' => 'uploaded[questions]|max_size[questions,10240]|ext_in[questions,pdf,docx,txt]',
            'answers' => 'uploaded[answers]|max_size[answers,10240]|ext_in[answers,pdf,docx,txt]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Handle file upload for questions and answers
        $questionFile = $this->request->getFile('questions');
        $answerFile = $this->request->getFile('answers');

        $questionFile->move(ROOTPATH . 'public/uploads/questions');
        $answerFile->move(ROOTPATH . 'public/uploads/answers');

        $quizModel = new QuizzesModel();
        $quizModel->save([
            'subject_name' => $this->request->getVar('subject_name'),
            'material_name' => $this->request->getVar('material_name'),
            'questions' => $questionFile->getName(),
            'answers' => $answerFile->getName(),
        ]);

        return redirect()->to('/teacher/quiz')->with('message', 'Quiz created successfully');
    }

    public function updateQuiz($quiz_id)
    {
        // Validation rules
        $validation = \Config\Services::validation();
        $validation->setRules([
            'subject_name' => 'required',
            'material_name' => 'required',
            'questions' => 'uploaded[questions]|max_size[questions,10240]|ext_in[questions,pdf,docx,txt]',
            'answers' => 'uploaded[answers]|max_size[answers,10240]|ext_in[answers,pdf,docx,txt]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Handle file upload for questions and answers
        $questionFile = $this->request->getFile('questions');
        $answerFile = $this->request->getFile('answers');

        if ($questionFile->isValid()) {
            $questionFile->move(ROOTPATH . 'public/uploads/questions');
        }
        if ($answerFile->isValid()) {
            $answerFile->move(ROOTPATH . 'public/uploads/answers');
        }

        $quizModel = new QuizzesModel();
        $quizModel->update($quiz_id, [
            'subject_name' => $this->request->getVar('subject_name'),
            'material_name' => $this->request->getVar('material_name'),
            'questions' => $questionFile->getName() ?? $this->request->getVar('old_questions'),
            'answers' => $answerFile->getName() ?? $this->request->getVar('old_answers'),
        ]);

        return redirect()->to('/teacher/quiz')->with('message', 'Quiz updated successfully');
    }

    public function deleteQuiz($quiz_id)
    {
        $quizModel = new QuizzesModel();

        $quiz = $quizModel->find($quiz_id);

        if (!$quiz) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Quiz not found');
        }

        if ($quizModel->delete($quiz_id)) {
            return redirect()->to('/teacher/quiz')->with('message', 'Quiz deleted successfully');
        } else {
            return redirect()->to('/teacher/quiz')->with('error', 'Failed to delete quiz');
        }
    }
}