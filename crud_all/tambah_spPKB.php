    <div id="overlayForm" class="overlay">
  <div class="overlay-content card shadow-lg">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0"><i class="fas fa-plus-circle"></i> Form Tambah Sparepart</h5>
      <button class="btn btn-sm btn-danger" onclick="closeForm()"><i class="fas fa-times"></i></button>
    </div>
        <div class="card-body">
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
        <div class="row">
          <!-- Kolom Kiri -->
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label for="part_number">P/N</label>
              <input type="text" name="part_number" id="part_number" class="form-control" required>
            </div>

            <div class="form-group mb-3">
              <label for="nama_sparepart">Nama Sparepart</label>
              <input type="text" name="nama_sparepart" id="nama_sparepart" class="form-control" readonly>
            </div>

            <div class="form-group mb-3">
              <label for="jenis_part">Jenis Sparepart</label>
              <input type="text" name="jenis_sparepart" id="jenis_part" class="form-control" readonly>
            </div>
          </div>

          <!-- Kolom Kanan -->
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label for="atm">Merk ATM</label>
              <input type="text" name="atm" id="atm" class="form-control" readonly>
            </div>

            <div class="form-group mb-3">
              <label for="barcode">Barcode</label>
              <input type="text" name="barcode" id="barcode" class="form-control" required>
            </div>

            <div class="form-group mb-3">
              <label for="status">Status</label>
              <input type="text" name="status" id="status" class="form-control" required>
            </div>
          </div>
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

// Ambil data sparepart berdasarkan P/N (realtime)
document.addEventListener("DOMContentLoaded", function() {
  const pnInput = document.getElementById("part_number");

  // Pastikan elemen ditemukan
  if (pnInput) {
    pnInput.addEventListener("keyup", function() {
      const pn = pnInput.value.trim();
      console.log("Mengetik:", pn);

      if (pn.length > 0) {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "../function_all/get_sparepart.php?part_number=" + encodeURIComponent(pn), true);
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("Response:", xhr.responseText);
            if (xhr.responseText.trim() !== "") {
              try {
                const data = JSON.parse(xhr.responseText);
                document.getElementById("nama_sparepart").value = data.nama_sparepart || "";
                document.getElementById("jenis_part").value = data.jenis_part || "";
                document.getElementById("atm").value = data.atm || "";
              } catch (e) {
                console.error("JSON Parse error:", e, xhr.responseText);
              }
            }
          }
        };
        xhr.send();
      }
    });
  } else {
    console.error("Elemen #part_number tidak ditemukan di DOM.");
  }
});
</script>