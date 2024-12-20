<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa/Siswa - EducAchieve</title>
    <link rel="stylesheet" href="<?= base_url('css/students.css'); ?>">
    <script src="<?= base_url('uploads/js/guest-teachers.js'); ?>" defer></script>
    <link rel="icon" type="image/png" href="<?= base_url('uploads/images/logo.png'); ?>">
</head>
<body>
    <header>
        <div class="header-content">
            <img src="<?= base_url('uploads/images/banner.png'); ?>" style="width: 250px; height: 100px;">
            <ul class="menu-left">
                <li><a href="/admin/progress">Progress Nilai</a></li>
                <li><a href="/admin/students">Students</a></li>
                <li><a href="/admin/teachers">Teachers</a></li>
            </ul>
        </div>
        <div class="header-content">
            <ul class="menu-right">
                <li><a href="/logout">Log Out</a></li>
                <li>
                    <a href="/admin/profile/<?= session()->get('teacher_id'); ?>">
                        <button class="profile-button">
                            <img class="profile-pic" src="<?= base_url('uploads/admins/' . esc($admin['profile_picture'])); ?>" alt="Foto Profil">
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <main>
        <?php if (!empty($students) && is_array($students)) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Nomor Telepon</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student) : ?>
                        <tr onclick="window.location.href='<?= site_url('/admin/students/profile/' . $student['student_id']); ?>'">
                            <td><img class="profile-pic" src="<?= base_url('uploads/students/' . esc($student['photo_profile'])); ?>" alt="Foto Profil"></td>
                            <td><?= esc($student['first_name']); ?></td>
                            <td><?= esc($student['last_name']); ?></td>
                            <td><?= esc($student['phone_number']); ?></td>
                            <td><?= esc($student['tpt_lhr']); ?></td>
                            <td><?= esc($student['tgl_lhr']); ?></td>
                            <td><?= esc($student['gender']); ?></td>
                            <td><?= esc($student['address']); ?></td>
                            <td><a href="<?= site_url('/admin/students/delete/' . esc($student['student_id'])); ?>" class="delete-link">Hapus</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>Tidak ada data siswa yang tersedia.</p>
        <?php endif; ?>
    </main>

    <footer>
        <div class="container">
            <h2>Contact Person</h2>
            <p>Email: educachieve@mail.business.com | Phone: +62 857 7432 5611 </p>
            <p>&copy; 2024 EducAchieve. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>