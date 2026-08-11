<?php include '../function_all/function_kirim.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Pengiriman Sparepart</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
<?php
ob_start(); // Mulai buffer output
?>
<div class="card stylish-card animate-card">
  <div class="card-header stylish-header">
    <i class="fas fa-cogs mr-2"></i> Data Pengiriman Sparepart
    <button class="btn btn-success btn-sm ml-auto" onclick="openFormPengiriman()">
      <i class="fas fa-plus"></i> Tambah Data
    </button>
  </div>
  <div class="card-body stylish-body">
    <div class="toolbar-search-only"></div>
   	<div class="toolbar-custom mb-3">
      <button class="btn btn-success btn-sm btn-tambah-data" onclick="openFormPengiriman()">
        <i class="fas fa-plus"></i> Tambah Data
      </button>
    </div>
    <div class="table-responsive-custom">  
      <table id="example" class="table table-striped table-bordered">
        <thead>
          <tr>
            <td>No Pengiriman</td>
            <td>Username</td>
            <td>P/N</td>
            <td>Nama Sparepart</td>
            <td>Barcode</td>
            <td>Qty</td>
            <td>ID ATM</td>
            <td>Nama Lokasi</td>
            <td>Detail Kerusakan</td>
            <td>Tgl Pengiriman</td>
            <td>Status</td>
          </tr>
        </thead>
        <tbody>
          <?php if ($totalRows_Recordset1 > 0): ?>
            <?php $no = $startRow_Recordset1 + 1; ?>
            <?php do { ?>
              <tr>
                <td><?php echo htmlspecialchars($row_Recordset1['no_pengiriman']); ?></td>
                <td><?php echo htmlspecialchars($row_Recordset1['username']); ?></td>
                <td><?php echo htmlspecialchars($row_Recordset1['part_number']); ?></td>
                <td><?php echo htmlspecialchars($row_Recordset1['nama_sparepart']); ?></td>
                <td><?php echo htmlspecialchars($row_Recordset1['barcode']); ?></td>
                <td><?php echo htmlspecialchars($row_Recordset1['qty']); ?></td>
                <td><?php echo htmlspecialchars($row_Recordset1['id_atm']); ?></td>
                <td><?php echo htmlspecialchars($row_Recordset1['nama_lokasi']); ?></td>
                <td><?php echo htmlspecialchars($row_Recordset1['detail_kerusakan']); ?></td>
                <td><?php echo htmlspecialchars($row_Recordset1['tgl_pengiriman']); ?></td>
                <td><?php echo htmlspecialchars($row_Recordset1['status']); ?></td>
              </tr>
            <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
        </tbody>

    <?php else: ?>
      <tbody>
      <tr>
        </tr>
    <?php endif; ?>
    </tbody>
      </table>
    </div>
  </div>
</div>

<script>
window.onload = function() {
  // Ambil parameter dari URL
  const urlParams = new URLSearchParams(window.location.search);

  if (urlParams.has('part_number')) {
    // Buka form tambah data
    openFormPengiriman();

    // Isi otomatis dari parameter GET
    document.querySelector("input[name='part_number']").value = urlParams.get('part_number');
    document.querySelector("input[name='nama_sparepart']").value = urlParams.get('nama_sparepart');
    document.querySelector("input[name='barcode']").value = urlParams.get('barcode');
  }

  if (urlParams.has('openFormPengiriman')) {
    openForm();
  }
};
</script>

<?php include '../crud_all/tambah_pengiriman.php'; ?>
<?php
// Simpan hasil buffer ke variabel
$main_content = ob_get_clean();

// Sekarang include template dan kirim $main_content
include '../template1.php';

// Bebaskan hasil query
mysqli_free_result($Recordset1);
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    // Inisialisasi DataTables
    var table = $('#example').DataTable();
      
    // **🔥 LOGIKA DIPERBAIKI: Periksa lebar layar**
    var isMobile = $(window).width() <= 640;

    if (!isMobile) {
      // **DESKTOP: Tampilkan Show entries & Search sejajar**
      $('.dataTables_length').appendTo('.toolbar-search-only');
      $('.dataTables_filter').appendTo('.toolbar-search-only');
      
      // Hilangkan teks "Search:"
      $('.dataTables_filter label').contents().filter(function() {
        return this.nodeType === 3; // node teks
      }).remove();
      
      // Tambahkan placeholder
      $('.dataTables_filter input').attr('placeholder', 'Cari No Kirim');
      
    } else {
      // **MOBILE: Sembunyikan Show entries, pindahkan Search ke toolbar-custom**
      $('.dataTables_length').remove();
      $('.dataTables_filter').appendTo('.toolbar-custom');
      
      // Hilangkan teks "Search:"
      $('.dataTables_filter label').contents().filter(function() {
        return this.nodeType === 3;
      }).remove();
      
      // Tambahkan placeholder
      $('.dataTables_filter input').attr('placeholder', 'Cari No Kirim');
    }
  });
</script>

</body>
</html>
