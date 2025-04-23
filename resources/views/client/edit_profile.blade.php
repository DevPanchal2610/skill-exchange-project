<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Skill Exchange</title>

    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Your CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        a {
            text-decoration: none;
        }
        .edit-profile-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        .profile-image-preview {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
            border: 3px solid #f0f0f0;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }
        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-primary {
            background: #4a6cf7;
            color: white;
        }
        .btn-secondary {
            background: #f0f0f0;
            color: #333;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <h1>Skill Exchange</h1>
            </div>
            <div class="nav-links">
                <a href="{{ url('/user') }}">Home</a>
                <a href="{{ url('/profile') }}" class="active">Profile</a>
                <a href="{{ url('/request') }}">Request Skill</a>
                <a href="{{ url('/contact') }}">Contact</a>
                <a href="{{ url('/logout') }}" class="auth-btn">Logout</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="edit-profile-container">
            <h2 class="text-center mb-4">Edit Profile</h2>
            
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
            
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group text-center">
                    <img src="{{ asset($user->profile_picture) }}" alt="Profile Picture" class="profile-image-preview" id="profilePreview">
                    <input type="file" name="profile_picture" id="profilePicture" class="form-control" onchange="previewImage()">
                </div>
                
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" readonly style="background-color: #f5f5f5;">
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
                </div>
                
                
                
                <div class="btn-container">
                    <a href="{{ url('/profile') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>About Skill Exchange</h3>
                <p>A platform for skill sharing and learning through exchange</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="{{ url('/user') }}">Home</a></li>
                    <li><a href="{{ url('/profile') }}">Profile</a></li>
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>Email: info@skillexchange.com</p>
                <p>Phone: (123) 456-7890</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Skill Exchange. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function previewImage() {
            const file = document.getElementById('profilePicture').files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profilePreview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>