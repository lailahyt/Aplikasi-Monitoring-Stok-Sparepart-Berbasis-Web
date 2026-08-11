    <div id="overlayForm" class="overlay">
  <div class="overlay-content card shadow-lg">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0"><i class="fas fa-plus-circle"></i> Tambah Data Lokasi ATM</h5>
      <button class="btn btn-sm btn-danger" onclick="closeForm()"><i class="fas fa-times"></i></button>
    </div>
    <div class="card-body">
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
        <div class="form-group">
          <label>ID ATM</label>
          <input type="text" name="id_atm" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Nama Lokasi</label>
          <input type="text" name="nama_lokasi" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Bank</label>
          <input type="text" name="bank" class="form-control" required>
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