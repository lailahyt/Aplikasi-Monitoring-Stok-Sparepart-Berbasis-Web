<?php 
require_once('../Connections/koneksi.php'); 

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  global $koneksi;
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

    // INSERT ke tabel pemakaian
    $insertSQL = sprintf("INSERT INTO pemakaian_part 
        (no_tiket, id_atm, nama_lokasi, mesin, nama_teknisi, nama_sparepart, jenis_sparepart, part_number, sn_good, sn_bad, detail_kerusakan)
        VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
        GetSQLValueString($_POST['no_tiket'], "text"),
        GetSQLValueString($_POST['id_atm'], "text"),
        GetSQLValueString($_POST['nama_lokasi'], "text"),
        GetSQLValueString($_POST['mesin'], "text"),
        GetSQLValueString($_POST['nama_teknisi'], "text"),
        GetSQLValueString($_POST['nama_sparepart'], "text"),
        GetSQLValueString($_POST['jenis_sparepart'], "text"),
        GetSQLValueString($_POST['part_number'], "text"),
        GetSQLValueString($_POST['sn_good'], "text"),
        GetSQLValueString($_POST['sn_bad'], "text"),
        GetSQLValueString($_POST['detail_kerusakan'], "text")
    );

    if (!mysqli_query($koneksi, $insertSQL)) {
        die("Gagal simpan pemakaian: " . mysqli_error($koneksi));
    }

    // ==============================
    // PROSES STOK SPAREPART TEKNISI
    // ==============================
    $namaTeknisiDipilih = $_POST['nama_teknisi'];
    $teknisiUsername = null;

    // Cari Username teknisi berdasarkan nama
    foreach ($userTeknisiMap as $usernameKey => $namaTeknisiValue) {
        if ($namaTeknisiValue == $namaTeknisiDipilih) {
            $teknisiUsername = $usernameKey;
            break;
        }
    }

    // Tentukan tabel sparepart berdasarkan mapping
    if ($teknisiUsername !== null && isset($userSparepartTable[$teknisiUsername])) {
        $tableSparepart = $userSparepartTable[$teknisiUsername];
    } else {
        $tableSparepart = null;
    }

    // Hanya jika tabel sparepart ditemukan
    if ($tableSparepart == "sp_bjm") {

        // Hapus sparepart sesuai SN_BAD saja
        $deleteSQL = sprintf(
            "DELETE FROM sp_bjm WHERE barcode = %s LIMIT 1",
            GetSQLValueString($_POST['sn_bad'], "text")
        );

        if (!mysqli_query($koneksi, $deleteSQL)) {
            die("Gagal hapus sparepart sp_bjm: " . mysqli_error($koneksi));
        }

    } else if ($tableSparepart) {

        // Sparepart lain → INSERT status bad
        $insertSparepartSQL = sprintf(
            "INSERT INTO %s (part_number, nama_sparepart, jenis_sparepart, atm, barcode, status)
            VALUES (%s, %s, %s, %s, %s, %s)",
            $tableSparepart,
            GetSQLValueString($_POST['part_number'], "text"),
            GetSQLValueString($_POST['nama_sparepart'], "text"),
            GetSQLValueString($_POST['jenis_sparepart'], "text"),
            GetSQLValueString($_POST['mesin'], "text"),
            GetSQLValueString($_POST['sn_bad'], "text"),
            GetSQLValueString("bad", "text")
        );

        if (!mysqli_query($koneksi, $insertSparepartSQL)) {
            die("Gagal insert sparepart teknisi: " . mysqli_error($koneksi));
        }
    }

    // Redirect
    if ($username == "admin") {
        header("Location: ../admin/pemakaian_sp.php");
    } else {
        header("Location: ../teknisi/pemakaian_teknisi.php");
    }
    exit;
}


// ======== AMBIL NAMA TEKNISI LOGIN ========
$nama_teknisi_login = "";
if (!empty($username)) {
  $query_user = sprintf("SELECT nama_lengkap FROM user WHERE username = %s", 
    GetSQLValueString($username, "text"));
  $result_user = mysqli_query($koneksi, $query_user);
  
  if ($row_user = mysqli_fetch_assoc($result_user)) {
    $nama_teknisi_login = $row_user['nama_lengkap'];
  }
}

