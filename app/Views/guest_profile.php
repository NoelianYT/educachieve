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
                <li><a href="/">Dashboard</a></li>
                <li><a href="/guest-teacher">Teachers</a></li>
                <li><a href="/guest-faq">FAQ</a></li>
            </ul>
        </div>
        <div class="header-content">
            <ul class="menu-right">
                <li><a href="/guest-login">Log In</a></li>
                <li><a href="/guest-register">Register</a></li>
            </ul>
        </div>
    </header>
    <h1>Profil Guru</h1>
    <section class="teacher-profile">
        <div class="profile-card">
            <img src="<?= base_url('uploads/teachers/' . $teacher['profile_picture']); ?>" alt="Foto Profil">
            <div>
                <h2><?= $teacher['first_name'] . ' ' . $teacher['last_name']; ?></h2>
                <p><strong>Telepon:</strong> <?= $teacher['phone_number']; ?></p>
                <p><strong>Tempat Lahir:</strong> <?= $teacher['tpt_lhr']; ?></p>
                <p><strong>Tanggal Lahir:</strong> <?= date('d-m-Y', strtotime($teacher['tgl_lhr'])); ?></p>
                <p><strong>Alamat:</strong> <?= $teacher['address']; ?></p>
                <p><strong>Kualitas:</strong> <?= $teacher['quality']; ?></p>
                <p><strong>Status:</strong> <?= ucfirst($teacher['status']); ?></p>
                <p><strong>Tanggal Bergabung:</strong> <?= date('d-m-Y', strtotime($teacher['hire_date'])); ?></p>
            </div>
        </div>
        <div class="profile-card">
            <div>
                <h2>INTRODUCTION</h2>
                <p><?= $teacher['introduction']; ?></p>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 EducAchieve. All rights reserved.</p>
    </footer>
</body>
</html>