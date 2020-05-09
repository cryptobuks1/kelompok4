<!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Dashboard PRO - Premium Bootstrap 4 Admin Template</title>
  <!-- Favicon -->
  <link rel="icon" href="<?= base_url("assets/frontpage_user/img/brand/favicon.png") ?>" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url("assets/frontpage_user/vendor/nucleo/css/nucleo.css") ?>" type="text/css">
  <link rel="stylesheet" href="<?= base_url("assets/frontpage_user/vendor/@fortawesome/fontawesome-free/css/all.min.css") ?>" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= base_url("assets/frontpage_user/css/argon.css?v=1.1.0") ?>" type="text/css">
</head>

<body class="bg-default g-sidenav-show g-sidenav-pinned">
  <!-- Navbar -->
  
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Create an account</h1>
              
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary border-0">
            
            <div class="card-body px-lg-5 py-lg-5">

              <?= form_open('user/register/doRegister') ?>
              <?php if(isset($error)): ?>
              <div class="alert alert-danger">
                <?php echo $error; ?>

              </div>
              <?php endif; ?>
                <input type="hidden" name="<?php echo e($name); ?>" value="<?php echo e($key); ?>">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Username" type="text" name="username" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" name="email" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password" required>
                  </div>
                </div>
                
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" type="checkbox" required>
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Create account</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?= base_url("assets/frontpage_user/vendor/jquery/dist/jquery.min.js") ?>"></script>
  <script src="<?= base_url("assets/frontpage_user/vendor/bootstrap/dist/js/bootstrap.bundle.min.js")?>"></script>
  <script src="<?= base_url("assets/frontpage_user/vendor/js-cookie/js.cookie.js") ?>"></script>
  <script src="<?= base_url("assets/frontpage_user/vendor/jquery.scrollbar/jquery.scrollbar.min.js") ?>"></script>
  <script src="<?= base_url("assets/frontpage_user/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js") ?>"></script>
  <!-- Argon JS -->
  <script src="<?= base_url("assets/frontpage_user/js/argon.js?v=1.1.0") ?>"></script><div class="backdrop d-xl-none" data-action="sidenav-unpin" data-target="undefined"></div>
  <!-- Demo JS - remove this in your project -->
  <script src="<?= base_url("assets/frontpage_user/js/demo.min.js") ?>"></script>


</body></html><?php /**PATH /var/www/html/ste_online/application/views/user/register.blade.php ENDPATH**/ ?>