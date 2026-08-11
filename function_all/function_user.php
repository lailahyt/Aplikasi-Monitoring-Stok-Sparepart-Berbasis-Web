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

# ======================================================
# 🟢 Generate ID User Otomatis (USR001, USR002, dst.)
# ======================================================
$queryID = mysqli_query($koneksi, "SELECT id_user FROM user ORDER BY id_user DESC LIMIT 1");

if (!$queryID) {
    die(mysqli_error($koneksi));
}

$dataID = mysqli_fetch_assoc($queryID);

if ($dataID) {
  $lastID = substr($dataID['id_user'], 3); // ambil angka dari USR001 → 001
  $nextID = intval($lastID) + 1;
  $newID = 'USR' . str_pad($nextID, 3, '0', STR_PAD_LEFT);
} else {
  $newID = 'USR001';
}
# ======================================================

// Proses INSERT
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

  // Hash password ke MD5
  $password_md5 = md5($_POST['password']);
  
  $insertSQL = sprintf("INSERT INTO user (id_user, nama_lengkap, username, password) VALUES (%s, %s, %s, %s)",
                        GetSQLValueString($_POST['id_user'], "text"),
                        GetSQLValueString($_POST['nama_lengkap'], "text"),
                        GetSQLValueString($_POST['username'], "text"),
                        GetSQLValueString($password_md5, "text"));

  $Result1 = mysqli_query($koneksi, $insertSQL);
  
  if (!$Result1) {
      die(mysqli_error($koneksi));
  }

  $insertGoTo = "../admin/user.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
  exit();
}

// Proses UPDATE
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  // Hash password ke MD5
  $password_md5 = md5($_POST['password']);

  $updateSQL = sprintf("UPDATE user SET 
    nama_lengkap=%s,
    username=%s,
    password=%s
    WHERE id_user=%s",
    GetSQLValueString($_POST['nama_lengkap'], "text"),
    GetSQLValueString($_POST['username'], "text"),
    GetSQLValueString($password_md5, "text"),
    GetSQLValueString($_POST['id_user'], "text")
  );

  $Result1 = mysqli_query($koneksi, $updateSQL);
  
  if (!$Result1) {
      die(mysqli_error($koneksi));
  }

  echo "<script>window.location='../admin/user.php';</script>";
  exit();
}

// Pagination
$maxRows_Recordset1 = 1000;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$query_Recordset1 = "SELECT * FROM user ORDER BY username DESC";
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
?>