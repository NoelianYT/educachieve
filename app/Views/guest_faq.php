<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ | Frequently Asked Questions - EducAchieve</title>
    <link rel="stylesheet" href="<?= base_url('css/faq.css'); ?>">
    <script src="<?= base_url('uploads/js/guest-faq.js'); ?>" defer></script>
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
                <h3>Apa itu EducAchieve? <span>▼</span></h3>
                <p>EducAchieve adalah platform pembelajaran online yang menyediakan akses ke berbagai materi pembelajaran, tutorial, dan layanan belajar bagi siswa dari berbagai jenjang pendidikan.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Siapa saja yang bisa menggunakan EducAchieve? <span>▼</span></h3>
                <p>Platform ini dapat digunakan oleh siswa, mahasiswa, guru, dan dosen yang ingin mengakses materi pendidikan berkualitas tinggi dengan cara yang mudah dan fleksibel.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>EducAchieve bisa diakses dari mana saja? <span>▼</span></h3>
                <p>Guru: Kegiatan guru bisa diakses melalui <a href="https://educachieve.com/login" target="_blank">link ini</a> pada browser di laptop atau ponsel.<br/><br/>
                Murid: Kegiatan murid bisa diakses melalui aplikasi EducAchieve di ponsel dan juga melalui <a href="https://educachieve.com/login" target="_blank">link ini</a> pada browser di laptop atau ponsel.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Berapa biaya untuk gabung di EducAchieve dari EducAchieve?<span>▼</span></h3>
                <p>Layanan EducAchieve dapat diakses oleh guru dan murid secara GRATIS, dan bisa langsung digunakan. Akan tetapi mengenai Les dan Ruang Kelas mungkin terdapat biaya.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Bagaimana cara mendaftar di EducAchieve?<span>▼</span></h3>
                <p>Jika Anda <b>Guru</b>, silakan kunjungi <a href="https://educachieve.com/register" target="_blank">link ini</a> untuk mendaftar.<br/><br/>
                Jika kamu <b>Murid</b>, silakan download Aplikasi EducAchieve dan daftarkan diri atau masuk ke akunmu. Kamu dapat mengakses fitur ruang kelas dengan cara bergabung ke dalam Kelas menggunakan Kode Kelas yang dibagikan oleh gurumu.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Saya sudah mendaftar di aplikasi Ruangguru. Apakah saya bisa menggunakan akun yang sama untuk ruang kelas?<span>▼</span></h3>
                <p>Ya, akun Ruangguru Anda bisa digunakan untuk mengakses ruang kelas. Begitu juga sebaliknya, akun yang Anda gunakan di ruang kelas juga bisa dipakai untuk aplikasi Ruangguru.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apa yang bisa dilakukan di EducAchieve?<span>▼</span></h3>
                <p>
                    Dengan EducAchieve, Bapak/Ibu guru dapat:
                    <br>- Membuat kelas daring bersama siswa,
                    <br>- Membuat dan mengunduh rekap daftar hadir untuk siswa,
                    <br>- Memberi materi yang Bapak/Ibu buat sendiri (baik file ataupun link website),
                    <br>- Memberi tugas yang Bapak/Ibu buat sendiri (pilihan ganda atau esai),
                    <br>- Berdiskusi dengan siswa melalui fitur chat,
                    <br>- Menganalisis nilai dari siswa, dan
                    <br>- Melakukan live teaching.
                </p>
            </article>
        </section>

        <section class="content" id="ruang-kelas" style="display: none;">
            <h2>Pertanyaan Mengenai Ruang Kelas</h2>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apa itu Ruang Achievers? <span>▼</span></h3>
                <p>Ruang Achievers adalah kelas yang memungkinkan siswa dan guru untuk berinteraksi dan belajar secara daring melalui video konferensi, tatap muka secara langsung atau alat kolaborasi lainnya.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apakah saya bisa mengakses materi setelah kelas selesai? <span>▼</span></h3>
                <p>Ya, semua materi yang diberikan di Ruang Achievers bisa diakses kembali oleh siswa melalui halaman arsip atau modul pembelajaran di platform.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apakah saya perlu mendownload aplikasi khusus untuk mengikuti ruang kelas? <span>▼</span></h3>
                <p>Untuk ruang kelas, Anda bisa mengaksesnya melalui browser tanpa perlu mendownload aplikasi, namun tersedia juga aplikasi untuk kenyamanan di perangkat mobile.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Bagaimana cara bergabung ke ruang kelas? <span>▼</span></h3>
                <p>Anda bisa bergabung ke ruang kelas menggunakan kode kelas yang dibagikan oleh guru melalui aplikasi EducAchieve atau platform lainnya.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apakah kelas di ruang kelas virtual sama dengan tatap muka langsung? <span>▼</span></h3>
                <p>Meskipun berbeda, ruang kelas virtual memungkinkan interaksi secara real-time melalui video dan diskusi yang memberikan pengalaman serupa dengan kelas tatap muka.</p>
            </article>
        </section>

        <section class="content" id="guru-dosen" style="display: none;">
            <h2>Pertanyaan Mengenai Guru dan Dosen</h2>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Bagaimana cara guru mendaftar di EducAchieve? <span>▼</span></h3>
                <p>Guru dapat mendaftar melalui halaman register, di mana mereka akan mendapatkan akses ke berbagai fitur mengajar seperti ruang kelas dan alat evaluasi siswa.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apa persyaratan untuk menjadi guru atau dosen di EducAchieve?<span>▼</span></h3>
                <p><i>Educators</i> dapat mendaftar melalui halaman register di situs EducAchieve. Setelah mendaftar, mereka akan mendapatkan akses ke berbagai fitur yang membantu dalam proses mengajar, seperti ruang kelas dan alat evaluasi siswa.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Bagaimana cara guru atau dosen dapat mengatur kelas dan materi pembelajaran di platform?<span>▼</span></h3>
                <p>Setelah mendaftar, guru dapat membuat kelas dan menambahkan materi pembelajaran langsung melalui panel kontrol di dashboard mereka.</p>
            </article>
        </section>

        <section class="content" id="murid-mahasiswa" style="display: none;">
            <h2>Pertanyaan Mengenai Murid dan Mahasiswa</h2>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apa yang harus dilakukan jika saya lupa kata sandi?<span>▼</span></h3>
                <p>Jika Anda lupa kata sandi, Anda bisa menggunakan fitur 'Lupa Kata Sandi' di halaman login untuk mereset kata sandi Anda melalui email yang terdaftar.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apakah murid bisa bertanya kepada guru di platform?<span>▼</span></h3>
                <p>Ya, murid dapat mengajukan pertanyaan kepada guru melalui fitur chat yang tersedia di ruang kelas.</p>
            </article>
            <article class="faq-item" onclick="toggleAnswer(this)">
                <h3>Apakah saya bisa mengakses semua materi pembelajaran?<span>▼</span></h3>
                <p>Ya, semua materi pembelajaran yang diberikan oleh guru dapat diakses oleh murid melalui aplikasi EducAchieve atau platform web.</p>
            </article>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 EducAchieve. All rights reserved.</p>
    </footer>

    <script>
        function showCategory(category) {
            var categories = document.querySelectorAll('.content');
            categories.forEach(function(cat) {
                cat.style.display = 'none';
            });
            var selectedCategory = document.getElementById(category);
            selectedCategory.style.display = 'block';
        }

        function toggleAnswer(faqItem) {
            var answer = faqItem.querySelector('p');
            var icon = faqItem.querySelector('span');
            if (answer.style.display === 'none' || answer.style.display === '') {
                answer.style.display = 'block';
                icon.textContent = '▲';
            } else {
                answer.style.display = 'none';
                icon.textContent = '▼';
            }
        }
    </script>
</body>
</html>