// Ambil data pemakaian_part
$maxRows_Recordset1 = 1000;
$pageNum_Recordset1 = $_GET['pageNum_Recordset1'] ?? 0;
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

if (isset($userTeknisiMap[$username])) {
    $namaTeknisiFilter = $userTeknisiMap[$username];
    
    if ($namaTeknisiFilter == 'ALL') {
        $query_Recordset1 = "SELECT * FROM pemakaian_part ORDER BY id_atm DESC";
    } else {
        $query_Recordset1 = sprintf(
            "SELECT * FROM pemakaian_part WHERE nama_teknisi = %s ORDER BY id_atm DESC",
            GetSQLValueString($namaTeknisiFilter, "text")
        );
    }
} else {
    $query_Recordset1 = "SELECT * FROM pemakaian_part WHERE 1=0";
}

$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysqli_query($koneksi, $query_limit_Recordset1) or die(mysqli_error($koneksi));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);

// Generate No Tiket Otomatis
$query_last = "SELECT no_tiket FROM pemakaian_part ORDER BY no_tiket DESC LIMIT 1";
$result_last = mysqli_query($koneksi, $query_last) or die(mysqli_error($koneksi));
$row_last = mysqli_fetch_assoc($result_last);

if ($row_last && preg_match('/WKS(\d+)/', $row_last['no_tiket'], $matches)) {
  $next_number = (int)$matches[1] + 1;
} else {
  $next_number = 1;
}
$no_tiket = 'WKS' . str_pad($next_number, 3, '0', STR_PAD_LEFT);

$all_Recordset1 = mysqli_query($koneksi, $query_Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($all_Recordset1);
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1) - 1;

// UPDATE DATA
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE pemakaian_part SET 
    id_atm=%s,
    nama_lokasi=%s,
    mesin=%s,
    nama_teknisi=%s,
    nama_sparepart=%s, 
    jenis_sparepart=%s, 
    part_number=%s,
    sn_good=%s,
    sn_bad=%s,
    detail_kerusakan=%s
    WHERE no_tiket=%s",
    GetSQLValueString($_POST['id_atm'], "text"),
    GetSQLValueString($_POST['nama_lokasi'], "text"),
    GetSQLValueString($_POST['mesin'], "text"),
    GetSQLValueString($_POST['nama_teknisi'], "text"),  // ← tambahkan ini
    GetSQLValueString($_POST['nama_sparepart'], "text"),
    GetSQLValueString($_POST['jenis_sparepart'], "text"),
    GetSQLValueString($_POST['part_number'], "text"),
    GetSQLValueString($_POST['sn_good'], "text"),
    GetSQLValueString($_POST['sn_bad'], "text"),
    GetSQLValueString($_POST['detail_kerusakan'], "text"),
    GetSQLValueString($_POST['no_tiket'], "text")
  );

  // Batasi agar teknisi hanya bisa mengedit tiket miliknya
  if ($username != 'admin') {
      $updateSQL .= sprintf(" AND nama_teknisi=%s", GetSQLValueString($userTeknisiMap[$username], "text"));
  }

  mysqli_query($koneksi, $updateSQL) or die(mysqli_error($koneksi));

  // Redirect sesuai role
  if ($username == "admin") {
      echo "<script>window.location='../admin/pemakaian_sp.php';</script>";
  } else {
      echo "<script>window.location='../teknisi/pemakaian_teknisi.php';</script>";
  }
}


// HAPUS DATA
if (isset($_GET['delete']) && $_GET['delete'] == 1 && isset($_GET['from'])) {
    $barcode = mysqli_real_escape_string($koneksi, $_GET['barcode']);
    $fromTable = $_GET['from'];

    $allowedTables = ["sp_bjb", "sp_btl", "sp_bjm", "sp_mth", "sp_spt", "sp_plk", "sp_pkb", "sp_tjg"];
    if (in_array($fromTable, $allowedTables)) {
        $deleteSQL = "DELETE FROM `$fromTable` WHERE barcode = '$barcode'";
        mysqli_query($koneksi, $deleteSQL) or die(mysqli_error($koneksi));
    }
}
?>
