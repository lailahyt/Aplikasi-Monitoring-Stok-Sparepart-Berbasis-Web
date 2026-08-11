<?php
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}
$username = $_SESSION['username'];
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
    <li>
      <a href="rekap_all.php"><i class="fas fa-clipboard"></i> Rekap ALL Data Sparepart</a>
    </li>
    <li>
      <a href="pemakaian_sp.php"><i class="fas fa-clipboard"></i> Pemakaian Sparepart</a>
    </li>

    <!-- Dropdown Data Sparepart -->
    <li>
      <a href="#sparepartSubmenu" class="dropdown-toggle">
        <i class="fas fa-boxes"></i> Data Sparepart
    <i class="fas fa-chevron-down chevron"></i>
      </a>
      <ul class="collapse list-unstyled" id="sparepartSubmenu">
        <li><a href="sp_bjm.php"><i class="fas fa-cogs"></i> Data BJM</a></li>
        <li><a href="sp_bjb.php"><i class="fas fa-cogs"></i> Data BJB</a></li>
        <li><a href="sp_btl.php"><i class="fas fa-cogs"></i> Data BTL</a></li>
        <li><a href="sp_mth.php"><i class="fas fa-cogs"></i> Data MTH</a></li>
        <li><a href="sp_spt.php"><i class="fas fa-cogs"></i> Data SPT</a></li>
        <li><a href="sp_plk.php"><i class="fas fa-cogs"></i> Data PLK</a></li>
        <li><a href="sp_pkb.php"><i class="fas fa-cogs"></i> Data PKB</a></li>
        <li><a href="sp_tjg.php"><i class="fas fa-cogs"></i> Data TJG</a></li>
      </ul>
    </li>
    <li>
      <a href="user.php"><i class="fas fa-users"></i> Data Teknisi</a>
    </li>
    <li>
      <a href="master_sparepart.php"><i class="fas fa-clipboard"></i> Data Master</a>
    </li>
    <li>
      <a href="master_atm.php"><i class="fab fa-cc-visa"></i> Master ATM</a>
    </li>
    <li>
      <a href="kirim_part.php"><i class="fas fa-truck"></i> Pengiriman Sparepart</a>
    <li>
      <a href="../function_all/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </li>
  </ul>
</div>



<div id="content">

    <?php echo $main_content; ?>
 
  </div>

  <!-- Content -->


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
        $('#sidebar').toggleClass('active');
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
<script>
  // Toggle dropdown di sidebar
  $('#sidebar .dropdown-toggle').on('click', function (e) {
    e.preventDefault();
    var $parent = $(this).parent();

    // tutup dropdown lain
    $('#sidebar li').not($parent).removeClass('open');

    // toggle dropdown yg diklik
    $parent.toggleClass('open');
  });
</script>

</body>
</html>
