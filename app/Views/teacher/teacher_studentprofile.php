<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Murid | EducAchieve</title>
    <link rel="stylesheet" href="<?= base_url('css/profile.css'); ?>">
    <link rel="icon" type="image/png" href="<?= base_url('uploads/images/logo.png'); ?>">
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
    <h1>Student Profile</h1>
    <section class="teacher-profile">
        <div class="profile-card">
            <img src="<?= base_url('uploads/students/' . $student['profile_picture']); ?>" alt="Foto Profil">
            <div>
                <h2><?= $student['first_name'] . ' ' . $student['last_name']; ?></h2>
                <p><strong>Telepon:</strong> <?= $student['phone_number']; ?></p>
                <p><strong>Tempat Lahir:</strong> <?= $student['tpt_lhr']; ?></p>
                <p><strong>Tanggal Lahir:</strong> <?= date('d-m-Y', strtotime($student['tgl_lhr'])); ?></p>
                <p><strong>Alamat:</strong> <?= $student['address']; ?></p>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 EducAchieve. All rights reserved.</p>
    </footer>
</body>
</html>