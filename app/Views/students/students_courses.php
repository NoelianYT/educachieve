<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Course</title>
</head>
<body>
    <header>
        <div class="header-content">
            <img src="<?= base_url('uploads/images/banner.png'); ?>" style="width: 250px; height: 100px;">
            <ul class="menu-left">
                <li><a href="/students/dashboard">Dashboard</a></li>
                <li><a href="/students/course">Courses</a></li>
                <li><a href="/students/faq">FAQ</a></li>
                <li><a href="/students/students">Students</a></li>
            </ul>
        </div>
        <div class="header-content">
            <ul class="menu-right">
                <li><a href="/logout">Log Out</a></li>
                <li>
                    <a href="/students/profile/<?= session()->get('teacher_id'); ?>">
                        <button class="profile-button">
                            <img class="profile-pic" src="<?= base_url('uploads/teachers/' . esc($teacher['profile_picture'])); ?>" alt="Foto Profil">
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <h1>Students Course</h1>

    <h2>Classes</h2>
    <table border="1">
        <tr>
            <th>Class ID</th>
            <th>Class Name</th>
            <th>Class Level</th>
            <th>Teacher Name</th>
        </tr>
        <?php foreach ($classes as $class): ?>
            <tr>
                <td><?= $class['class_id']; ?></td>
                <td><?= $class['class_name']; ?></td>
                <td><?= $class['class_level']; ?></td>
                <td><?= $class['teacher_first_name'] . ' ' . $class['teacher_last_name']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Grades</h2>
    <table border="1">
        <tr>
            <th>Grade ID</th>
            <th>Quiz ID</th>
            <th>Student ID</th>
            <th>Grade</th>
            <th>Score</th>
        </tr>
        <?php foreach ($grades as $grade): ?>
            <tr>
                <td><?= $grade['grade_id']; ?></td>
                <td><?= $grade['quiz_id']; ?></td>
                <td><?= $grade['student_id']; ?></td>
                <td><?= $grade['grade']; ?></td>
                <td><?= $grade['score']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>