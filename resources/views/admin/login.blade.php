<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Login</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">

  <!-- [Favicon] icon -->
  <link rel="icon" href="dist/assets/images/image.png " type="image/x-icon"> <!-- [Google Font] Family -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="dist/assets/fonts/tabler-icons.min.css" >
<!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="dist/assets/fonts/feather.css" >
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="dist/assets/fonts/fontawesome.css" >
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="dist/assets/fonts/material.css" >
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="dist/assets/css/style.css" id="main-style-link" >
<link rel="stylesheet" href="dist/assets/css/style-preset.css" >
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->

  <div class="auth-main">
    <div class="auth-wrapper v3">
      <div class="auth-form">
        <div class="auth-header">
          <a href="#"><img src="dist/assets/images/image.png" class="img-fluid logo-lg" alt="logo" style="width: 100px; height: auto;">
          </a>
        </div>
        <div class="card my-5"> 
          <div class="card-body">
            <form action="/validate" method="POST">
                @csrf
                @if(session()->get('error'))
                    <script>
                        Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "{{ session()->get('debug', 'Invalid email id Or password!!') }}",
                        });
                    </script>
                @endif
                @if (session()->has('fullname'))
                    <script>window.location.href="/users"</script>
                @endif
                <div class="d-flex justify-content-between align-items-end mb-4">
                <h3 class="mb-0"><b>Login</b></h3>
                <a href="/register" class="link-primary">Don't have an account?</a>
                </div>
                <div class="form-group mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="d-flex mt-1 justify-content-between">
                <div class="form-check">
                    <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="">
                    <label class="form-check-label text-muted" for="customCheckc1">Keep me sign in</label>
                </div>
                    <a href="/forgot-password" class="link-primary">Forgot Password?</a>
                </div>
                <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Login</button>
                </div>
        </form>
          </div>
        </div>
        <div class="auth-footer row">
         


            <br><br><br>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->
  <!-- Required Js -->
  <script src="dist/assets/js/plugins/popper.min.js"></script>
  <script src="dist/assets/js/plugins/simplebar.min.js"></script>
  <script src="dist/assets/js/plugins/bootstrap.min.js"></script>
  <script src="dist/assets/js/fonts/custom-font.js"></script>
  <script src="dist/assets/js/pcoded.js"></script>
  <script src="dist/assets/js/plugins/feather.min.js"></script>

  
  
  
  
  <script>layout_change('light');</script>
  
  
  
  
  <script>change_box_container('false');</script>
  
  
  
  <script>layout_rtl_change('false');</script>
  
  
  <script>preset_change("preset-1");</script>
  
  
  <script>font_change("Public-Sans");</script>
  
    
 
</body>
<!-- [Body] end -->

</html>