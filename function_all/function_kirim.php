<?php 
require_once('../Connections/koneksi.php'); 

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  global $koneksi;
  
  // Magic quotes sudah deprecated sejak PHP 5.4
  $theValue = stripslashes($theValue);
  
  // Gunakan mysqli_real_escape_string
  $theValue = mysqli_real_escape_string($koneksi, $theValue);
  
  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}
$username = $_SESSION['username'];


// =======================
// MAPPING USER -> TEKNISI
// =======================
$userTeknisiMap = [
    'J95602' => 'Adriann',
    'J95603' => 'Muhammad Zaqi Habibie',

    'J95604' => 'Muhammad Nahyyij Husaibi',
    'J95610' => 'Rizky',
    'J95611' => 'Muhammad Ikhsan',
    'J95613' => 'Said Humaidi',
    'J95614' => 'Ikhwan Maulana',

    'J95605' => 'Prahara Bayu Kusuma',
    'J95606' => 'Sulis Setiawan',
    'J95607' => 'M.Hafiz Anshari',
    'J95608' => 'Yusril Mahendra',
    'J95609' => 'Aidi Ramadhani',
    'admin'  => 'ALL'
];

// =======================
// MAPPING USER -> TABEL SPAREPART
// =======================
$userSparepartTable = [
    'J95602' => 'sp_bjb',
    'J95603' => 'sp_btl',

    'J95604' => 'sp_bjm',
    'J95610' => 'sp_bjm',
    'J95611' => 'sp_bjm',
    'J95613' => 'sp_bjm',
    'J95614' => 'sp_bjm',

    'J95605' => 'sp_mth',
    'J95606' => 'sp_spt',
    'J95607' => 'sp_plk',
    'J95608' => 'sp_pkb',
    'J95609' => 'sp_tjg'
];


// Proses INSERT
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf(
    "INSERT INTO kirim_part (no_pengiriman, username, part_number, nama_sparepart, barcode, qty, id_atm, nama_lokasi, detail_kerusakan, tgl_pengiriman, status) 
     VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
    GetSQLValueString($_POST['no_pengiriman'], "text"),
    GetSQLValueString($_POST['username'], "text"),
    GetSQLValueString($_POST['part_number'], "text"),
    GetSQLValueString($_POST['nama_sparepart'], "text"),
    GetSQLValueString($_POST['barcode'], "text"),
    GetSQLValueString($_POST['qty'], "int"),
    GetSQLValueString($_POST['id_atm'], "text"),
    GetSQLValueString($_POST['nama_lokasi'], "text"),
    GetSQLValueString($_POST['detail_kerusakan'], "text"),
    GetSQLValueString($_POST['tgl_pengiriman'], "date"),
    GetSQLValueString($_POST['status'], "text")
  );

  $Result1 = mysqli_query($koneksi, $insertSQL);
  
  if (!$Result1) {
      die(mysqli_error($koneksi));
  }

    // 🔧 Hapus data sparepart dari tabel setelah berhasil dikirim
  $bc = mysqli_real_escape_string($koneksi, $_POST['barcode']);

  // Tentukan tabel sparepart berdasarkan username yang login
  if (isset($userSparepartTable[$username])) {
      $tableName = $userSparepartTable[$username];
      
      // Hapus data berdasarkan barcode (unik)
      $deleteSQL = "DELETE FROM $tableName WHERE barcode = '$bc'";
      mysqli_query($koneksi, $deleteSQL);
      
  } elseif ($username == 'admin') {
      // Jika admin, hapus dari semua tabel sparepart
      foreach ($userSparepartTable as $table) {
          $deleteSQL = "DELETE FROM $table WHERE barcode = '$bc'";
          mysqli_query($koneksi, $deleteSQL);
      }
  }

  // Redirect
  if ($username == "admin") {
      header("Location: ../admin/pemakaian_sp.php");
  } elseif (in_array($username, array_keys($userTeknisiMap))) {
      header("Location: ../teknisi/kirim_teknisi.php");
  } 
  exit();
}

// Proses UPDATE
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE kirim_part SET 
    username=%s,
    part_number=%s,
    nama_sparepart=%s, 
    barcode=%s,
    qty=%s,
    id_atm=%s,
    nama_lokasi=%s,
    detail_kerusakan=%s,
    tgl_pengiriman=%s,
    status=%s 
    WHERE no_pengiriman=%s",
    GetSQLValueString($_POST['username'], "text"),
    GetSQLValueString($_POST['part_number'], "text"),
    GetSQLValueString($_POST['nama_sparepart'], "text"),
    GetSQLValueString($_POST['barcode'], "text"),
    GetSQLValueString($_POST['qty'], "int"),
    GetSQLValueString($_POST['id_atm'], "text"),
    GetSQLValueString($_POST['nama_lokasi'], "text"),
    GetSQLValueString($_POST['detail_kerusakan'], "text"),
    GetSQLValueString($_POST['tgl_pengiriman'], "date"),
    GetSQLValueString($_POST['status'], "text"),
    GetSQLValueString($_POST['no_pengiriman'], "text")
  );

  $Result1 = mysqli_query($koneksi, $updateSQL);
  
  if (!$Result1) {
      die(mysqli_error($koneksi));
  }

  echo "<script>window.location='../admin/kirim_part.php';</script>";
  exit();
}

