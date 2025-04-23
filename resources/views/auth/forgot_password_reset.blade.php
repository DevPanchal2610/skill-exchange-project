<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
    <link rel="stylesheet" href="/dist/assets/fonts/tabler-icons.min.css">
    <link rel="stylesheet" href="/dist/assets/fonts/feather.css">
    <link rel="stylesheet" href="/dist/assets/fonts/fontawesome.css">
    <link rel="stylesheet" href="/dist/assets/fonts/material.css">
    <link rel="stylesheet" href="/dist/assets/css/style.css" id="main-style-link">
    <link rel="stylesheet" href="/dist/assets/css/style-preset.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="auth-main">
        <div class="auth-wrapper v3">
            <div class="auth-form">
                <div class="auth-header">
                    <a href="#"><img src="/dist/assets/images/image.png" class="img-fluid logo-lg" alt="logo" style="width: 100px; height: auto;"></a>
                </div>
                <div class="card my-5">
                    <div class="card-body">
                        <h3 class="mb-4"><b>Reset Password</b></h3>
                        <form action="{{ route('forgot.reset') }}" method="POST">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">
                            <div class="form-group mb-3">
                                <label class="form-label" for="password">New Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="password_confirmation">Confirm New Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Reset Password</button>
                            </div>
                        </form>
                        @if($errors->any())
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: "{{ $errors->first() }}"
                                });
                            </script>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
