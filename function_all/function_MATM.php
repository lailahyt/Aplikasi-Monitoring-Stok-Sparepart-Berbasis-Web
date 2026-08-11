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
  $insertSQL = sprintf("INSERT INTO master_atm (id_atm, nama_lokasi, bank) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['id_atm'], "text"),
                       GetSQLValueString($_POST['nama_lokasi'], "text"),
                       GetSQLValueString($_POST['bank'], "text"));
  
  $Result1 = mysqli_query($koneksi, $insertSQL);
  
  if (!$Result1) {
      die(mysqli_error($koneksi));
  }
  
  $insertGoTo = "../admin/master_atm.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
  exit();
}

// Proses UPDATE
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE master_atm SET 
    nama_lokasi=%s,
    bank=%s
    WHERE id_atm=%s",
    GetSQLValueString($_POST['nama_lokasi'], "text"),
    GetSQLValueString($_POST['bank'], "text"),
    GetSQLValueString($_POST['id_atm'], "text")
  );
  
  $Result1 = mysqli_query($koneksi, $updateSQL);
  
  if (!$Result1) {
      die(mysqli_error($koneksi));
  }
  
  echo "<script>window.location='../admin/master_atm.php';</script>";
  exit();
}

// Pagination
$maxRows_Recordset1 = 1000;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$query_Recordset1 = "SELECT * FROM master_atm ORDER BY id_atm DESC";
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