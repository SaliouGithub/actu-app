<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Helpdesk || Application de Gestion</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="assets/images/logo.png" alt="logo" style="width: 50px;">
              </div>
              <h4>Bienvenue à vous</h4>
              <h6 class="font-weight-light">Connectez-vous pour continuer.</h6>
              <form class="pt-3" id="loginForm">
                <div class="form-group">
                  <input type="login" name="login" required class="form-control form-control-lg" id="login" placeholder="Nom utilisateur">
                </div>
                <div class="form-group">
                  <input type="password" name="motDePasse" required class="form-control form-control-lg" id="password" placeholder="Mot de passe">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SE CONNECTER</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Se souvenir de moi
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Mot de passe oublié?</a>
                </div>
                <div class="mb-2">
                  <button type="button" onclick="window.location.href ='graph/signin.php'" class="btn btn-block btn-microsoft auth-form-btn">
                    <i class="ti-microsoft-alt me-2">  </i>Connect with Microsoft
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <!-- <script src="vendors/js/vendor.bundle.base.js"></script> -->
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <script type="text/javascript" src="php/view/admin/home/login.js"></script>
  <script src="assets/vendors/sweetalert/sweetalert.min.js"></script>

</body>

</html>