// Proses DELETE berdasarkan parameter GET
if (isset($_GET['delete']) && $_GET['delete'] == 1 && isset($_GET['from'])) {
    $barcode = mysqli_real_escape_string($koneksi, $_GET['barcode']);
    $fromTable = $_GET['from'];

    // Hapus sesuai asal tabel
    $allowedTables = array('sp_bjb', 'sp_btl', 'sp_bjm', 'sp_mth', 'sp_spt', 'sp_plk', 'sp_pkb', 'sp_tjg');
    
    if (in_array($fromTable, $allowedTables)) {
        $deleteSQL = "DELETE FROM $fromTable WHERE barcode = '$barcode'";
        $resultDelete = mysqli_query($koneksi, $deleteSQL);
        
        if (!$resultDelete) {
            die(mysqli_error($koneksi));
        }
    }
}

// =============================
// PROSES KIRIM PART ANTAR KOTA
// =============================
if (isset($_GET['from']) && isset($_GET['to']) && isset($_GET['barcode'])) {
    $fromTable = mysqli_real_escape_string($koneksi, $_GET['from']);
    $toTable   = mysqli_real_escape_string($koneksi, $_GET['to']);

    // Data sparepart yang dikirim via GET
    $part_number   = mysqli_real_escape_string($koneksi, $_GET['part_number']);
    $nama_sparepart = mysqli_real_escape_string($koneksi, $_GET['nama_sparepart']);
    $jenis_sparepart = mysqli_real_escape_string($koneksi, $_GET['jenis_sparepart']);
    $atm           = mysqli_real_escape_string($koneksi, $_GET['atm']);
    $barcode       = mysqli_real_escape_string($koneksi, $_GET['barcode']);
    $status        = mysqli_real_escape_string($koneksi, $_GET['status']);

    // Daftar tabel yang diizinkan
    $allowedTables = array('sp_bjm', 'sp_bjb', 'sp_btl', 'sp_mth', 'sp_spt', 'sp_plk', 'sp_pkb', 'sp_tjg');

    // Validasi tabel asal dan tujuan
    if (!in_array($fromTable, $allowedTables) || !in_array($toTable, $allowedTables)) {
        die("❌ Nama tabel asal atau tujuan tidak valid.");
    }

    // Pastikan data ada di tabel asal
    $checkQuery = "SELECT * FROM $fromTable WHERE barcode = '$barcode' LIMIT 1";
    $checkResult = mysqli_query($koneksi, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        // Masukkan ke tabel tujuan
        $insertQuery = "INSERT INTO $toTable (part_number, nama_sparepart, jenis_sparepart, atm, barcode, status)
                        VALUES ('$part_number', '$nama_sparepart', '$jenis_sparepart', '$atm', '$barcode', '$status')";
        $insertResult = mysqli_query($koneksi, $insertQuery);

        if ($insertResult) {
            // Hapus dari tabel asal
            $deleteQuery = "DELETE FROM $fromTable WHERE barcode = '$barcode'";
            mysqli_query($koneksi, $deleteQuery);

            header("Location: ../teknisi/workshop.php?success=kirim&to=$toTable");
            exit();
        } else {
            die("❌ Gagal insert ke tabel tujuan ($toTable): " . mysqli_error($koneksi));
        }
    } else {
        die("❌ Data dengan barcode $barcode tidak ditemukan di tabel asal ($fromTable).");
    }
}

// Pagination
$maxRows_Recordset1 = 1000;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

// Filter data berdasarkan user yang login
if ($username == 'admin') {
    // Admin melihat semua data
    $query_Recordset1 = "SELECT * FROM kirim_part ORDER BY no_pengiriman DESC";
} else {
    // Teknisi hanya melihat data mereka sendiri
    $usernameEscaped = mysqli_real_escape_string($koneksi, $username);
    $query_Recordset1 = "SELECT * FROM kirim_part WHERE username = '$usernameEscaped' ORDER BY no_pengiriman DESC";
}

$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysqli_query($koneksi, $query_limit_Recordset1);

if (!$Recordset1) {
    die(mysqli_error($koneksi));
}

$row_Recordset1 = mysqli_fetch_assoc($Recordset1);

// Generate No. Pengiriman Otomatis
$query_last = "SELECT no_pengiriman FROM kirim_part ORDER BY no_pengiriman DESC LIMIT 1";
$result_last = mysqli_query($koneksi, $query_last);

if (!$result_last) {
    die(mysqli_error($koneksi));
}

$row_last = mysqli_fetch_assoc($result_last);

if ($row_last && preg_match('/BMS(\d+)/', $row_last['no_pengiriman'], $matches)) {
  $last_number = (int)$matches[1];
  $next_number = $last_number + 1;
} else {
  $next_number = 1;
}
// Format hasil akhir dengan awalan BMS dan 3 digit angka
$no_pengiriman = 'BMS' . str_pad($next_number, 3, '0', STR_PAD_LEFT);

// Total rows untuk pagination
if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysqli_query($koneksi, $query_Recordset1);
  $totalRows_Recordset1 = mysqli_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>