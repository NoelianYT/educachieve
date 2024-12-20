<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | EducAchieve</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image" href="<?= base_url('uploads/images/logo.png')?>">
    <link rel="stylesheet" href="<?= base_url('css/dashboard.css'); ?>">
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
                    <a href="/admin/profile/<?= session()->get('admin_id'); ?>">
                        <button class="profile-button">
                            <img class="profile-pic" src="<?= base_url('uploads/admins/' . esc($users['profile_picture'])); ?>" alt="Foto Profil">
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <div class="content">
        <div class="card">
            <div class="card-header">
                Rata-rata Nilai Kelas
            </div>
            <div class="card-body">
                <table border="1" style="width: 100%; border-collapse: collapse; text-align: center;">
                    <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Rata-rata</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($class_statistics as $stat): ?>
                            <tr>
                                <td><?= esc( $stat['class_level'] . $stat['class_name']) ?></td>
                                <td><?= number_format($stat['average_score'], 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <canvas id="classChart" width="400" height="200"></canvas>
    <script>
        const ctx = document.getElementById('classChart').getContext('2d');
        const chartData = {
            labels: <?= json_encode(array_column($class_statistics, 'class_name')) ?>,
            datasets: [{
                label: 'Average Score',
                data: <?= json_encode(array_column($class_statistics, 'average_score')) ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };
        const classChart = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
            scales: {
                x: {
                    grid: {
                        color: 'rgba(255, 255, 255, 1)', // Ubah warna grid sumbu X menjadi putih
                    },
                    ticks: {
                        color: 'white'
                    }
                },
                y: {
                    grid: {
                        color: 'rgba(255, 255, 255, 1)',
                    },
                    ticks: {
                        color: 'white'
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: 'white'
                    }
                }
            }
            }
        });
    </script>

    <footer>
        <div class="container">
            <h2>Contact Person</h2>
            <p>Email: educachieve@mail.business.com | Phone: +62 857 7432 5611 </p>
            <p>&copy; 2024 EducAchieve. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
