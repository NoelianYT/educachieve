<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Guru | EducAchieve</title>
    <link rel="stylesheet" href="<?= base_url('css/profile.css'); ?>">
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
    <h1>Profil Guru</h1>
    <section class="teacher-profile">
        <div class="profile-card">
            <img src="<?= base_url('uploads/admins/' . $admin['profile_picture']); ?>" alt="Foto Profil">
            <div>
                <h2><?= $admin['first_name'] . ' ' . $admin['last_name']; ?></h2>
                <p><strong>Telepon:</strong> <?= $admin['phone_number']; ?></p>
                <a href="/admin/profile/edit">Edit Profile</a>
                <a href="/admin/delete">Hapus Akun</a>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 EducAchieve. All rights reserved.</p>
    </footer>
</body>
</html>