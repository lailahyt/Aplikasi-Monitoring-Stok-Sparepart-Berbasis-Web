<?php
if (!isset($_SESSION['username'])) {
    header("Location: index.php?error=belum_login");
    exit();
}
$username = $_SESSION['username']; // Ambil username dari session

// Tentukan halaman Data Sparepart berdasarkan username teknisi
$halaman_sparepart = "";
switch ($username) {
  case "J95602":
    $halaman_sparepart = "../teknisi/teknisi_bjb.php";
    break;
  case "J95603":
    $halaman_sparepart = "../teknisi/teknisi_btl.php";
    break;
  case "J95604":
  case "J95610":
  case "J95611":
  case "J95613":
  case 'J95614':
    $halaman_sparepart = "../teknisi/teknisi_bjm.php";
    break;
  case "J95605":
    $halaman_sparepart = "../teknisi/teknisi_mth.php";
    break;
  case "J95606":
    $halaman_sparepart = "../teknisi/teknisi_spt.php";
    break;
  case "J95607":
    $halaman_sparepart = "../teknisi/teknisi_plk.php";
    break;
  case "J95608":
    $halaman_sparepart = "../teknisi/teknisi_pkb.php";
    break;
  case "J95609":
    $halaman_sparepart = "../teknisi/teknisi_tjg.php";
    break;
  case "J95612":
    $halaman_sparepart = "../teknisi/workshop.php";
    break;
  default:
    $halaman_sparepart = "#"; // fallback jika username tidak dikenali
    break;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Template Web Stylish</title>
  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome 5 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap4.css">
  <!-- Custom CSS -->
  <?php include 'css/style.css';?>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-dark fixed-top d-flex justify-content-between">
    <div>
      <button class="navbar-toggler" type="button" id="sidebarCollapse">
        <div class="animated-icon"><span></span><span></span><span></span></div>
      </button>
      <a class="navbar-brand ml-3" href="#"><i class="fas fa-cogs"></i> Workshop BMS</a>
    </div>
    <div class="d-flex align-items-center">
      <span class="navbar-text"><i class="fas fa-user"></i> <?php echo $username; ?></span>
      <a href="../function_all/logout.php" class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
  </nav>

 <!-- Sidebar -->
<div id="sidebar">
  <ul class="components list-unstyled">
   <?php if ($username !== 'J95612') : ?>
    <li>
      <a href="../teknisi/pemakaian_teknisi.php"><i class="fas fa-clipboard"></i> Pemakaian Sparepart</a>
    </li>
   <?php endif; ?> 
     
    <li>
      <a href="<?php echo $halaman_sparepart; ?>"><i class="fas fa-cogs"></i> Data Sparepart</a>
    </li>
      
      <?php if ($username !== 'J95612') : ?>
    <li>
      <a href="../teknisi/kirim_teknisi.php" class="active"><i class="fas fa-shipping-fast"></i> Pengiriman Sparepart</a>
    </li>  
       <?php endif; ?> 
    <li>
      <a href="../function_all/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </li>
  </ul>
</div>

<!-- Content -->
<div id="content">
  <?php echo $main_content; ?>
</div>

  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap4.js"></script>

<script>
  $(document).ready(function () {
    $('#example').DataTable();

    // Toggle sidebar
    $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active'); // <--- Cukup ini
      $('.navbar-toggler').toggleClass('open');
    });
  });

  // Dark mode toggle
  $('#darkModeToggle').on('click', function () {
    $('body').toggleClass('dark-mode');
    $(this).find('i').toggleClass('fa-moon fa-sun');
  });
</script>

  <script>
  // Animasi muncul card
  $(document).ready(function(){
    setTimeout(function(){
      $(".stylish-card").addClass("show");
    }, 300);
  });
</script>




</body>
</html>

