<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Skill Exchange</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ✅ SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Your CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- ✅ SweetAlert2 JS - Must come BEFORE any SweetAlert usage -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
       a {
        text-decoration: none;
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
                <a href="{{ asset('index.html') }}">Home</a>
                <a href="{{ asset('profile.html') }}" class="active">Profile</a>
                <a href="{{ url('/request') }}">Request Skill</a>
                <a href="{{ asset('contact.html') }}">Contact</a>
                <a href="{{ url('/logout') }}" class="auth-btn">Logout</a>
            </div>
            {{-- <div class="notification-icon">
                <i class="fas fa-bell"></i>
                <span class="notification-count">2</span>
            </div> --}}
        </nav>
    </header>

    {{-- <div class="notification-panel" id="notificationPanel">
        <h3>Notifications</h3>
        <div class="notification-list">
            <div class="notification-item">
                <p>John Doe wants to exchange Painting skills with your Web Development skills</p>
                <div class="notification-actions">
                    <button class="btn-accept">Accept</button>
                    <button class="btn-reject">Reject</button>
                </div>
            </div>
            <div class="notification-item">
                <p>Your skill exchange request with Jane Smith was accepted!</p>
                <div class="notification-actions">
                    <button class="btn-dismiss">Dismiss</button>
                </div>
            </div>
        </div>
    </div> --}}

    <main class="container my-5">
    <h2 class="mb-4">My Skill Requests</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Assigner Name</th>
                <th>Requested Skill</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($requests as $i => $request)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $request->user ? $request->user->name : '-' }}</td>
                <td>{{ $request->skill ? $request->skill->skill_name : '-' }}</td>
                <td>
                    <a href="#" class="btn btn-success w-25 btn-sm me-1 exchange-btn" data-request-id="{{ $request->request_id }}">Exchange</a>
                   | <a href="#" class="btn btn-danger w-25 btn-sm">Reject</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No requests found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</main>

    <footer>
        <div class="footer-bottom">
            <p>&copy; 2025 Skill Exchange. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('js/profile.js') }}"></script>
    <!-- ✅ SweetAlert Trigger Script (AFTER DOM is loaded) -->
    @if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                title: @json(session('success')),
                icon: "success",
                showConfirmButton: false,
                timer: 2000
            });
        });
    </script>
    @endif
</body>
</html>
