<div id="editFormOverlay" class="overlay">
  <div class="overlay-content card shadow-lg w-75 mx-auto">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0"><i class="fas fa-plus-circle"></i> Form Edit Pengiriman Sparepart</h5>
      <button class="btn btn-sm btn-danger" onclick="closeEditForm1()"><i class="fas fa-times"></i></button>
    </div>
    <div class="card-body">
      <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">

        <div class="row">
           <div class="col-md-6 mb-3">
            <label class="form-label">No Pengiriman</label>
            <input type="text" name="no_pengiriman" class="form-control" id="edit_no_pengiriman" readonly/>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" id="edit_username" class="form-control" readonly>
          </div>
         <div class="col-md-6 mb-3">
            <label class="form-label">P/N</label>
            <input type="text" name="part_number" id="edit_part_number" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Nama Sparepart</label>
            <input type="text" name="nama_sparepart" id="edit_nama_sparepart" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Barcode</label>
            <input type="text" name="barcode" id="edit_barcode" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Qty</label>
            <input type="text" name="qty" id="edit_qty" class="form-control" required>
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
            <label class="form-label fw-semibold">Detail Kerusakan</label>
            <textarea name="detail_kerusakan" id="edit_detail_kerusakan" class="form-control" rows="2"></textarea>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Tgl Pengiriman</label>
            <input type="text" name="tgl_kirim" id="edit_tgl_kirim" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="status" id="edit_status" class="form-control" required>
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
function openEditForm1(no_pengiriman, username, part_number, nama_sparepart, barcode, qty, id_atm, nama_lokasi, detail_kerusakan, tgl_pengiriman, status) {
    document.getElementById('edit_no_pengiriman').value = no_pengiriman;
    document.getElementById('edit_username').value = username;
    document.getElementById('edit_part_number').value = part_number;
    document.getElementById('edit_nama_sparepart').value = nama_sparepart;
    document.getElementById('edit_barcode').value = barcode;
    document.getElementById('edit_qty').value = qty;
    document.getElementById('edit_id_atm').value = id_atm;
    document.getElementById('edit_nama_lokasi').value = nama_lokasi;
    document.getElementById('edit_detail_kerusakan').value = detail_kerusakan;
    document.getElementById('edit_tgl_kirim').value = tgl_pengiriman;
    document.getElementById('edit_status').value = status;
    document.getElementById('editFormOverlay').style.display = 'flex';
}
function closeEditForm1() {
  document.getElementById('editFormOverlay').style.display = 'none';
}
</script>
