<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - EducAchieve | Daftarkan diri Anda untuk bergabung ke dunia pembelajaran yang mencapai</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/guest-register.css'); ?>">
    <script src="<?= base_url('assets/js/guest-register.js'); ?>" defer></script>
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/logo.png'); ?>">
    <style>
        body{
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
            color: #0056b3;
            margin: 0;
            padding: 0;
            background-color: #cce5ff;
        }

        .container{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        header{
            margin-bottom: 20px;
        }

        header h1{
            color: #0056b3;
        }

        section{
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
            width: 100%;
            max-width: 800px;
        }

        label{
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        select,
        input[type="file"]{
            padding: 10px;
            margin-bottom: 15px;
            font-size: 14px;
            width: 100%;
            border: 2px solid #0056b3;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-row{
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .form-column{
            flex: 1;
            padding: 10px;
        }

        button{
            padding: 10px 20px;
            font-size: 16px;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover{
            background-color: #003d80;
        }

        .hidden{
            display: none;
        }

        @media(max-width: 768px){
            .form-row{
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Register</h1>
    </header>
    <div class="container">
        <form action="/register/submit" method="post" enctype="multipart/form-data">
            <b>Username</b>
            <input type="text" name="username" placeholder="Username" required>
            <b>Email</b>
            <input type="email" name="email" placeholder="Email" required>
            <b>Password</b>
            <input type="password" name="password" placeholder="Password" required>
            <label for="photo_profile">Foto Identitas</label>
            <input type="file" name="photo_profile" id="photo_profile" accept="image/*" required>
            <b>Role</b>
            <select name="level" id="role" required onchange="showAdditionalFields()">
                <option value="">Pilih Role</option>
                <option value="1">Mahasiswa</option>
                <option value="2">Dosen</option>
            </select>

            <div id="studentFields" class="hidden">
                <b>Nama Depan</b>
                <input type="text" name="first_name" placeholder="Nama Depan">
                <b>Nama Belakang</b>
                <input type="text" name="last_name" placeholder="Nama Belakang (Opsional)">
                <b>Nomor Telepon</b>
                <input type="text" name="phone_number" placeholder="Nomor Handphone">
                <b>Tempat Lahir</b>
                <input type="text" name="tpt_lhr" placeholder="Tempat Lahir">
                <b>Tanggal lahir</b>
                <input type="date" name="tgl_lhr" placeholder="Tanggal Lahir">
                <b>Jenis Kelamin</b>
                <select name="gender">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <b>Alamat</b>
                <input type="text" name="address" placeholder="Alamat">
            </div>

            <div id="teacherFields" class="hidden">
                <b>Nama Depan</b>
                <input type="text" name="first_name" placeholder="Nama Depan">
                <b>Nama Belakang</b>
                <input type="text" name="last_name" placeholder="Nama Belakang">
                <b>Nomor Telepon</b>
                <input type="text" name="phone_number" placeholder="Nomor Handphone">
                <b>Tempat Lahir</b>
                <input type="text" name="tpt_lhr" placeholder="Tempat Lahir">
                <b>Tanggal Lahir</b>
                <input type="date" name="tgl_lhr" placeholder="Tanggal Lahir">
                <b>Jenis Kelamin</b>
                <select name="gender">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <b>Alamat</b>
                <input type="text" name="address" placeholder="Alamat">
                <b>Password</b>
            </div>

            <button type="submit">Daftar</button>
        </form>
        <b>Sudah punya akun? <a href="<?= site_url('guest-login')?>">Login di sini</a></b>
    </div>

    <script>
        function showAdditionalFields(){
            var role = document.getElementById("role").value;
            var studentFields = document.getElementById("studentFields");
            var teacherFields = document.getElementById("teacherFields");

            studentFields.classList.add("hidden");
            teacherFields.classList.add("hidden");

            if(role == "1"){
                studentFields.classList.remove("hidden");
            }else if(role == "2"){
                teacherFields.classList.remove("hidden");
            }
        }
    </script>
</body>
</html>