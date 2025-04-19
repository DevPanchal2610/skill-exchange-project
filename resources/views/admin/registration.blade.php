<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Sign up</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset('dist/assets/images/image.png') }}" type="image/x-icon"> <!-- [Google Font] Family -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('dist/assets/fonts/tabler-icons.min.css') }}">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset('dist/assets/fonts/feather.css') }}">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset('dist/assets/fonts/fontawesome.css') }}">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('dist/assets/fonts/material.css') }}">
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('dist/assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('dist/assets/css/style-preset.css') }}">

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
                    <a href="#"><img src="{{ asset('dist/assets/images/image.png') }}" class="img-fluid logo-lg" alt="logo" style="width: 100px; height: auto;"></a>
                </div>
                <div class="card my-5">
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="/register" method="POST" enctype="multipart/form-data" id="registrationForm">
                            @csrf
                            {{-- @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
    </div>
@endif --}}

                            <div class="d-flex justify-content-between align-items-end mb-4">
                                <h3 class="mb-0"><b>Sign up</b></h3>
                                <a href="/login" class="link-primary">Already have an account?</a>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label class="form-label">Full Name*</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Full Name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label class="form-label">Email Address*</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Password*</label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                </div>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Confirm Password*</label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                                </div>
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone Number" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">City*</label>
                                <select class="form-select @error('city_id') is-invalid @enderror" name="city_id" id="city_id">
                                    <option value="">Select City</option>
                                    @php
                                        $cities = \App\Models\City::with('state')->where('city_id', '>', 1)->get();
                                        if($cities->isEmpty()) {
                                            echo '<option value="" disabled>No cities found in database</option>';
                                        }
                                    @endphp
                                    @foreach($cities as $city)
                                        <option value="{{ $city->city_id }}">{{ $city->city_name }} ({{ $city->state->state_name ?? 'Unknown' }})</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('city_id'))
                                    <div class="text-danger">{{ $errors->first('city_id') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Profile Picture</label>
                                <input type="file" class="form-control" name="profile_picture">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Security Question</label>
                                <select class="form-select @error('security_question') is-invalid @enderror" name="security_question">
                                    <option value="">Select a security question</option>
                                    <option value="What was your childhood nickname?" {{ old('security_question') == 'What was your childhood nickname?' ? 'selected' : '' }}>What was your childhood nickname?</option>
                                    <option value="What is the name of your first pet?" {{ old('security_question') == 'What is the name of your first pet?' ? 'selected' : '' }}>What is the name of your first pet?</option>
                                    <option value="What was your first car?" {{ old('security_question') == 'What was your first car?' ? 'selected' : '' }}>What was your first car?</option>
                                    <option value="What elementary school did you attend?" {{ old('security_question') == 'What elementary school did you attend?' ? 'selected' : '' }}>What elementary school did you attend?</option>
                                    <option value="What is your mother's maiden name?" {{ old('security_question') == 'What is your mother\'s maiden name?' ? 'selected' : '' }}>What is your mother's maiden name?</option>
                                </select>
                                @error('security_question')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Security Answer</label>
                                <input type="text" class="form-control @error('security_answer') is-invalid @enderror" name="security_answer" placeholder="Your answer" value="{{ old('security_answer') }}">
                                @error('security_answer')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <p class="mt-4 text-sm text-muted">By Signing up, you agree to our <a href="#" class="text-primary"> Terms of Service </a> and <a href="#" class="text-primary"> Privacy Policy</a></p>
                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="auth-footer row">
                    
                </div>
            </div>
        </div>
    </div>
  <!-- [ Main Content ] end -->
  <!-- Required Js -->
<script src="{{ asset('dist/assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('dist/assets/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('dist/assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('dist/assets/js/pcoded.js') }}"></script>

  <!-- No password toggle script needed anymore -->

</body>
<!-- [Body] end -->

</html>