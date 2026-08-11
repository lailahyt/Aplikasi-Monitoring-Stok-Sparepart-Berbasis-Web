    <div id="overlayForm" class="overlay">
  <div class="overlay-content card shadow-lg">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0"><i class="fas fa-plus-circle"></i> Form Tambah Sparepart</h5>
      <button class="btn btn-sm btn-danger" onclick="closeForm()"><i class="fas fa-times"></i></button>
    </div>
    <div class="card-body">
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
        <div class="form-group">
          <label>P/N</label>
          <input type="text" name="part_number" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Nama Sparepart</label>
          <input type="text" name="nama_sparepart" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Jenis Sparepart</label>
          <input type="text" name="jenis_part" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Merk ATM</label>
          <input type="text" name="atm" class="form-control" required>
        </div>
        <div class="text-center mt-3">
          <button type="submit" name="simpan" class="btn btn-primary">
            <i class="fas fa-save"></i> Simpan
          </button>
        </div>
        <input type="hidden" name="MM_insert" value="form1" />
      </form>
    </div>
  </div>
</div>



<script>
// Buka form
function openForm() {
  document.getElementById("overlayForm").style.display = "flex";
}

// Tutup form
function closeForm() {
  document.getElementById("overlayForm").style.display = "none";
}
</script>