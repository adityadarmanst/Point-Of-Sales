
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>POS (Point of Sales)</title>
  <!-- base:css -->
  <link rel="stylesheet" href="ladun/login/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="ladun/login/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="ladun/login/css/style.css">
  <!-- endinject -->

</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="main-panel">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo" style='text-align:center;'>
                  <img src="ladun/login/images/logo.svg" alt="logo">
                </div>
                <h4>Point of Sales Application</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <div class="pt-3">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="txtUsername" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="txtPassword" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <a id='btnMasuk' class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="#!">Masuk</a>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="ladun/login/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="ladun/login/js/template.js"></script>
  <script src='ladun/login/js/login.js'></script>
  <!-- endinject -->
</body>

</html>
