<?php
session_start();

// Tambahkan header anti-cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// ✅ Jika user ingin memaksa kembali ke halaman login (tanpa harus logout manual)
if (isset($_GET['login']) && $_GET['login'] == 'true') {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

// ✅ Jika user sudah login, arahkan ke halaman sesuai peran
if (isset($_SESSION['username'])) {
    $username_trim = strtoupper(trim($_SESSION['username']));

    switch ($username_trim) {
        case 'ADMIN':
            header("Location: admin/rekap_all.php");
            break;
        case 'J95602':
            header("Location: teknisi/teknisi_bjb.php");
            break;
        case 'J95603':
            header("Location: teknisi/teknisi_btl.php");
            break;
        case 'J95604':
            header("Location: teknisi/teknisi_bjm.php");
            break;
        case 'J95605':
            header("Location: teknisi/teknisi_mth.php");
            break;
        case 'J95606':
            header("Location: teknisi/teknisi_spt.php");
            break;
        case 'J95607':
            header("Location: teknisi/teknisi_plk.php");
            break;
        case 'J95608':
            header("Location: teknisi/teknisi_pkb.php");
            break;
        case 'J95609':
            header("Location: teknisi/teknisi_tjg.php");
            break;
        default:
            header("Location: index.php?error=role_not_found");
            break;
    }
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome 5 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(180deg, rgba(52, 58, 64, 1), rgba(33, 37, 41, 1));
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 15px;
    }

    .login-card {
      background: #2a2e33;
      border: 1px solid #3d4449;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.3);
      padding: 40px;
      width: 100%;
      max-width: 350px;
      animation: fadeInUp 0.6s ease;
    }

    .login-card h3 {
      color: #fafafa;
      font-weight: bold;
      margin-bottom: 25px;
      text-align: center;
      font-size: 28px;
    }

    .login-card h3 i {
      margin-right: 8px;
    }

    .form-group {
      margin-bottom: 20px;
      position: relative;
    }

    .input-group-prepend {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #999;
      z-index: 10;
      pointer-events: none;
    }

    .form-control {
      background: #212529;
      border: 1px solid #3d4449;
      color: #ffffff;
      border-radius: 30px;
      padding: 12px 45px 12px 45px; /* kanan & kiri simetris */
      width: 100%;
      font-size: 15px;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      background: #2a2e33;
      border-color: #555;
      box-shadow: 0 0 10px rgba(255,255,255,0.1);
      color: #ffffff;
      outline: none;
    }

    .form-control::placeholder {
      color: #666;
    }

    .btn-login {
      border-radius: 30px;
      background: #495057;
      color: #fff;
      font-weight: bold;
      transition: all 0.3s ease;
      padding: 12px 20px;
      border: none;
      width: 100%;
      font-size: 16px;
      margin-top: 10px;
    }

    .btn-login:hover {
      transform: translateY(-2px);
      background: #5a6268;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    .toggle-password {
      position: absolute;
      right: 18px;
      top: 50%;
      transform: translateY(-50%);
      color: #999;
      cursor: pointer;
      z-index: 20;
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 640px) {
      .login-card { padding: 25px 30px; border-radius: 18px; }
      .login-card h3 { font-size: 28px; margin-bottom: 20px; }
      .form-control { padding: 11px 45px 11px 42px; font-size: 14px; }
      .btn-login { font-size: 15px; padding: 11px 18px; }
    }
  </style>
</head>
<body>
  <div class="login-card">
    <h3><i class="fas fa-user-circle"></i> Login</h3>

    <form action="function_all/cek_login.php" method="post">
      <!-- Username -->
      <div class="form-group">
        <div class="input-group-prepend">
          <i class="fas fa-user"></i>
        </div>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
      </div>

      <!-- Password -->
      <div class="form-group">
        <div class="input-group-prepend">
          <i class="fas fa-lock"></i>
        </div>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <span class="toggle-password" onclick="togglePassword()">
          <i class="fas fa-eye" id="eyeIcon"></i>
        </span>
      </div>

      <button type="submit" class="btn btn-login">
        <i class="fas fa-sign-in-alt"></i> Login
      </button>
    </form>
  </div>

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const eyeIcon = document.getElementById('eyeIcon');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
      }
    }
  </script>
</body>
</html>

