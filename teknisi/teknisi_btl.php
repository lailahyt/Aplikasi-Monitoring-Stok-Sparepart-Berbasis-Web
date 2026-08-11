<?php
include '../function_all/function_spBTL.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Sparepart - Batulicin</title>
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
    <i class="fas fa-cogs mr-2"></i> Data Sparepart Batulicin
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
                                <!-- Tombol Impor -->
                                <a href="pemakaian_teknisi.php?part_number=<?php echo urlencode($row_Recordset1['part_number']); ?>
                                            &nama_sparepart=<?php echo urlencode($row_Recordset1['nama_sparepart']); ?>
                                            &jenis_sparepart=<?php echo urlencode($row_Recordset1['jenis_sparepart']); ?>
                                            &atm=<?php echo urlencode($row_Recordset1['atm']); ?>
                                            &barcode=<?php echo urlencode($row_Recordset1['barcode']); ?>
                                            &delete=1&from=sp_btl" 
                                            class="btn btn-success btn-sm btn-animate">
                                            <i class="fas fa-download"></i> Impor
                                </a>

                                <a href="kirim_teknisi.php?part_number=<?php echo urlencode($row_Recordset1['part_number']); ?>
                                            &nama_sparepart=<?php echo urlencode($row_Recordset1['nama_sparepart']); ?>
                                            &barcode=<?php echo urlencode($row_Recordset1['barcode']); ?>
                                            &delete=1&from=sp_btl"  
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
