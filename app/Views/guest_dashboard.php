<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Beranda - EducAchieve</title>
    <link rel="stylesheet" href="<?= base_url('uploads/css/guest_dashboard.css'); ?>">
    <script src="<?= base_url('uploads/js/guest_dashboard.js'); ?>" defer></script>
    <link rel="icon" type="image/png" href="<?= base_url('uploads/images/logo.png'); ?>">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #5c5cff;
        }

        header {
            background-color: #87CEFA;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            display: flex;
            align-items: center;
        }

        .menu-left, .menu-right {
            display: flex;
            gap: 15px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .menu-left li a,
        .menu-right li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 4px;
        }

        .menu-right li a.register-btn {
            background-color: #87CEFA;
            color: white;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
            text-decoration: none;
        }

        .menu-right li a.register-btn:hover {
            background-color: white;
            color: #87CEFA;
        }

        .menu-right li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .menu-left li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .container {
            display: flex;
            gap: 20px;
            padding: 20px;
        }

        .sidebar {
            background-color: #e6ecff;
            padding: 20px;
            border-radius: 8px;
            width: 250px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar li a {
            text-decoration: none;
            color: #0056b3;
            font-weight: bold;
            display: block;
            padding: 10px;
            background-color: #ffffff;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .sidebar li a:hover {
            background-color: #d8e3ff;
        }

        .content {
            flex: 1;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .content h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .faq-item {
            border-top: 1px solid #ddd;
            padding: 15px 0;
        }

        .faq-item:first-of-type {
            border-top: none;
        }

        .faq-item h3 {
            font-size: 18px;
            margin: 0;
            color: #333;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .faq-item h3:hover {
            color: #0056b3;
        }

        .faq-item p {
            display: none;
            margin-top: 10px;
            color: #666;
        }

        .faq-item.active p {
            display: block;
        }

        footer {
            text-align: center;
            padding: 15px 0;
            background-color: #4CAF50;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .about-us {
            position: relative;
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 80px 20px;
        }

        .about-us .overlay {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 40px;
            border-radius: 8px;
        }

        .about-us h2 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .about-us p {
            font-size: 18px;
        }

        .teachers-info {
            padding: 60px 20px;
            background-color: #f9f9f9;
            text-align: center;
        }

        .teachers-info h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .teachers-info p {
            font-size: 16px;
        }

        .teachers-profile {
            padding: 60px 20px;
            background-color: #fff;
            text-align: center;
        }

        .teachers-profile h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .profile-slider {
            display: flex;
            overflow-x: auto;
            gap: 20px;
        }

        .profile-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 250px;
            text-align: center;
        }

        .profile-card img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .profile-card h3 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .profile-card p {
            font-size: 14px;
            color: #666;
        }

        .offers {
            padding: 60px 20px;
            background-color: #e6ecff;
            text-align: center;
        }

        .offers h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .offers p {
            font-size: 16px;
        }

        .advantages-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            text-align: left;
        }

        .advantages-title {
            font-size: 250px;
            text-align: right;
            flex: 1;
        }

        .advantages-list {
            flex: 2;
            padding-left: 20px;
            list-style: none;
        }

        .advantages h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .advantages ul {
            list-style: none;
            padding: 0;
            font-size: 16px;
        }

        .advantages ul li {
            margin-bottom: 10px;
        }

        .advantages-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            text-align: center;
        }

        .advantage-item img {
            width: 500px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .advantage-item p {
            margin-top: 10px;
            font-size: 16px;
            color: #333;
            font-weight: bold;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        footer {
            background-color: #000;
            color: white; text-align: center;
            padding: 20px 0; position: relative;
            bottom: 0; width: 100%;
            margin-top: auto;
        }
    </style>
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

    <section class="about-us" style="background-image: url(<?= base_url('uploads/images/kelas.png'); ?>);">
        <div class="overlay">
            <h2>About Us</h2>
            <p>EducAchieve adalah platform bimbingan belajar online yang menghubungkan murid dan guru dengan mudah dan efektif, mirip dengan konsep Ruang Guru. Website ini menyediakan akses ke materi pembelajaran, bimbingan langsung, dan fitur pencapaian yang memotivasi pengguna untuk terus berkembang.</p>
        </div>
    </section>

    <section class="teachers-info" style="background-color: #ffffff;">
        <div class="container">
            <h2>Dosen dan Guru</h2>
            <p>EducAchieve menawarkan pengalaman belajar yang dipandu oleh dosen berpengalaman dan guru profesional yang berdedikasi penuh untuk meningkatkan kualitas pendidikan.</p>
        </div>
    </section>

    <section class="teachers-profile" style="background-color: #000000; color: white;">
        <h2>Profil Dosen dan Guru</h2>
        <div class="container">
            <h1>Selamat datang, <?= $salutation ?> <?= $first_name ?>!</h1>
            <div class="profile-photo">
                <img src="<?= base_url('uploads/teachers/' . $photo_profile); ?>" alt="Foto Profil">
            </div>

            <?php if (!empty($other_photos)): ?>
                <div class="additional-photos">
                    <h2>Foto Lainnya</h2>
                    <div class="photos-grid">
                        <?php foreach ($other_photos as $photo): ?>
                            <div class="photo-item">
                                <img src="<?= base_url('uploads/images/' . $photo); ?>" alt="Foto Lain">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="offers" style="background-color: #e6ecff;">
        <div class="container">
            <h2>Apa yang Kami Tawarkan</h2>
            <p>Kami menawarkan berbagai program pendidikan, termasuk kursus online, workshop, dan pelatihan keterampilan yang dapat membantu siswa mengembangkan potensi mereka.</p>
        </div>
    </section>

    <section class="advantages" style="background-color: #ffffff;">
        <div class="container">
            <div class="advantages-grid">
                <div class="advantage-item">
                    <img src="<?= base_url('uploads/images/1.jpeg'); ?>" alt="Pendekatan Pengajaran Inovatif">
                    <p>Pendekatan Pengajaran Inovatif</p>
                </div>
                <div class="advantage-item">
                    <img src="<?= base_url('uploads/images/2.jpg'); ?>" alt="Tim Pengajar yang Berpengalaman">
                    <p>Tim Pengajar yang Berpengalaman</p>
                </div>
                <div class="advantage-item">
                    <img src="<?= base_url('uploads/images/3.png'); ?>" alt="Fasilitas Pembelajaran Terbaik">
                    <p>Fasilitas Pembelajaran Terbaik</p>
                </div>
                <div class="advantage-item">
                    <img src="<?= base_url('uploads/images/4.jpg'); ?>" alt="Program Berbasis Teknologi">
                    <p>Program Berbasis Teknologi</p>
                </div>
            </div>
            <h2 class="advantages-title">Keunggulan Kami</h2>
        </div>
    </section>

    <footer>
        <div class="container">
            <h2>CONTACT PERSON</h2>
            <p>Email: educachieve@mail.business.com | Phone: +62 857-7432-5611 </p>
            <p>&copy; 2024 EducAchieve. All rights reserved.</p>
        </div>
    </footer>

    <script src="../../uploads/js/guest-dashboard.js"></script>
</body>
</html>