<div id="editFormOverlay" class="overlay">
  <div class="overlay-content card shadow-lg w-75 mx-auto">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0"><i class="fas fa-plus-circle"></i> Form Edit Pemakaian Sparepart</h5>
      <button class="btn btn-sm btn-danger" onclick="closeEditForm()"><i class="fas fa-times"></i></button>
    </div>
    <div class="card-body">
      <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">

        <div class="row">
           <div class="col-md-6 mb-3">
            <label class="form-label">No Tiket</label>
            <input type="text" name="no_tiket" class="form-control" id="edit_no_tiket" readonly/>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">ID ATM</label>
            <input type="text" name="id_atm" id="edit_id_atm" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Nama Lokasi</label>
            <input type="text" name="nama_lokasi" id="edit_nama_lokasi" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Mesin</label>
            <input type="text" name="mesin" id="edit_mesin" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Nama Teknisi</label>
            <input type="text" name="nama_teknisi" id="edit_nama_teknisi" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Nama Sparepart</label>
            <input type="text" name="nama_sparepart" id="edit_nama_sparepart" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Jenis Sparepart</label>
            <input type="text" name="jenis_sparepart" id="edit_jenis_sparepart" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">P/N</label>
            <input type="text" name="part_number" id="edit_part_number" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">SN Good</label>
            <input type="text" name="sn_good" id="edit_sn_good" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">SN Bad</label>
            <input type="text" name="sn_bad" id="edit_sn_bad" class="form-control" required>
          </div>
          <div class="col-12 mb-3">
            <label class="form-label">Detail Kerusakan</label>
            <textarea name="detail_kerusakan" id="edit_detail_kerusakan" class="form-control" rows="3" required></textarea>
          </div>
        </div>

        <div class="d-flex justify-content-center py-3">
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
.overlay {
  display: none;
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.6);
  justify-content: center;
  align-items: center;
  z-index: 1050;
}
.overlay-content {
  max-height: 90vh;
  overflow-y: auto;
}
</style>

<script>
function openEditForm(no_tiket, id_atm, nama_lokasi, mesin, nama_teknisi, nama_sparepart, jenis_sparepart, part_number, sn_good, sn_bad, detail_kerusakan) {
  document.getElementById('edit_no_tiket').value = no_tiket;
  document.getElementById('edit_id_atm').value = id_atm;
  document.getElementById('edit_nama_lokasi').value = nama_lokasi;
  document.getElementById('edit_mesin').value = mesin;
  document.getElementById('edit_nama_teknisi').value = nama_teknisi;
  document.getElementById('edit_nama_sparepart').value = nama_sparepart;
  document.getElementById('edit_jenis_sparepart').value = jenis_sparepart;
  document.getElementById('edit_part_number').value = part_number;
  document.getElementById('edit_sn_good').value = sn_good;
  document.getElementById('edit_sn_bad').value = sn_bad;
  document.getElementById('edit_detail_kerusakan').value = detail_kerusakan;
  document.getElementById('editFormOverlay').style.display = 'flex';
}
function closeEditForm() {
  document.getElementById('editFormOverlay').style.display = 'none';
}
</script>
