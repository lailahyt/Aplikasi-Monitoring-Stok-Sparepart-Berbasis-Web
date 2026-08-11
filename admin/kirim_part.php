<?php include'../function_all/function_kirim.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Pengiriman Sparepart</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<style>
  /* Ukuran popup lebih kecil */
.swal2-small-popup {
  width: 420px !important;
  padding: 1.2em !important;
  border-radius: 10px !important;
}

/* Judul dan teks lebih proporsional */
.swal2-small-title {
  font-size: 1.3rem !important;
}

.swal2-small-content {
  font-size: 0.95rem !important;
}

/* ✅ Rapikan kolom aksi */
  td:last-child {
    white-space: nowrap; /* Supaya tombol tidak turun ke bawah */
  }

  .aksi-buttons {
    display: flex;
    gap: 2px; /* Jarak antar tombol */
    justify-content: center; /* Tengah secara horizontal */
    align-items: center; /* Tengah secara vertikal */
    flex-wrap: nowrap;
  }

  .aksi-buttons .btn {
    min-width: 70px;
  }

  /* ✅ Pastikan tabel tetap responsif */
  .table-responsive-custom {
    overflow-x: auto;
  }
</style>
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
          <td>Aksi</td>
        </tr>
      </thead>
      <tbody>
        <?php if ($totalRows_Recordset1 > 0): ?>
          <?php $no = $startRow_Recordset1 + 1; ?>
        <?php do { ?>
          <tr>
            <td><?php echo $row_Recordset1['no_pengiriman']; ?></td>
            <td><?php echo $row_Recordset1['username']; ?></td>
            <td><?php echo $row_Recordset1['part_number']; ?></td>
            <td><?php echo $row_Recordset1['nama_sparepart']; ?></td>
            <td><?php echo $row_Recordset1['barcode']; ?></td>
            <td><?php echo $row_Recordset1['qty']; ?></td>
            <td><?php echo $row_Recordset1['id_atm']; ?></td>
            <td><?php echo $row_Recordset1['nama_lokasi']; ?></td>
            <td><?php echo $row_Recordset1['detail_kerusakan']; ?></td>
            <td><?php echo $row_Recordset1['tgl_pengiriman']; ?></td>
            <td><?php echo $row_Recordset1['status']; ?></td>
            <td>
              <div class="aksi-buttons">
                  <button 
                      class="btn btn-primary btn-sm btn-animate" 
                      onclick="openEditForm1(
                        '<?php echo htmlspecialchars($row_Recordset1['no_pengiriman'], ENT_QUOTES); ?>',
                        '<?php echo htmlspecialchars($row_Recordset1['username'], ENT_QUOTES); ?>',
                        '<?php echo htmlspecialchars($row_Recordset1['part_number'], ENT_QUOTES); ?>',
                        '<?php echo htmlspecialchars($row_Recordset1['nama_sparepart'], ENT_QUOTES); ?>',
                        '<?php echo htmlspecialchars($row_Recordset1['barcode'], ENT_QUOTES); ?>',
                        '<?php echo htmlspecialchars($row_Recordset1['qty'], ENT_QUOTES); ?>',
                        '<?php echo htmlspecialchars($row_Recordset1['id_atm'], ENT_QUOTES); ?>',
                        '<?php echo htmlspecialchars($row_Recordset1['nama_lokasi'], ENT_QUOTES); ?>',
                        '<?php echo htmlspecialchars($row_Recordset1['detail_kerusakan'], ENT_QUOTES); ?>',
                        '<?php echo htmlspecialchars($row_Recordset1['tgl_pengiriman'], ENT_QUOTES); ?>',
                        '<?php echo htmlspecialchars($row_Recordset1['status'], ENT_QUOTES); ?>'
                      )">
                      <i class="fas fa-edit"></i> Edit
                    </button>
                    <a href="../crud_all/hapus_kirim.php?no_pengiriman=<?php echo urlencode($row_Recordset1['no_pengiriman']); ?>" 
                      class="btn btn-danger btn-sm btn-hapus"
                      data-no_pengiriman="<?php echo htmlspecialchars($row_Recordset1['no_pengiriman'], ENT_QUOTES); ?>">
                      <i class="fa fa-trash"></i> Hapus
                    </a>
              </div>
            </td>
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
    openFormPemakaian();

    // Isi otomatis dari parameter GET
    document.querySelector("input[name='part_number']").value = urlParams.get('part_number');
    document.querySelector("input[name='nama_sparepart']").value = urlParams.get('nama_sparepart');
    document.querySelector("input[name='jenis_sparepart']").value = urlParams.get('jenis_sparepart');
    document.querySelector("input[name='mesin']").value = urlParams.get('atm');
    document.querySelector("input[name='sn_good']").value = urlParams.get('barcode');
  }

  if (urlParams.has('openFormPemakaian')) {
    openForm();
  }
};
</script>

<?php include '../crud_all/tambah_pengiriman.php';?>
<?php include '../crud_all/edit_kirim.php';?>

<?php

// Simpan hasil buffer ke variabel
$main_content = ob_get_clean();

// Sekarang include template dan kirim $main_content
include '../template.php';
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
      $('.dataTables_filter input').attr('placeholder', 'Cari No Tiket');
      
    } else {
      // **MOBILE: Sembunyikan Show entries, pindahkan Search ke toolbar-custom**
      $('.dataTables_length').remove();
      $('.dataTables_filter').appendTo('.toolbar-custom');
      
      // Hilangkan teks "Search:"
      $('.dataTables_filter label').contents().filter(function() {
        return this.nodeType === 3;
      }).remove();
      
      // Tambahkan placeholder
      $('.dataTables_filter input').attr('placeholder', 'Cari No Tiket');
    }
  });
</script>

<script>
document.querySelectorAll('.btn-hapus').forEach(button => {
  button.addEventListener('click', function(e) {
    e.preventDefault(); // mencegah link langsung dijalankan

    const url = this.getAttribute('href');

    Swal.fire({
      title: 'Yakin ingin menghapus data ini?',
      text: "Data yang sudah dihapus tidak dapat dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal',
      reverseButtons: true,
      backdrop: true,
      customClass: {
        popup: 'swal2-small-popup',  // gunakan kelas custom
        title: 'swal2-small-title',
        content: 'swal2-small-content',
      }
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url;
      }
    });
  });
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