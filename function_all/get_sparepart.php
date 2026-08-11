<?php
header('Content-Type: application/json');
include '../Connections/koneksi.php'; // koneksi pakai mysqli

if (isset($_GET['part_number'])) {
    // Amankan input agar tidak bisa SQL injection
    $pn = mysqli_real_escape_string($koneksi, $_GET['part_number']);

    // Query ambil data sparepart
    $sql = "SELECT nama_sparepart, jenis_part, atm 
            FROM sparepart 
            WHERE part_number = '$pn' 
            LIMIT 1";

    $res = mysqli_query($koneksi, $sql);

    // Cek jika query gagal
    if (!$res) {
        echo json_encode(['error' => mysqli_error($koneksi)]);
        exit;
    }

    // Jika data ditemukan
    if ($row = mysqli_fetch_assoc($res)) {
        echo json_encode($row);
    } else {
        // Jika tidak ada data
        echo json_encode([]);
    }
}
?>
