<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Dosen/Guru - EducAchieve</title>
    <link rel="stylesheet" href="<?= base_url('css/teachers.css'); ?>">
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
        <?php if (!empty($teachers) && is_array($teachers)) : ?>
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
                        <th>Tanggal Bergabung</th>
                        <th>Quality</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($teachers as $teacher) : ?>
                        <tr onclick="window.location.href='<?= site_url('/admin/teachers/profile/' . $teacher['teacher_id']); ?>'">
                            <td><img class="profile-pic" src="<?= base_url('uploads/teachers/' . esc($teacher['photo_profile'])); ?>" alt="Foto Profil"></td>
                            <td><?= esc($teacher['first_name']); ?></td>
                            <td><?= esc($teacher['last_name']); ?></td>
                            <td><?= esc($teacher['phone_number']); ?></td>
                            <td><?= esc($teacher['tpt_lhr']); ?></td>
                            <td><?= esc($teacher['tgl_lhr']); ?></td>
                            <td><?= esc($teacher['gender']); ?></td>
                            <td><?= esc($teacher['address']); ?></td>
                            <td><?= esc($teacher['hire_date']); ?></td>
                            <td><?= esc($teacher['quality']); ?></td>
                            <td><?= esc($teacher['status']); ?></td>
                            <td><a href="/delete" class="delete-link">Hapus</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>Tidak ada data guru yang tersedia.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 EducAchieve. All rights reserved.</p>
    </footer>
</body>
</html>