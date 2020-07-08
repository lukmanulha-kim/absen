<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Informasi Absensi - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-md-4">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
              </div>
              <form class="user" action="<?php echo base_url('login/cek') ?>" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="i_user" placeholder="Username" autofocus>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="i_sandi" placeholder="Password">
                </div>
                <input type="submit" name="i_login" value="Login"class="btn btn-primary btn-user btn-block">
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="#" data-toggle="modal" data-target="#Modal">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="#" data-toggle="modal" data-target="#Modal">Create an Account!</a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Logout Modal-->
  <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Lupa Password Atau Ingin Membuat Akun?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Harap Hubungi Administrator Jika Ingin Membuat Akun Atau Lupa Kata Sandi. :)</div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="button" data-dismiss="modal">OK, Saya Mengerti</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>
