<?php include'../function_all/function_pemakaianSP.php';?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Pemakaian Sparepart</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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
  white-space: nowrap;
}

.aksi-buttons {
  display: flex;
  gap: 2px;
  justify-content: center;
  align-items: center;
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
<?php ob_start(); ?>
<div class="card stylish-card animate-card">
  <div class="card-header stylish-header d-flex align-items-center">
    <i class="fas fa-cogs mr-2"></i> Data Pemakaian Sparepart
    <button class="btn btn-success btn-sm ml-auto" onclick="openFormPemakaian()">
      <i class="fas fa-plus"></i> Tambah Data
    </button>
  </div>

  <div class="card-body stylish-body">
    <div class="toolbar-search-only"></div>
    <div class="toolbar-custom mb-3">
      <button class="btn btn-success btn-sm btn-tambah-data" onclick="openFormPemakaian()">
        <i class="fas fa-plus"></i> Tambah Data
      </button>
    </div>
    <div class="table-responsive-custom">
      <table id="example" class="table table-striped table-bordered">
        <thead>
          <tr>
            <td>No Tiket</td>
            <td>ID ATM</td>
            <td>Nama Lokasi</td>
            <td>Mesin</td>
            <td>Nama Teknisi</td>
            <td>Nama Sparepart</td>
            <td>Jenis Sparepart</td>
            <td>P/N</td>
            <td>SN Good</td>
            <td>SN Bad</td>
            <td>Detail Kerusakan</td>
            <td>Aksi</td>
          </tr>
        </thead>
        <tbody>
        <?php if (isset($totalRows_Recordset1) && $totalRows_Recordset1 > 0): ?>
          <?php $no = $startRow_Recordset1 + 1; ?>
          <?php do { ?>
          <tr>
            <td><?= htmlspecialchars($row_Recordset1['no_tiket'] ?? '') ?></td>
            <td><?= htmlspecialchars($row_Recordset1['id_atm'] ?? '') ?></td>
            <td><?= htmlspecialchars($row_Recordset1['nama_lokasi'] ?? '') ?></td>
            <td><?= htmlspecialchars($row_Recordset1['mesin'] ?? '') ?></td>
            <td><?= htmlspecialchars($row_Recordset1['nama_teknisi'] ?? '') ?></td>
            <td><?= htmlspecialchars($row_Recordset1['nama_sparepart'] ?? '') ?></td>
            <td><?= htmlspecialchars($row_Recordset1['jenis_sparepart'] ?? '') ?></td>
            <td><?= htmlspecialchars($row_Recordset1['part_number'] ?? '') ?></td>
            <td><?= htmlspecialchars($row_Recordset1['sn_good'] ?? '') ?></td>
            <td><?= htmlspecialchars($row_Recordset1['sn_bad'] ?? '') ?></td>
            <td><?= htmlspecialchars($row_Recordset1['detail_kerusakan'] ?? '') ?></td>
            <td>
              <div class="aksi-buttons">
                <button class="btn btn-primary btn-sm btn-animate"
                  onclick="openEditForm(
                    '<?= htmlspecialchars($row_Recordset1['no_tiket'], ENT_QUOTES) ?>',
                    '<?= htmlspecialchars($row_Recordset1['id_atm'], ENT_QUOTES) ?>',
                    '<?= htmlspecialchars($row_Recordset1['nama_lokasi'], ENT_QUOTES) ?>',
                    '<?= htmlspecialchars($row_Recordset1['mesin'], ENT_QUOTES) ?>',
                    '<?= htmlspecialchars($row_Recordset1['nama_teknisi'], ENT_QUOTES) ?>',
                    '<?= htmlspecialchars($row_Recordset1['nama_sparepart'], ENT_QUOTES) ?>',
                    '<?= htmlspecialchars($row_Recordset1['jenis_sparepart'], ENT_QUOTES) ?>',
                    '<?= htmlspecialchars($row_Recordset1['part_number'], ENT_QUOTES) ?>',
                    '<?= htmlspecialchars($row_Recordset1['sn_good'], ENT_QUOTES) ?>',
                    '<?= htmlspecialchars($row_Recordset1['sn_bad'], ENT_QUOTES) ?>',
                    '<?= htmlspecialchars($row_Recordset1['detail_kerusakan'], ENT_QUOTES) ?>'
                  )">
                  <i class="fas fa-edit"></i> Edit
                </button>
                <a href="../crud_all/hapus_pemakaian.php?no_tiket=<?= urlencode($row_Recordset1['no_tiket']) ?>" 
                   class="btn btn-danger btn-sm btn-hapus"
                   data-no_tiket="<?= htmlspecialchars($row_Recordset1['no_tiket'], ENT_QUOTES) ?>">
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
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has('part_number')) {
    openFormPemakaian();
    document.querySelector("input[name='part_number']").value = urlParams.get('part_number');
    document.querySelector("input[name='nama_sparepart']").value = urlParams.get('nama_sparepart');
    document.querySelector("input[name='jenis_sparepart']").value = urlParams.get('jenis_sparepart');
    document.querySelector("input[name='mesin']").value = urlParams.get('atm');
    document.querySelector("input[name='sn_good']").value = urlParams.get('barcode');
  }
};
</script>

<?php include '../crud_all/tambah_pemakaian.php';?>
<?php include '../crud_all/edit_pemakaian.php';?>    
    
<?php
$main_content = ob_get_clean();
include '../template.php';
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.btn-hapus').forEach(button => {
  button.addEventListener('click', function(e) {
    e.preventDefault();
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
      customClass: {
        popup: 'swal2-small-popup',
        title: 'swal2-small-title',
        content: 'swal2-small-content',
      }
    }).then((result) => {
      if (result.isConfirmed) window.location.href = url;
    });
  });
});
</script>
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


</body>
</html>

<?php
// Bebaskan result set untuk menghemat memori
if (isset($Recordset1)) {
    mysqli_free_result($Recordset1);
}
?>
