<div id="editFormOverlay" class="overlay">
  <div class="overlay-content card shadow-lg">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0"><i class="fas fa-plus-circle"></i> Edit Data User Teknisi</h5>
      <button class="btn btn-sm btn-danger" onclick="closeEditForm()"><i class="fas fa-times"></i></button>
    </div>
    <div class="card-body">
     <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
        <div class="form-group">
          <label>ID User</label>
          <input type="text" name="id_user" id="edit_id_user" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" name="nama_lengkap" id="edit_nama_lengkap" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" id="edit_username" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="text" name="password" id="edit_password" class="form-control" required>
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

<script>
function openEditForm(id_user, nama_lengkap, username, password) {
  document.getElementById('edit_id_user').value = id_user;
  document.getElementById('edit_nama_lengkap').value = nama_lengkap;
  document.getElementById('edit_username').value = username;
  document.getElementById('edit_password').value = password;
  document.getElementById('editFormOverlay').style.display = 'flex';
}
function closeEditForm() {
  document.getElementById('editFormOverlay').style.display = 'none';
}

</script>
