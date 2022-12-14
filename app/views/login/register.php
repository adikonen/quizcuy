<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Register Quizzcuy</title>

    <!-- Custom fonts for this template-->
    <link href="<?= url("vendor/fontawesome-free/css/all.min.css")?>" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href=<?= url("css/sb-admin-2.css")?> rel="stylesheet" />
  </head>

  <body class="bg-gradient-primary">
    <div class="container">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Registercuy</h1>
                </div>
                <form class="user" action="<?= url('user/store_register')?>" method="POST">
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input required type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Name" name="nama"/>
                    </div>
                    <div class="col-sm-6">
                      <input required type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Number" name="no_telpon"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <input required type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="email"/>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input required type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password"/>
                    </div>
                    <div class="col-sm-6">
                      <input required type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="konfirmasi-password"/>
                    </div>
                  </div>
                  <button type="submit" id="btn-register" class="btn btn-primary btn-user btn-block"> Register Account </button>
                </form>
                <hr />
                <div class="text-center">
                  <a class="small" href="<?= url('user/forgotpassword')?>">Forgot Password?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="<?= url('user/login')?>">Already have an account? Login!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <?php if(isset($_SESSION['fail'])):?>
      <script>alert('<?= $_SESSION['fail']?>')</script>
    <?php endif;?>
    <!-- Bootstrap core JavaScript-->
    <script src=<?= url("vendor/jquery/jquery.min.js")?>></script>
    <script src=<?= url("vendor/bootstrap/js/bootstrap.bundle.min.js")?>></script>

    <!-- Core plugin JavaScript-->
    <script src=<?= url("vendor/jquery-easing/jquery.easing.min.js")?>></script>

    <!-- Custom scripts for all pages-->
    <script src=<?= url("js/sb-admin-2.min.js")?>></script>
    <script>
      
    </script>
  </body>
</html>
