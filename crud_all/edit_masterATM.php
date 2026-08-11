<!-- Overlay Form Edit -->
<div id="editFormOverlay" class="overlay-form" style="display:none;">
  <div class="overlay-content card shadow-lg">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0"><i class="fas fa-edit"></i> Edit Data Master ATM</h5>
      <button class="btn btn-sm btn-danger" onclick="closeEditForm()"><i class="fas fa-times"></i></button>
    </div>
    <div class="card-body stylish-body">
      <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">

        <div class="form-group">
          <label>ID ATM</label>
          <input type="text" name="id_atm" id="edit_id_atm" class="form-control" required />
        </div>

        <div class="form-group">
          <label>Nama Lokasi</label>
          <input type="text" name="nama_lokasi" id="edit_nama_lokasi" class="form-control" required />
        </div>
    
    	<div class="form-group">
          <label>Bank</label>
          <input type="text" name="bank" id="edit_bank" class="form-control" required />
        </div>

        <div class="d-flex justify-content-center">
          <button type="submit" name="simpan" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan Perubahan
          </button>
        </div>
        <input type="hidden" name="MM_update" value="form2" />
      </form>
    </div>
  </div>
</div>

<style>
.overlay-form {
  position: fixed;
  top: 0; left: 0; width: 100%; height: 100%;
  background: rgba(0,0,0,0.6);
  backdrop-filter: blur(3px);
  display: flex; justify-content: center; align-items: center;
  z-index: 1050;
}
.overlay-content {
  width: 500px;
  max-width: 90%;
}
</style>

<script>
function openEditForm(id_atm, nama_lokasi, bank) {
  document.getElementById('edit_id_atm').value = id_atm;
  document.getElementById('edit_nama_lokasi').value = nama_lokasi;
  document.getElementById('edit_bank').value = bank;
  document.getElementById('editFormOverlay').style.display = 'flex';
}
function closeEditForm() {
  document.getElementById('editFormOverlay').style.display = 'none';
}
</script>
