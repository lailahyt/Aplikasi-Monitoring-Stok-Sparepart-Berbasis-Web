<?php
header('Content-Type: application/json');
include '../Connections/koneksi.php';

if (isset($_GET['id_atm'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id_atm']);
    $sql = "SELECT nama_lokasi FROM master_atm WHERE id_atm = '$id' LIMIT 1";
    $res = mysqli_query($koneksi, $sql);
    
    if (!$res) {
        die("SQL ERROR: " . mysqli_error($koneksi) . " | Query: " . $sql);
    }
    
    if ($row = mysqli_fetch_assoc($res)) {
        echo $row['nama_lokasi'];
    } else {
        echo "NOT FOUND: " . $id; // Debug kalau gak ada datanya
    }
}
?>