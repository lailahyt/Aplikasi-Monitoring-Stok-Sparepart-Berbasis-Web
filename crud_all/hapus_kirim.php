<?php
require_once('../Connections/koneksi.php'); // pastikan file ini sudah pakai mysqli

// Fungsi pengaman nilai SQL (tidak wajib jika pakai prepared statement, tapi disertakan agar fleksibel)
if (!function_exists("GetSQLValueString")) {
    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
    {
        if ($theValue === null) {
            return "NULL";
        }

        switch ($theType) {
            case "text":
                return ($theValue !== "") ? "'" . addslashes($theValue) . "'" : "NULL";
            case "long":
            case "int":
                return ($theValue !== "") ? intval($theValue) : "NULL";
            case "double":
                return ($theValue !== "") ? floatval($theValue) : "NULL";
            case "date":
                return ($theValue !== "") ? "'" . addslashes($theValue) . "'" : "NULL";
            case "defined":
                return ($theValue !== "") ? $theDefinedValue : $theNotDefinedValue;
            default:
                return "NULL";
        }
    }
}

// Proses hapus data
if (isset($_GET['no_pengiriman']) && $_GET['no_pengiriman'] != "") {
    $no_pengiriman = $_GET['no_pengiriman'];

    // Gunakan prepared statement agar lebih aman
    $stmt = $koneksi->prepare("DELETE FROM kirim_part WHERE no_pengiriman = ?");
    $stmt->bind_param("s", $no_pengiriman);

    if ($stmt->execute()) {
        // Redirect setelah berhasil
        $deleteGoTo = "../admin/kirim_part.php";
        if (isset($_SERVER['QUERY_STRING'])) {
            $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
            $deleteGoTo .= $_SERVER['QUERY_STRING'];
        }
        header("Location: " . $deleteGoTo);
        exit();
    } else {
        die("Gagal menghapus data: " . $stmt->error);
    }

    $stmt->close();
}
?>
