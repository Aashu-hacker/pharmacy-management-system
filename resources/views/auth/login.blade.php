<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <title>PMS</title>
  <link rel="shortcut icon" href="./assets2/dist/img/favicon.png">
  <link href="./assets2/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets2/plugins/fontawesome/css/all.min.css" rel="stylesheet">
  <link href="./assets2/plugins/typicons/src/typicons.min.css" rel="stylesheet">
  <link href="./assets2/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
  <link href="./assets2/plugins/toastr/toastr.css" rel="stylesheet">
  <link href="./assets2/dist/css/login.css" rel="stylesheet">
  <style>
    .bg-img-hero {
      background-image: url('./assets2/dist/css/abstract-bg-4.jpg');
    }
  </style>
  <!--<meta name="google-site-verification" content="LxSA3ttvzYDSDZMFAw-pvd3YRQ_lJbIYVRfBdVsZYMc" />-->
</head>

<body class="bg-white body-bg">
  <!-- ========== MAIN CONTENT ========== -->
  <main class="register-content">
    <div class="bg-img-hero position-fixed top-0 right-0 left-0 ">
      <!-- SVG Bottom Shape -->

      <!-- End SVG Bottom Shape -->
    </div>

    <!-- Content -->
    <div class="container py-5 py-sm-7">
      <a class="d-flex justify-content-center mb-5 pharmacare-logo" href="javascript:void(0)">
        <img class="z-index-2" src="./assets2/dist/logo.png" alt="Image Description">
      </a>
      <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
          <!-- Card -->
          <div class="form-card mb-5">
            <div class="form-card_body">
              <!-- Form -->
              <form action="{{route('login')}}" method="post">
                @csrf
                <div class="text-center">
                  <div class="mb-5">
                    <h1 class="display-4 mt-0 font-weight-semi-bold">Sign in</h1>

                  </div>

                </div>
                <?php if (isset($validation)): ?>
                  <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                      <?= $validation->listErrors() ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                  </div>
                <?php endif; ?>
                <?php if (isset($exception)): ?>
                  <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                      <?= $exception; ?>

                    </div>
                  </div>
                <?php endif; ?>

                <!-- Form Group -->
                <div class="form-group">
                  <label class="input-label" for="signinSrEmail">Your Email</label>
                  <input type="email" class="form-control" id="emial" name="email" tabindex="1" placeholder="Email@example.com" aria-label="email@address.com" required data-msg="Please enter a valid email address.">
                </div>
                <!-- End Form Group -->

                <!-- Form Group -->
                <div class="form-group">
                  <label class="input-label d-flex justify-content-between align-items-center" for="signupSrPassword" tabindex="-1">
                    <label class="input-label" for="password">Password</label>
                    <a href="#" data-toggle="modal" data-target="#passwordrecoverymodal" class="font-weight-500" tabindex="-1">Forgot password ?</a>
                  </label>
                  <div class="position-relative">
                    <input type="password" class="form-control password" id="pass" name="password" placeholder="Password *" tabindex="2">
                    <i class="fa fa-eye-slash"></i>
                  </div>
                </div>
                <!-- End Form Group -->

                <!-- Checkbox -->

                <!-- End Checkbox -->
                <button type="submit" class="btn btn-lg btn-block btn-success" tabindex="3">Sign in</button>
              </form>
              <!-- End Form -->
            </div>
            <div class="container">
              <div class="row">
                <div class="col-12 text-center">
                  <p>Don't have an account? <a href="{{route('auth.register')}}" tabindex="4">Sign up</a></p>
                </div>
              </div>
            </div>
            <!-- Footer -->
              <div class="card">
                <div class="col-12 text-center">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center">Email</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">Role</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center">admin@gmail.com</td>
                        <td class="text-center">123456</td>
                        <td class="text-center">Admin</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- End Footer -->
            </div>
          </div>
          <!-- End Card -->

        </div>
        <!-- Footer -->

        <!-- End Footer -->
      </div>
    </div>
    <div class="modal fade" id="passwordrecoverymodal" tabindex="-1" role="dialog" aria-labelledby="recoverylabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="recoverylabel"><?php echo 'Passwor Recovery'; ?></h5>
          </div>
          <form action="">
            <div class="modal-body">
              <div class="col-lg-12">
                <div class="form-group row">
                  <label for="email" class="col-lg-3 col-form-label">Email<i class="text-danger">*</i></label>
                  <div class="col-lg-8">
                    <input class="form-control" name="rec_email" id="rec_email" type="text" placeholder="email" required="">
                  </div>

                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal_close">Close</button>
              <input type="submit" id="submit_recovery" class="btn btn-success" value="Send">
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    <!-- End Content -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->
  <script src="./assets2/plugins/jQuery/jquery.min.js"></script>
  <script src="./assets2/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="./assets2/plugins/toastr/toastr.min.js"></script>
  <script src="./assets2/dist/js/sidebar.js"></script>
  <script src="./assets2/plugins/hideShowPassword.min.js" type="text/javascript"></script>

</body>

</html>