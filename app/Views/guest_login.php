<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | EducAchieve</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/guest-login.css'); ?>">
    <script src="<?= base_url('assets/js/guest-login.js'); ?>" defer></script>
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/logo.png'); ?>">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f0f8ff;
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }
        .login-container {
            width: 320px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #333333;
        }
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .input-group label {
            display: block;
            font-size: 14px;
            color: #333333;
            font-weight: 600;
        }
        .input-group input[type="text"],
        .input-group input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: #4a90e2;
            border: none;
            border-radius: 4px;
            color: #ffffff;
            font-weight: 600;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .login-btn:hover {
            background-color: #357ABD;
        }
        .register-link {
            display: block;
            margin-top: 15px;
            font-size: 14px;
            color: #4a90e2;
            text-decoration: none;
        }
        .register-link:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="<?= base_url('login/submit'); ?>" method="post">
            <?php if(session()->getFlashdata('error')) { ?>
                <div class="alert alert-danger">
                    <?php echo session()->getFlashdata('error')?>
                </div>
            <?php } ?>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username" 
                    value="<?= esc(session()->getFlashdata('username') ?? '') ?>" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Passsword" required>
            </div>
            <div class="input-group">
                <label>
                    <input type="checkbox" name="remember_me" value="1">
                    Remember me
                </label>
            </div>
            <button type="submit" name="login" class="login-btn" value="LOGIN">Login</button>
        </form>
        <a href="<?= site_url('guest-register')?>" class="register-link">Belum punya akun? Daftar di sini</a>
    </div>
</body>
</html>