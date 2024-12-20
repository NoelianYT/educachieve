<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Beranda - EducAchieve</title>
    <link rel="stylesheet" href="<?= base_url('css/dashboard.css'); ?>">
    <script src="<?= base_url('uploads/js/guest_dashboard.js'); ?>" defer></script>
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

    <section class="about-us" style="background-image: url(<?= base_url('uploads/images/kelas.png'); ?>);">
        <div class="overlay">
            <h2>About Us</h2>
            <p>EducAchieve adalah platform bimbingan belajar online yang menghubungkan murid dan guru dengan mudah dan efektif, mirip dengan konsep Ruang Guru. Website ini menyediakan akses ke materi pembelajaran, bimbingan langsung, dan fitur pencapaian yang memotivasi pengguna untuk terus berkembang.</p>
        </div>
    </section>

    <section class="teachers-info" style="background-color: #ffffff;">
        <div class="container">
            <h2 style="text-align: center;">Dosen dan Guru</h2>
            <p>EducAchieve bekerja sama dengan pengajar-pengajar terbaik yang memiliki keahlian di berbagai bidang, memberikan pengalaman belajar yang menyenangkan dan penuh inspirasi. Kami memastikan setiap sesi pembelajaran dapat membantu siswa memahami materi dengan cara yang praktis dan mudah diterima.</p>
        </div>
    </section>

    <section class="teachers-profile" style="background-color: black;">
        <h2 style="color: #ffffff;">Profil Dosen dan Guru</h2>
        <div class="container">
            <div class="profile-slider">
                <?php if (!empty($teachers)): ?>
                    <?php foreach ($teachers as $teacher): ?>
                        <?php if (isset($teacher['teacher_id'])): ?>
                            <div class="profile-card">
                                <a href="<?= site_url('/guest/profile/' . $teacher['teacher_id']); ?>" class="profile-link">
                                    <img src="<?= base_url('uploads/teachers/' . $teacher['profile_picture']); ?>" alt="Foto Profil">
                                </a>
                                <h3><?= ($teacher['gender'] === 'L' ? 'Pak ' : 'Bu ') . $teacher['first_name']; ?></h3>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Tidak ada data dosen.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="offers" style="background-color: #e6ecff;">
        <div class="container">
            <h2 style="text-align: center;">Apa yang Kami Tawarkan?</h2>
            <p>Di EducAchieve, kami menyediakan berbagai layanan edukasi yang dirancang untuk mengasah kemampuan siswa, termasuk program pembelajaran daring, pelatihan keterampilan, dan seminar yang diselenggarakan oleh para ahli di bidangnya. Kami fokus untuk memberikan solusi pendidikan yang relevan dengan kebutuhan zaman.</p>
        </div>
    </section>
    
    <section class="advantages" style="background-color: #ffffff;">
        <div class="container">
            <h2 class="advantages-title">Keunggulan Kami</h2>
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