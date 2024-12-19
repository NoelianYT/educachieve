<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Dosen/Guru - EducAchieve</title>
    <link rel="stylesheet" href="<?= base_url('uploads/css/guest-teachers.css'); ?>">
    <script src="<?= base_url('uploads/js/guest-teachers.js'); ?>" defer></script>
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

        .teachers-info {
            padding: 60px 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .teachers-info h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 16px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #87CEFA;
            color: #fff;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img.profile-pic {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        footer {
            margin-top: 20px;
            padding: 15px 0;
            background-color: #4CAF50;
            color: white;
            width: 100%;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }
    </style>
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
                <li><a href="/guest-login">Sign In</a></li>
                <li><a href="/guest-register">Register</a></li>
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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($teachers as $teacher) : ?>
                        <tr>
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