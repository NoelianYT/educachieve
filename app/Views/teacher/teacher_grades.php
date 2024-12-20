<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grades | EducAchieve</title>
    <link rel="stylesheet" href="<?= base_url('css/course.css'); ?>">
</head>
<body>
    <header>
        <div class="header-content">
            <img src="<?= base_url('uploads/images/banner.png'); ?>" style="width: 250px; height: 100px;">
            <ul class="menu-left">
                <li><a href="/teacher/dashboard">Dashboard</a></li>
                <li><a href="/teacher/students">Students</a></li>
                <li><a href="/teacher/course">Courses</a></li>
                <li><a href="/teacher/quiz">Quizzes</a></li>
                <li><a href="/teacher/grade">Grades</a></li>
                <li><a href="/teacher/faq">FAQ</a></li>
            </ul>
        </div>
        <div class="header-content">
            <ul class="menu-right">
                <li><a href="/logout">Log Out</a></li>
                <li>
                    <a href="/teacher/profile/<?= session()->get('teacher_id'); ?>">
                        <button class="profile-button">
                            <img class="profile-pic" src="<?= base_url('uploads/teachers/' . esc($teacher['profile_picture'])); ?>" alt="Foto Profil">
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <section class="teachers-info">
        <form method="get" action="/teacher/grade">
            <label for="student_id">Select Student:</label>
            <select name="student_id" id="student_id" onchange="this.form.submit()" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px; background-color: #fff; transition: border-color 0.3s ease;">
                <?php foreach ($students as $studentOption): ?>
                    <option value="<?= esc($studentOption['student_id']); ?>" <?= $studentOption['student_id'] == esc($student['student_id']) ? 'selected' : ''; ?>>
                        <?= esc($studentOption['first_name']) . ' ' . esc($studentOption['last_name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

        </form>

        <h2>Grades</h2>
        <table>
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Material</th>
                    <th>Grade</th>
                    <th>Score</th>
                    <th>Mutu Grade</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($grades as $grade): ?>
                    <tr>
                        <td>
                            <?php
                                $subjectName = '';
                                if (isset($grade['subject_id'])) {
                                    foreach ($subjects as $subject) {
                                        if ($subject['subject_id'] == $grade['subject_id']) {
                                            $subjectName = $subject['subject_name'];
                                            break;
                                        }
                                    }
                                } else {
                                    $subjectName = 'No Subject Available';
                                }
                                echo esc($subjectName);
                            ?>
                        </td>
                        <td>
                            <?php 
                                $materialName = '';
                                if (isset($grade['subject_id'])) {
                                    foreach ($subjects as $subject) {
                                        if ($subject['subject_id'] == $grade['subject_id']) {
                                            $materialName = $subject['material_name']; // Use material_name instead of quiz_name
                                            break;
                                        }
                                    }
                                }
                                echo esc($materialName);
                            ?>
                        </td>
                        <td><?= esc($grade['grade']); ?></td>
                        <td><?= esc($grade['score']); ?></td>
                        <td>
                            <?php 
                                $score = esc($grade['score']);
                                if ($score >= 85) {
                                    $mutuGrade = 'A';
                                } elseif ($score >= 80) {
                                    $mutuGrade = 'A-';
                                } elseif ($score >= 75) {
                                    $mutuGrade = 'B+';
                                } elseif ($score >= 70) {
                                    $mutuGrade = 'B';
                                } elseif ($score >= 65) {
                                    $mutuGrade = 'B-';
                                } elseif ($score >= 60) {
                                    $mutuGrade = 'C+';
                                } elseif ($score >= 55) {
                                    $mutuGrade = 'C';
                                } elseif ($score >= 50) {
                                    $mutuGrade = 'C-';
                                } elseif ($score >= 45) {
                                    $mutuGrade = 'D';
                                } else {
                                    $mutuGrade = 'E';
                                }
                                echo esc($mutuGrade);
                            ?>
                        </td>
                        <td>
                            <a href="/teacher/grades/edit/<?= esc($grade['grade_id']); ?>" class="edit-link">Edit</a>
                            <a href="/teacher/grades/delete/<?= esc($grade['grade_id']); ?>" class="delete-link">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="average">
            <p><strong>Average Score: </strong>
                <?php 
                    $totalScore = 0;
                    $gradeCount = count($grades);
                    foreach ($grades as $grade) {
                        $totalScore += $grade['score'];
                    }
                    $averageScore = $gradeCount > 0 ? $totalScore / $gradeCount : 0;
                    echo number_format($averageScore, 2);
                ?>
            </p>
    </section>
    
    <footer>
        <p>&copy; 2024 EducAchieve. All rights reserved.</p>
    </footer>
</body>
</html>