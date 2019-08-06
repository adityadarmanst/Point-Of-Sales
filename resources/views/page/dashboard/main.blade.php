
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>POS (Point Of Sales) </title>
    <!-- base:css -->
    <link rel="stylesheet" href="ladun/login/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="ladun/login/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="ladun/login/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="ladun/login/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
		<!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
     
      <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
              <li class="nav-item">
                <a class="nav-link" href="#!" id='btnDashboard'>
                  <i class="mdi mdi-file-document-box menu-icon"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="mdi mdi-cube-outline menu-icon"></i>
                    <span class="menu-title">Data Master</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="submenu">
                      <ul>
                        <li class="nav-item"><a class="nav-link" href="#!">Produk</a></li>
                       
                        <li class="nav-item"><a class="nav-link" href="#!">Supplier</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Pelanggan</a></li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a href="pages/forms/basic_elements.html" class="nav-link">
                    <i class="mdi mdi mdi-cart-outline menu-icon"></i>
                    <span class="menu-title">Pembelian</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="pages/charts/chartjs.html" class="nav-link">
                    <i class="mdi mdi mdi-cart-plus menu-icon"></i>
                    <span class="menu-title">Penjualan</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
             
             
              
              <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="mdi mdi-codepen menu-icon"></i>
                    <span class="menu-title">Utility</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="submenu">
                      <ul class="submenu-item">
                          <li class="nav-item"><a class="nav-link" href="#!">Retur Pembelian</a></li>
                          <li class="nav-item"><a class="nav-link" href="#!">Biaya</a></li>
                          <li class="nav-item"><a class="nav-link" href="#!" id='btnKategori'>Kategori</a></li>
                          <li class="nav-item"><a class="nav-link" href="#!">Daerah</a></li>
                      </ul>
                  </div>
              </li>

              <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="mdi mdi-codepen menu-icon"></i>
                    <span class="menu-title">Akun</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="submenu">
                      <ul class="submenu-item">
                          <li class="nav-item"><a class="nav-link" href="#!">Setting Usaha</a></li>
                          <li class="nav-item"><a class="nav-link" href="#!">Manajemen Akun</a></li>
                        
                      </ul>
                  </div>
              </li>

              <li class="nav-item">
                  <a href="{{ url('/logOut') }}" class="nav-link">
                    <i class="mdi mdi mdi-logout menu-icon"></i>
                    <span class="menu-title">Logout</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              
            </ul>
        </div>
      </nav>
    </div>
    <!-- partial -->
    
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper" id='divUtama'>
        
							
				</div>
				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
				<footer class="footer">
          <div class="footer-wrap">
              <div class="w-100 clearfix">
                <span class="d-block text-center text-sm-left d-sm-inline-block">POS (Point of Sales) by Haxorsprogrammingclub.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart-outline"></i></span>
              </div>
          </div>
        </footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->

    <script src="ladun/login/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="ladun/login/js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <script src="ladun/login/vendors/chart.js/Chart.min.js"></script>
    <script src="ladun/login/vendors/progressbar.js/progressbar.min.js"></script>
		<script src="ladun/login/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
		<script src="ladun/login/vendors/justgage/raphael-2.1.4.min.js"></script>
		<script src="ladun/login/vendors/justgage/justgage.js"></script>
    <!-- Custom js for this page-->
    <script src="ladun/login/js/dashboard.js"></script>
    <script src="ladun/login/js/main.js"></script>
    
    <!-- End custom js for this page-->
  </body>
</html>