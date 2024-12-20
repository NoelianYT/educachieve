<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Profile - EducAchieve</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
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
    <h1>Students Profile</h1>

    <?php if (session()->getFlashdata('message')): ?>
        <p style="color: green;"><?= session()->getFlashdata('message'); ?></p>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error'); ?></p>
    <?php endif; ?>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kelas</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student['student_id']; ?></td>
                <td><?= $student['first_name'] . ' ' . $student['last_name']; ?></td>
                <td><?= $student['email']; ?></td>
                <td><?= $student['class_id']; ?></td>
                <td><?= $student['tgl_lhr']; ?></td>
                <td>
                    <button onclick="editStudent(<?= htmlspecialchars(json_encode($student)); ?>)">Edit</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div id="editForm" style="display:none;">
        <h2>Edit Student</h2>
        <form method="POST" action="<?= site_url('/students-profile/update'); ?>">
            <input type="hidden" name="id" id="studentId">
            <label for="name">Nama:</label>
            <input type="text" name="name" id="studentName" required><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="studentEmail" required><br>
            <label for="class">Kelas:</label>
            <input type="text" name="class" id="studentClass" required><br>
            <label for="dob">Tanggal Lahir:</label>
            <input type="date" name="dob" id="studentDob" required><br>
            <button type="submit">Simpan</button>
            <button type="button" onclick="cancelEdit()">Batal</button>
        </form>
    </div>

    <script>
        function editStudent(student) {
            document.getElementById('studentId').value = student.student_id;
            document.getElementById('studentName').value = student.first_name + ' ' + student.last_name;
            document.getElementById('studentEmail').value = student.email;
            document.getElementById('studentClass').value = student.class_id;
            document.getElementById('studentDob').value = student.tgl_lhr;
            document.getElementById('editForm').style.display = 'block';
        }

        function cancelEdit() {
            document.getElementById('editForm').style.display = 'none';
        }
    </script>
</body>
</html>