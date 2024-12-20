<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject List | EducAchieve</title>
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
                            <img class="profile-pic" src="<?= base_url('uploads/teachers/' . esc($users['profile_picture'])); ?>" alt="Foto Profil">
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <section class="teachers-info">
        <h2>Subjects List</h2>
        <button class="new-course-button" onclick="window.location.href='/teacher/course/create'">New Course</button>
        <table>
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Material Name</th>
                    <th>Material</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($subjects as $subject): ?>
                    <tr>
                        <td><?= esc($subject['subject_name']); ?></td>
                        <td><?= esc($subject['material_name']); ?></td>
                        <td>
                            <a href="<?= base_url('uploads/materials/' . esc($subject['material'])); ?>" target="_blank" class="pdf-link">
                                <?= esc($subject['material']); ?>
                            </a>
                        </td>
                        <td>
                            <a href="/subject/edit/<?= $subject['subject_id']; ?>" class="edit-link">Edit</a>
                            <a href="/subject/delete/<?= $subject['subject_id']; ?>" class="delete-link">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <footer>
        <p>&copy; 2024 EducAchieve. All rights reserved.</p>
    </footer>
</body>
</html>