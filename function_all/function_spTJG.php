<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

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

// Proses INSERT
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO sp_tjg (part_number, nama_sparepart, jenis_sparepart, atm, barcode, status) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['part_number'], "text"),
                       GetSQLValueString($_POST['nama_sparepart'], "text"),
                       GetSQLValueString($_POST['jenis_sparepart'], "text"),
                       GetSQLValueString($_POST['atm'], "text"),
                       GetSQLValueString($_POST['barcode'], "text"),
                       GetSQLValueString($_POST['status'], "text"));

  $Result1 = mysqli_query($koneksi, $insertSQL);
  
  if (!$Result1) {
      die(mysqli_error($koneksi));
  }

  $insertGoTo = "../admin/sp_tjg.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
  exit();
}

// Proses UPDATE
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE sp_tjg SET 
    part_number=%s,
    nama_sparepart=%s, 
    jenis_sparepart=%s, 
    atm=%s,
    barcode=%s,
    status=%s 
    WHERE part_number=%s",
    GetSQLValueString($_POST['part_number'], "text"),
    GetSQLValueString($_POST['nama_sparepart'], "text"),
    GetSQLValueString($_POST['jenis_sparepart'], "text"),
    GetSQLValueString($_POST['atm'], "text"),
    GetSQLValueString($_POST['barcode'], "text"),
    GetSQLValueString($_POST['status'], "text"),
    GetSQLValueString($_POST['old_part_number'], "text") // ini nilai lama
  );

  $Result1 = mysqli_query($koneksi, $updateSQL);
  
  if (!$Result1) {
      die(mysqli_error($koneksi));
  }

  echo "<script>window.location='../admin/sp_tjg.php';</script>";
  exit();
}

// Pagination
$maxRows_Recordset1 = 1000;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$query_Recordset1 = "SELECT * FROM sp_tjg ORDER BY part_number DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);

$Recordset1 = mysqli_query($koneksi, $query_limit_Recordset1);

if (!$Recordset1) {
    die(mysqli_error($koneksi));
}

$row_Recordset1 = mysqli_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysqli_query($koneksi, $query_Recordset1);
  $totalRows_Recordset1 = mysqli_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

// Generate No. Tiket Otomatis
$query_last = "SELECT no_tiket FROM pemakaian_part ORDER BY no_tiket DESC LIMIT 1";
$result_last = mysqli_query($koneksi, $query_last);

if (!$result_last) {
    die(mysqli_error($koneksi));
}

$row_last = mysqli_fetch_assoc($result_last);

if ($row_last && preg_match('/WKS(\d+)/', $row_last['no_tiket'], $matches)) {
  $last_number = (int)$matches[1];
  $next_number = $last_number + 1;
} else {
  $next_number = 1;
}
// Format hasil akhir dengan awalan WKS dan 3 digit angka
$no_tiket = 'WKS' . str_pad($next_number, 3, '0', STR_PAD_LEFT);
?>