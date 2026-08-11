<?php
session_start();
// Hapus session lama biar gak nyangkut
session_unset();
session_destroy();
session_start();

require_once('../Connections/koneksi.php'); // Pastikan file ini sudah pakai mysqli_connect

// Cek input
if (empty($_POST['username']) || empty($_POST['password'])) {
    die("Error: Username / password belum diisi.");
}

$username = $_POST['username'];
$password = $_POST['password'];

// Gunakan real_escape_string dari mysqli
$username = mysqli_real_escape_string($koneksi, $username);
$password = mysqli_real_escape_string($koneksi, $password);

// Hash ke MD5 biar sama dengan yang di tabel (disarankan ganti ke password_hash di masa depan)
$password_md5 = md5($password);

// Query user
$sql = "SELECT * FROM user WHERE username='$username' AND password='$password_md5'";
$result = mysqli_query($koneksi, $sql);

if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi) . "<br>SQL: " . $sql);
}

if (mysqli_num_rows($result) > 0) {
    $_SESSION['username'] = $username;

    // Arahkan berdasarkan username
    $username_trim = strtoupper(trim($username));
    switch ($username_trim) {
        case 'ADMIN':
            header("Location: ../admin/rekap_all.php");
            break;

        case 'J95602':
            header("Location: ../teknisi/teknisi_bjb.php");
            break;

        case 'J95603':
            header("Location: ../teknisi/teknisi_btl.php");
            break;

        // ✅ Tiga username untuk teknisi BJM
        case 'J95604':
        case 'J95610':
        case 'J95611':
        case 'J95613':
        case 'J95614':
            header("Location: ../teknisi/teknisi_bjm.php");
            break;

        case 'J95605':
            header("Location: ../teknisi/teknisi_mth.php");
            break;

        case 'J95606':
            header("Location: ../teknisi/teknisi_spt.php");
            break;

        case 'J95607':
            header("Location: ../teknisi/teknisi_plk.php");
            break;

        case 'J95608':
            header("Location: ../teknisi/teknisi_pkb.php");
            break;

        case 'J95609':
            header("Location: ../teknisi/teknisi_tjg.php");
            break;
            
        case 'J95612':
            header("Location: ../teknisi/workshop.php");
            break;

        default:
            header("Location: ../index.php?error=role_not_found");
            break;
    }

    exit();
} else {
    header("Location: ../index.php?error=1");
    exit();
}
?>
