<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ | Frequently Asked Questions - EducAchieve</title>
    <link rel="stylesheet" href="<?= base_url('uploads/css/guest-faq.css'); ?>">
    <script src="<?= base_url('uploads/js/guest-faq.js'); ?>" defer></script>
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
            background-color: #333;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
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

    <main class="container">
        <aside class="sidebar">
            <h2>Kategori</h2>
            <ul>
                <li><a href="javascript:void(0);" onclick="showCategory('info-umum')">Info Umum</a></li>
                <li><a href="javascript:void(0);" onclick="showCategory('ruang-kelas')">Ruang Kelas</a></li>
                <li><a href="javascript:void(0);" onclick="showCategory('guru-dosen')">Guru / Dosen</a></li>
                <li><a href="javascript:void(0);" onclick="showCategory('murid-mahasiswa')">Murid / Mahasiswa</a></li>
            </ul>
        </aside>

        <section class="content" id="info-umum">
            <h2>Pertanyaan yang Sering Diajukan</h2>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apa itu EducAchieve? <span>v</span></h3>
                <p>EducAchieve adalah platform pembelajaran online yang menyediakan akses ke berbagai materi pembelajaran, tutorial, dan layanan belajar bagi siswa dari berbagai jenjang pendidikan.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Siapa saja yang bisa menggunakan EducAchieve? <span>v</span></h3>
                <p>Platform ini dapat digunakan oleh siswa, mahasiswa, guru, dan dosen yang ingin mengakses materi pendidikan berkualitas tinggi dengan cara yang mudah dan fleksibel.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>EducAchieve bisa diakses dari mana saja? <span>v</span></h3>
                <p>Guru: Kegiatan guru bisa diakses melalui <a href="https://educachieve.com/login" target="_blank">link ini</a> pada browser di laptop atau ponsel.<br/><br/>
                Murid: Kegiatan murid bisa diakses melalui aplikasi EducAchieve di ponsel dan juga melalui <a href="https://educachieve.com/login" target="_blank">link ini</a> pada browser di laptop atau ponsel.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Berapa biaya untuk gabung di EducAchieve dari EducAchieve?<span>v</span></h3>
                <p>Layanan EducAchieve dapat diakses oleh guru dan murid secara GRATIS, dan bisa langsung digunakan. Akan tetapi mengenai Les dan Ruang Kelas mungkin terdapat biaya.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Bagaimana cara mendaftar di EducAchieve?<span>v</span></h3>
                <p>Jika Anda <b>Guru</b>, silakan kunjungi <a href="https://educachieve.com/register" target="_blank">link ini</a> untuk mendaftar.<br/><br/>
                Jika kamu <b>Murid</b>, silakan download Aplikasi EducAchieve dan daftarkan diri atau masuk ke akunmu. Kamu dapat mengakses fitur ruang kelas dengan cara bergabung ke dalam Kelas menggunakan Kode Kelas yang dibagikan oleh gurumu.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Saya sudah mendaftar di aplikasi Ruangguru. Apakah saya bisa menggunakan akun yang sama untuk ruang kelas?<span>v</span></h3>
                <p>Ya, akun Ruangguru Anda bisa digunakan untuk mengakses ruang kelas. Begitu juga sebaliknya, akun yang Anda gunakan di ruang kelas juga bisa dipakai untuk aplikasi Ruangguru.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apa yang bisa dilakukan di EducAchieve?<span>v</span></h3>
                <p>
                    Dengan EducAchieve, Bapak/Ibu guru dapat:
                    <ol>
                        <li>Membuat kelas daring bersama siswa,</li>
                        <li>Membuat dan mengunduh rekap daftar hadir untuk siswa,</li>
                        <li>Memberi materi yang Bapak/Ibu buat sendiri (baik file ataupun link website),</li>
                        <li>Memberi tugas yang Bapak/Ibu buat sendiri (pilihan ganda atau esai),</li>
                        <li>Berdiskusi dengan siswa melalui fitur chat,</li>
                        <li>Menganalisis nilai dari siswa, dan</li>
                        <li>Melakukan live teaching.</li>
                    </ol>
                </p>
            </article>
        </section>

        <section class="content" id="ruang-kelas" style="display: none;">
            <h2>Pertanyaan Mengenai Ruang Kelas</h2>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apa itu Ruang Achievers? <span>v</span></h3>
                <p>Ruang Achievers adalah kelas yang memungkinkan siswa dan guru untuk berinteraksi dan belajar secara daring melalui video konferensi, tatap muka secara langsung atau alat kolaborasi lainnya.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apakah saya bisa mengakses materi setelah kelas selesai? <span>v</span></h3>
                <p>Ya, semua materi yang diberikan di Ruang Achievers bisa diakses kembali oleh siswa melalui halaman arsip atau modul pembelajaran di platform.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apakah saya perlu mendownload aplikasi khusus untuk mengikuti ruang kelas? <span>v</span></h3>
                <p>Untuk ruang kelas, Anda bisa mengaksesnya melalui browser tanpa perlu mendownload aplikasi, namun tersedia juga aplikasi untuk kenyamanan di perangkat mobile.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Bagaimana cara bergabung ke ruang kelas? <span>v</span></h3>
                <p>Anda bisa bergabung ke ruang kelas menggunakan kode kelas yang dibagikan oleh guru melalui aplikasi EducAchieve atau platform lainnya.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apakah kelas di ruang kelas virtual sama dengan tatap muka langsung? <span>v</span></h3>
                <p>Meskipun berbeda, ruang kelas virtual memungkinkan interaksi secara real-time melalui video dan diskusi yang memberikan pengalaman serupa dengan kelas tatap muka.</p>
            </article>
        </section>

        <section class="content" id="guru-dosen" style="display: none;">
            <h2>Pertanyaan Mengenai Guru dan Dosen</h2>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Bagaimana cara guru mendaftar di EducAchieve? <span>v</span></h3>
                <p>Guru dapat mendaftar melalui halaman register, di mana mereka akan mendapatkan akses ke berbagai fitur mengajar seperti ruang kelas dan alat evaluasi siswa.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apa persyaratan untuk menjadi guru atau dosen di EducAchieve?<span>v</span></h3>
                <p><i>Educators</i> dapat mendaftar melalui halaman register di situs EducAchieve. Setelah mendaftar, mereka akan mendapatkan akses ke berbagai fitur yang membantu dalam proses mengajar, seperti ruang kelas dan alat evaluasi siswa.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Bagaimana cara guru atau dosen dapat mengatur kelas dan materi pembelajaran di platform?<span>v</span></h3>
                <p>Setelah mendaftar, guru dapat membuat kelas dan menambahkan materi pembelajaran langsung melalui panel kontrol di dashboard mereka.</p>
            </article>
        </section>

        <section class="content" id="murid-mahasiswa" style="display: none;">
            <h2>Pertanyaan Mengenai Murid dan Mahasiswa</h2>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apa yang harus dilakukan jika saya lupa kata sandi?<span>v</span></h3>
                <p>Jika Anda lupa kata sandi, Anda bisa menggunakan fitur 'Lupa Kata Sandi' di halaman login untuk mereset kata sandi Anda melalui email yang terdaftar.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apakah murid bisa bertanya kepada guru di platform?<span>v</span></h3>
                <p>Ya, murid dapat mengajukan pertanyaan kepada guru melalui fitur chat yang tersedia di ruang kelas.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apakah saya bisa mengakses semua materi pembelajaran?<span>v</span></h3>
                <p>Ya, semua materi pembelajaran yang diberikan oleh guru dapat diakses oleh murid melalui aplikasi EducAchieve atau platform web.</p>
            </article>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 EducAchieve. All rights reserved.</p>
    </footer>
</body>
</html>