<?php
include '../function_all/function_spBJM.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Sparepart - Banjarmasin</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<style>
  td:last-child {
    white-space: nowrap;
  }

  .aksi-buttons {
    display: flex;
    gap: 4px;
    justify-content: center;
    align-items: center;
    flex-wrap: nowrap;
  }

  .aksi-buttons .btn {
    min-width: 70px;
  }

</style>
</head>

<body>
<?php
ob_start(); // mulai buffer
?>
<div class="card stylish-card animate-card">
  <div class="card-header stylish-header">
    <i class="fas fa-cogs mr-2"></i> Data Sparepart Banjarmasin
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
                      <td>Barcode</td>
                      <td>Status</td>
                      <td>Aksi</td>
                    </tr>
                  </thead>
                  <tbody>
                      <?php if ($totalRows_Recordset1 > 0): ?>
                        <?php $no = $startRow_Recordset1 + 1; ?>
                        <?php do { ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($row_Recordset1['part_number']); ?></td>
                            <td><?php echo htmlspecialchars($row_Recordset1['nama_sparepart']); ?></td>
                            <td><?php echo htmlspecialchars($row_Recordset1['jenis_sparepart']); ?></td>
                            <td><?php echo htmlspecialchars($row_Recordset1['atm']); ?></td>
                            <td><?php echo htmlspecialchars($row_Recordset1['barcode']); ?></td>
                            <td><?php echo htmlspecialchars($row_Recordset1['status']); ?></td>
                            <td>
                              <div class="aksi-buttons">
                                <a href="javascript:void(0);"
                                   onclick="confirmKirimPart('<?php echo $row_Recordset1['part_number']; ?>',
                                                             '<?php echo $row_Recordset1['nama_sparepart']; ?>',
                                                             '<?php echo $row_Recordset1['jenis_sparepart']; ?>',
                                                             '<?php echo $row_Recordset1['atm']; ?>',
                                                             '<?php echo $row_Recordset1['barcode']; ?>',
                                                             '<?php echo $row_Recordset1['status']; ?>')"
                                   class="btn btn-primary btn-sm btn-animate">
                                   <i class="fas fa-truck"></i> Kirim Part
                                </a>

              			</div>
            		</td>
          		</tr>
        <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
      <?php else: ?>
        <tr><td colspan="8" class="text-center">Tidak ada data sparepart.</td></tr>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
 </div>
</div>
<?php
// Simpan hasil buffer ke variabel
$main_content = ob_get_clean();

// Include template dan kirim $main_content
include '../template1.php';

// Bebaskan hasil query dari memori
mysqli_free_result($Recordset1);
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    
<script>
function confirmKirimPart(part_number, nama_sparepart, jenis_sparepart, atm, barcode, status) {
  Swal.fire({
    title: "Pilih Tujuan Pengiriman",
    html: `
      <div style="width:100%; text-align:left;">
        <select id="selectTujuan" 
                class="swal2-input" 
                style="width:100%; padding:10px; font-size:15px; border-radius:8px; border:1px solid #ccc; box-sizing:border-box;">
          <option value="">-- Pilih Tujuan --</option>
          <option value="sp_bjb">BJB (Banjarbaru)</option>
          <option value="sp_btl">BTL (Batulicin)</option>
          <option value="sp_mth">MTH (Muara Teweh)</option>
          <option value="sp_plk">PLK (Palangkaraya)</option>
          <option value="sp_spt">SPT (Sampit)</option>
          <option value="sp_pkb">PKB (Pangkalanbun)</option>
          <option value="sp_tjg">TJG (Tanjung)</option>
        </select>
      </div>
    `,
    confirmButtonText: "Kirim",
    cancelButtonText: "Batal",
    showCancelButton: true,
    buttonsStyling: false,
    customClass: {
      popup: 'swal2-custom-popup',
      confirmButton: 'swal2-btn-confirm',
      cancelButton: 'swal2-btn-cancel'
    },
    preConfirm: () => {
      const tujuan = Swal.getPopup().querySelector('#selectTujuan').value;
      if (!tujuan) {
        Swal.showValidationMessage(`Silakan pilih tujuan terlebih dahulu`);
      }
      return tujuan;
    }
  }).then((result) => {
    if (result.isConfirmed) {
      const tujuan = result.value;
      window.location.href = `../function_all/function_kirim.php?from=sp_bjm&to=${tujuan}&part_number=${encodeURIComponent(part_number)}&nama_sparepart=${encodeURIComponent(nama_sparepart)}&jenis_sparepart=${encodeURIComponent(jenis_sparepart)}&atm=${encodeURIComponent(atm)}&barcode=${encodeURIComponent(barcode)}&status=${encodeURIComponent(status)}`;
    }
  });
}
</script>

<style>
/* ===== Styling SweetAlert ===== */
.swal2-custom-popup {
  max-width: 420px !important;
  width: 90%;
  border-radius: 15px;
  padding: 20px 25px;
}

.swal2-btn-confirm {
  background-color: #7161ef;
  color: #fff;
  border: none;
  border-radius: 8px;
  padding: 8px 25px;
  font-size: 15px;
  margin: 5px;
  cursor: pointer;
}

.swal2-btn-confirm:hover {
  background-color: #5b4fd6;
}

.swal2-btn-cancel {
  background-color: #6c757d;
  color: #fff;
  border: none;
  border-radius: 8px;
  padding: 8px 25px;
  font-size: 15px;
  margin: 5px;
  cursor: pointer;
}

.swal2-btn-cancel:hover {
  background-color: #5a6268;
}

/* Hapus scroll horizontal */
.swal2-popup {
  overflow-x: hidden !important;
}
</style>

</body>
</html>
