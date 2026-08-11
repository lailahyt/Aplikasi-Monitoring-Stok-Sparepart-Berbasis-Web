<div id="overlayForm2" class="overlay">
  <div class="overlay-content card shadow-lg w-75 mx-auto">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0"><i class="fas fa-plus-circle"></i> Form Tambah Pengiriman Sparepart</h5>
        <button class="btn btn-sm btn-danger" onclick="closeForm()"><i class="fas fa-times"></i></button>
    </div>

    <div class="card-body">
      <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">No Pengiriman</label>
            <input type="text" name="no_pengiriman" class="form-control" value="<?php echo $no_pengiriman; ?>" readonly />
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" readonly />
        </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">P/N</label>
            <input type="text" name="part_number" id="impor_part_number" class="form-control" required onkeyup="getNamaSparepart()">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">Nama Sparepart</label>
            <input type="text" name="nama_sparepart" id="impor_nama_sparepart" class="form-control" readonly>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">Barcode</label>
            <input type="text" name="barcode" id="impor_barcode" class="form-control" required>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">Qty</label>
            <input type="number" name="qty" id="qty" class="form-control" required min="1">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">ID ATM</label>
            <input type="text" name="id_atm" id="id_atm" class="form-control" required onkeyup="getNamaLokasi()">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">Nama Lokasi</label>
            <input type="text" name="nama_lokasi" id="nama_lokasi" class="form-control" readonly>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">Detail Kerusakan</label>
            <textarea name="detail_kerusakan" class="form-control" rows="2" placeholder="Tuliskan detail kerusakan..." required></textarea>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">Tgl Pengiriman</label>
            <input type="date" name="tgl_pengiriman" id="tgl_pengiriman" class="form-control" required>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">Status</label>
            <input type="text" name="status" id="status" class="form-control" required>
          </div>
        </div>

        <div class="d-flex justify-content-center py-3">
          <button type="submit" name="simpan" class="btn btn-primary px-4">
            <i class="fas fa-save me-1"></i> Simpan
          </button>
        </div>

        <input type="hidden" name="MM_insert" value="form1" />
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
  padding: 25px;
}

.overlay-content {
  max-height: 90vh;
  overflow-y: auto;
  border-radius: 10px;
  background-color: #fff;
}

.form-label {
  font-size: 0.95rem;
  font-weight: 600;
}

textarea {
  resize: none;
}
</style>

<script>
function openFormPengiriman(){
  document.getElementById("overlayForm2").style.display = "flex";
}

function closeForm() {
  document.getElementById("overlayForm2").style.display = "none";
}

// Ambil data sparepart berdasarkan P/N (realtime)
function getNamaSparepart() {
  var pn = document.getElementById("impor_part_number").value;
  if (pn.length > 0) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../function_all/get_sparepart.php?part_number=" + encodeURIComponent(pn), true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        if (xhr.responseText != "") {
          try {
            var data = JSON.parse(xhr.responseText); // parse dulu
            document.getElementById("impor_nama_sparepart").value = data.nama_sparepart || "";
            document.getElementById("impor_jenis_part").value = data.jenis_part || "";
            document.getElementById("impor_atm").value = data.atm || "";
          } catch (e) {
            console.error("JSON Parse error:", e, xhr.responseText);
          }
        }
      }
    };
    xhr.send();
  }
}

function getNamaLokasi() {
  var id = document.getElementById("id_atm").value;
  if (id.length > 0) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../function_all/get_lokasi.php?id_atm=" + encodeURIComponent(id), true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        if (xhr.responseText != "") {
          document.getElementById("nama_lokasi").value = xhr.responseText;
        } 
      }
    };
    xhr.send();
  }
}

</script>
