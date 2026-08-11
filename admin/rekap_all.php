<?php include'../function_all/function_rekap.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rekap ALL Data Sparepart - WKS BMS</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
<?php
ob_start(); // Mulai buffer output
?>
<div class="card stylish-card animate-card">
  <div class="card-header stylish-header">
    <i class="fas fa-cogs mr-2"></i>Rekap ALL Data Sparepart
  </div>
  <div class="card-body stylish-body">
  <div class="toolbar-search-only"></div>
    <div class="table-responsive-custom">
      <table id="example" class="table table-striped table-bordered">
        <thead>
          <tr>
            <td>No</td>
            <td>P/N</td>
            <td>Nama Sparepart</td>
            <td>Jenis Sparepart</td>
            <td>Merk ATM</td>
            <td>BJM</td>
            <td>MTH</td>
            <td>SPT</td>
            <td>PLK</td>
            <td>PKB</td>
            <td>TJG</td>
            <td>Jumlah</td>
            <td>Good</td>
            <td>Bad</td>
            <td>Luar Kota</td>
            <td>Jumlah</td>
          </tr>
        </thead>
        <tbody>
        <?php if ($totalRows_Recordset1 > 0): ?>
          <?php $no = $startRow_Recordset1 + 1; ?>
          <?php do { ?>
            <?php
            $pn = mysqli_real_escape_string($koneksi, $row_Recordset1['part_number']);

            $sql_bjm = "SELECT COUNT(*) AS total_bjm FROM sp_bjm WHERE part_number = '$pn'";
            $res_bjm = mysqli_query($koneksi, $sql_bjm);
            if (!$res_bjm) die(mysqli_error($koneksi));
            $row_bjm = mysqli_fetch_assoc($res_bjm);
            $total_bjm = $row_bjm['total_bjm'];

            $sql_bjb = "SELECT COUNT(*) AS total_bjb FROM sp_bjb WHERE part_number = '$pn'";
            $res_bjb = mysqli_query($koneksi, $sql_bjb);
            if (!$res_bjb) die(mysqli_error($koneksi));
            $row_bjb = mysqli_fetch_assoc($res_bjb);
            $total_bjb = $row_bjb['total_bjb'];

            $sql_btl = "SELECT COUNT(*) AS total_btl FROM sp_btl WHERE part_number = '$pn'";
            $res_btl = mysqli_query($koneksi, $sql_btl);
            if (!$res_btl) die(mysqli_error($koneksi));
            $row_btl = mysqli_fetch_assoc($res_btl);
            $total_btl = $row_btl['total_btl'];

            $total_bjm = $total_bjm + $total_bjb + $total_btl;

            $sql_mth = "SELECT COUNT(*) AS total_mth FROM sp_mth WHERE part_number = '$pn'";
            $res_mth = mysqli_query($koneksi, $sql_mth);
            if (!$res_mth) die(mysqli_error($koneksi));
            $row_mth = mysqli_fetch_assoc($res_mth);
            $total_mth = $row_mth['total_mth'];

            $sql_spt = "SELECT COUNT(*) AS total_spt FROM sp_spt WHERE part_number = '$pn'";
            $res_spt = mysqli_query($koneksi, $sql_spt);
            if (!$res_spt) die(mysqli_error($koneksi));
            $row_spt = mysqli_fetch_assoc($res_spt);
            $total_spt = $row_spt['total_spt'];

            $sql_plk = "SELECT COUNT(*) AS total_plk FROM sp_plk WHERE part_number = '$pn'";
            $res_plk = mysqli_query($koneksi, $sql_plk);
            if (!$res_plk) die(mysqli_error($koneksi));
            $row_plk = mysqli_fetch_assoc($res_plk);
            $total_plk = $row_plk['total_plk'];

            $sql_pkb = "SELECT COUNT(*) AS total_pkb FROM sp_pkb WHERE part_number = '$pn'";
            $res_pkb = mysqli_query($koneksi, $sql_pkb);
            if (!$res_pkb) die(mysqli_error($koneksi));
            $row_pkb = mysqli_fetch_assoc($res_pkb);
            $total_pkb = $row_pkb['total_pkb'];

            $sql_tjg = "SELECT COUNT(*) AS total_tjg FROM sp_tjg WHERE part_number = '$pn'";
            $res_tjg = mysqli_query($koneksi, $sql_tjg);
            if (!$res_tjg) die(mysqli_error($koneksi));
            $row_tjg = mysqli_fetch_assoc($res_tjg);
            $total_tjg = $row_tjg['total_tjg'];

            // ✅ Hitung jumlah GOOD dan BAD dari semua tabel
            $tables = array('sp_bjm', 'sp_bjb', 'sp_btl', 'sp_mth', 'sp_spt', 'sp_plk', 'sp_pkb', 'sp_tjg');
            $total_good = 0;
            $total_bad = 0;

            foreach ($tables as $tbl) {
              $sql_good = "SELECT COUNT(*) AS total_good FROM $tbl WHERE part_number = '$pn' AND status='Good'";
              $res_good = mysqli_query($koneksi, $sql_good);
              if (!$res_good) die(mysqli_error($koneksi));
              $row_good = mysqli_fetch_assoc($res_good);
              $total_good += $row_good['total_good'];

              $sql_bad = "SELECT COUNT(*) AS total_bad FROM $tbl WHERE part_number = '$pn' AND status='Bad'";
              $res_bad = mysqli_query($koneksi, $sql_bad);
              if (!$res_bad) die(mysqli_error($koneksi));
              $row_bad = mysqli_fetch_assoc($res_bad);
              $total_bad += $row_bad['total_bad'];
            }
            // ✅ Kolom "Luar Kota" otomatis berisi total sparepart dari semua kota selain BJM
            $luar_kota = $total_mth + $total_spt + $total_plk + $total_pkb + $total_tjg;

            // Hitung total jumlah per sparepart
            $jumlah_total = $total_bjm + $luar_kota;
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo htmlspecialchars($row_Recordset1['part_number']); ?></td>
              <td><?php echo htmlspecialchars($row_Recordset1['nama_sparepart']); ?></td>
              <td><?php echo htmlspecialchars($row_Recordset1['jenis_part']); ?></td>
              <td><?php echo htmlspecialchars($row_Recordset1['atm']); ?></td>
              <td><?php echo $total_bjm; ?></td>
              <td><?php echo $total_mth; ?></td>
              <td><?php echo $total_spt; ?></td>
              <td><?php echo $total_plk; ?></td>
              <td><?php echo $total_pkb; ?></td>
              <td><?php echo $total_tjg; ?></td>
              <td><?php echo $jumlah_total; ?></td>

              <!-- ✅ Kolom Good/Bad/Luar Kota otomatis -->
              <td><?php echo $total_good; ?></td>
              <td><?php echo $total_bad; ?></td>
              <td><?php echo $luar_kota; ?></td>

              <td><?php echo $total_good + $total_bad; ?></td>
            </tr>
          <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
        <?php else: ?>
          <tbody>
            <tr><td colspan="16">Tidak ada data</td></tr>
          </tbody>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php
// Simpan hasil buffer ke variabel
$main_content = ob_get_clean();

// Sekarang include template dan kirim $main_content
include '../template.php';
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        var table = $('#example').DataTable();

        // **🔥 LOGIKA BARU UNTUK MOBILE: Periksa lebar layar**
        var isMobile = $(window).width() <= 640;

        // 1. Pindahkan Show X entries (dataTables_length) dan Search Input (dataTables_filter)
        if (!isMobile) {
            // Jika bukan mobile, tampilkan kedua elemen seperti biasa
            $('.dataTables_length').appendTo('.toolbar-search-only');
        } else {
            // Jika mobile, sembunyikan elemen 'Show entries' dengan menghapusnya dari DOM
            $('.dataTables_length').remove(); 
        }
        
        // Selalu pindahkan Search Input
        $('.dataTables_filter').appendTo('.toolbar-search-only');


        // Hilangkan teks "Search:"
        $('.dataTables_filter label').contents().filter(function() {
            return this.nodeType === 3; // node teks
        }).remove();

        // Ubah placeholder dan tambahkan class Bootstrap
        $('.dataTables_filter input')
            .attr('placeholder', 'Cari Part Number')
            .addClass('form-control');
    });
</script>

</body>
</html>
<?php
// Bebaskan result set untuk menghemat memori
if (isset($Recordset1)) {
    mysqli_free_result($Recordset1);
}
?>