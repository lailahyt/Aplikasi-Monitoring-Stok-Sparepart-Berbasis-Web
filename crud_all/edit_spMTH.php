<!-- Overlay Form Edit -->
<div id="editFormOverlay" class="overlay-form" style="display:none;">
  <div class="overlay-content card shadow-lg">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0"><i class="fas fa-edit"></i> Edit Data Sparepart</h5>
      <button class="btn btn-sm btn-danger" onclick="closeEditForm()"><i class="fas fa-times"></i></button>
    </div>

    <div class="card-body stylish-body">
      <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
        <div class="row">
          <!-- Kolom Kiri -->
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label>Part Number</label>
              <input type="text" name="part_number" id="edit_part_number" class="form-control" required onkeyup="getNamaSparepart()"/>
            </div>

            <div class="form-group mb-3">
              <label>Nama Sparepart</label>
              <input type="text" name="nama_sparepart" id="edit_nama_sparepart" class="form-control" required />
            </div>

            <div class="form-group mb-4">
              <label>Jenis Sparepart</label>
              <input type="text" name="jenis_sparepart" id="edit_jenis_part" class="form-control" required />
            </div>
          </div>

          <!-- Kolom Kanan -->
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label>Merk ATM</label>
              <input type="text" name="atm" id="edit_atm" class="form-control" required />
            </div>

            <div class="form-group mb-3">
              <label>Barcode</label>
              <input type="text" name="barcode" id="edit_barcode" class="form-control" required />
            </div>

            <div class="form-group mb-3">
              <label>Status</label>
              <input type="text" name="status" id="edit_status" class="form-control" required />
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-center">
          <button type="submit" name="simpan" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan Perubahan
          </button>
        </div>

        <input type="hidden" name="old_part_number" id="old_part_number" />
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

#editFormOverlay .card {
  max-width: 700px;
  margin: 0 auto;
  border-radius: 10px;
}

#editFormOverlay .form-control {
  border-radius: 6px;
}

#editFormOverlay label {
  font-weight: 500;
}

#editFormOverlay .btn {
  border-radius: 6px;
  padding: 6px 14px;
}

</style>

<script>
function openEditForm(part_number, nama_sparepart, jenis_part, atm, barcode, status) {
  document.getElementById('edit_part_number').value = part_number;
  document.getElementById('old_part_number').value = part_number;
  document.getElementById('edit_nama_sparepart').value = nama_sparepart;
  document.getElementById('edit_jenis_part').value = jenis_part;
  document.getElementById('edit_atm').value = atm;
  document.getElementById('edit_barcode').value = barcode;
  document.getElementById('edit_status').value = status;
  document.getElementById('editFormOverlay').style.display = 'flex';
}
function closeEditForm() {
  document.getElementById('editFormOverlay').style.display = 'none';
}

// Ambil data sparepart berdasarkan P/N (realtime)
function getNamaSparepart() {
  var pn = document.getElementById("edit_part_number").value;
  if (pn.length > 0) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../function_all/get_sparepart.php?part_number=" + encodeURIComponent(pn), true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        if (xhr.responseText != "") {
          try {
            var data = JSON.parse(xhr.responseText); // parse dulu
            document.getElementById("edit_nama_sparepart").value = data.nama_sparepart || "";
            document.getElementById("edit_jenis_part").value = data.jenis_part || "";
            document.getElementById("edit_atm").value = data.atm || "";
          } catch (e) {
            console.error("JSON Parse error:", e, xhr.responseText);
          }
        }
      }
    };
    xhr.send();
  }
}
</script>
