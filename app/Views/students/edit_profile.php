<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - EducAchieve | Daftarkan diri Anda untuk bergabung ke dunia pembelajaran yang mencapai</title>
    <link rel="stylesheet" href="<?= base_url('css/register.css'); ?>">
    <script src="<?= base_url('js/register.js'); ?>" defer></script>
    <link rel="icon" type="image/png" href="<?= base_url('uploads/images/logo.png'); ?>">
</head>
<body>
    <header>
        <h1>Edit Profile</h1>
    </header>
    <div class="container">
        <section>
            <form action="/students/profile/update/<?= session()->get('students_id'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-column">
                    <label for="first_name"><b>Nama Depan</b></label>
                    <input type="text" name="first_name" value="<?= esc($studentsData['first_name']); ?>" placeholder="Nama Depan" required>
                </div>

                <div class="form-column">
                    <label for="last_name"><b>Nama Belakang</b></label>
                    <input type="text" name="last_name" value="<?= esc($studentsData['last_name']); ?>" placeholder="Nama Belakang">
                </div>

                <div class="form-column">
                    <label for="phone_number"><b>Nomor Telepon</b></label>
                    <input type="text" name="phone_number" value="<?= esc($studentsData['phone_number']); ?>" placeholder="Nomor Handphone" required>
                </div>

                <div class="form-column">
                    <label for="tpt_lhr"><b>Tempat Lahir</b></label>
                    <input type="text" name="tpt_lhr" value="<?= esc($studentsData['tpt_lhr']); ?>" placeholder="Tempat Lahir" required>
                </div>

                <div class="form-column">
                    <label for="tgl_lhr"><b>Tanggal Lahir</b></label>
                    <input type="date" name="tgl_lhr" value="<?= esc($studentsData['tgl_lhr']); ?>" placeholder="Tanggal Lahir" required>
                </div>

                <div class="form-column">
                    <label for="gender"><b>Jenis Kelamin</b></label>
                    <select name="gender" required>
                        <option value="L" <?= $studentsData['gender'] == 'L' ? 'selected' : ''; ?>>Laki-laki</option>
                        <option value="P" <?= $studentsData['gender'] == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                </div>

                <div class="form-column">
                    <label for="address"><b>Alamat</b></label>
                    <input type="text" name="address" value="<?= esc($studentsData['address']); ?>" placeholder="Alamat" required>
                </div>

                <button type="submit">Update</button>
                <button type="button" onclick="window.location.href='/students/profile/<?= session()->get('students_id'); ?>'">Cancel</button>
            </form>
        </section>
    </div>
</body>
</html>