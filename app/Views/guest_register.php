<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - EducAchieve | Daftarkan diri Anda untuk bergabung ke dunia pembelajaran yang mencapai</title>
    <link rel="stylesheet" href="<?= base_url('css/register.css'); ?>">
    <script src="<?= base_url('js/register.js'); ?>" defer></script>
    <link rel="icon" type="image/png" href="<?= base_url('uploads/images/logo.png'); ?>">
</head>
<body>
    <div class="container">
        <section>
            <h1>Register</h1>
            <form action="/register/submit" method="post" enctype="multipart/form-data">
                <div class="form-column">
                    <label for="username"><b>Username</b></label>
                    <input type="text" name="username" placeholder="Username" required>
                </div>

                <div class="form-column">
                    <label for="email"><b>Email</b></label>
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="form-column">
                    <label for="password"><b>Password</b></label>
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <div class="form-column">
                    <label for="confirm_password"><b>Confirm Password</b></label>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                </div>

                <div class="form-column">
                    <label for="photo_profile"><b>Foto Identitas</b></label>
                    <input type="file" name="photo_profile" id="photo_profile" accept="image/*" required>
                </div>

                <div class="form-column">
                    <label for="role"><b>Role</b></label>
                    <select name="level" id="role" required onchange="showAdditionalFields()">
                        <option value="">Pilih Role</option>
                        <option value="1">Students</option>
                        <option value="2">Teachers</option>
                    </select>
                </div>

                <div id="studentFields" class="hidden">
                    <div class="form-column">
                        <label for="first_name"><b>Nama Depan</b></label>
                        <input type="text" name="first_name" placeholder="Nama Depan" required>
                    </div>
                    <div class="form-column">
                        <label for="last_name"><b>Nama Belakang</b></label>
                        <input type="text" name="last_name" placeholder="Nama Belakang (Opsional)">
                    </div>
                    <div class="form-column">
                        <label for="phone_number"><b>Nomor Telepon</b></label>
                        <input type="text" name="phone_number" placeholder="Nomor Handphone" required>
                    </div>
                    <div class="form-column">
                        <label for="tpt_lhr"><b>Tempat Lahir</b></label>
                        <input type="text" name="tpt_lhr" placeholder="Tempat Lahir" required>
                    </div>
                    <div class="form-column">
                        <label for="tgl_lhr"><b>Tanggal Lahir</b></label>
                        <input type="date" name="tgl_lhr" placeholder="Tanggal Lahir" required>
                    </div>
                    <div class="form-column">
                        <label for="gender"><b>Jenis Kelamin</b></label>
                        <select name="gender" required>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-column">
                        <label for="address"><b>Alamat</b></label>
                        <input type="text" name="address" placeholder="Alamat" required>
                    </div>

                    <div class="form-column">
                        <label for="class"><b>Kelas</b></label>
                        <select name="class_id" required>
                            <option value="">Pilih Kelas</option>
                            <?php foreach ($classes as $class): ?>
                                <option value="<?= $class['class_id']; ?>"><?= $class['class_level']; ?><?= $class['class_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div id="teacherFields" class="hidden">
                    <div class="form-column">
                        <label for="first_name"><b>Nama Depan</b></label>
                        <input type="text" name="first_name" placeholder="Nama Depan" required>
                    </div>
                    <div class="form-column">
                        <label for="last_name"><b>Nama Belakang</b></label>
                        <input type="text" name="last_name" placeholder="Nama Belakang (Opsional)">
                    </div>
                    <div class="form-column">
                        <label for="phone_number"><b>Nomor Telepon</b></label>
                        <input type="text" name="phone_number" placeholder="Nomor Handphone" required>
                    </div>
                    <div class="form-column">
                        <label for="tpt_lhr"><b>Tempat Lahir</b></label>
                        <input type="text" name="tpt_lhr" placeholder="Tempat Lahir" required>
                    </div>
                    <div class="form-column">
                        <label for="tgl_lhr"><b>Tanggal Lahir</b></label>
                        <input type="date" name="tgl_lhr" placeholder="Tanggal Lahir" required>
                    </div>
                    <div class="form-column">
                        <label for="gender"><b>Jenis Kelamin</b></label>
                        <select name="gender" required>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-column">
                        <label for="address"><b>Alamat</b></label>
                        <input type="text" name="address" placeholder="Alamat" required>
                    </div>

                    <div class="form-column">
                        <label for="teacher"><b>Pengajar</b></label>
                        <select name="teacher_id" required>
                            <option value="">Pilih Pengajar</option>
                            <?php foreach ($teachers as $teacher): ?>
                                <option value="<?= $teacher['teacher_id']; ?>"><?= $teacher['first_name'] . ' ' . $teacher['last_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <button type="submit">Submit</button>
            </form>

            <div class="form-footer">
                <b>Sudah punya akun? <a href="/guest-login">Login di sini</a></b>
            </div>
        </section>
    </div>
</body>
</html>