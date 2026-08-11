<?php 
require_once('../Connections/koneksi.php'); 
$maxRows_Recordset1 = 1000;
$pageNum_Recordset1 = isset($_GET['pageNum_Recordset1']) ? (int)$_GET['pageNum_Recordset1'] : 0;
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$query_Recordset1 = "SELECT * FROM sparepart ORDER BY part_number DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);

$Recordset1 = mysqli_query($koneksi, $query_limit_Recordset1) or die(mysqli_error($koneksi));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);

// Hitung total data
if (isset($_GET['totalRows_Recordset1'])) {
    $totalRows_Recordset1 = (int)$_GET['totalRows_Recordset1'];
} else {
    $all_Recordset1 = mysqli_query($koneksi, $query_Recordset1);
    $totalRows_Recordset1 = mysqli_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1 / $maxRows_Recordset1) - 1;

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
