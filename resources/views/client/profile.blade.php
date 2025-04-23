<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Skill Exchange</title>

    <!-- ✅ SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Your CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- ✅ SweetAlert2 JS - Must come BEFORE any SweetAlert usage -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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

    <main class="profile-container">
        <section class="profile-header">
            <div class="profile-image">
                <img src="{{ asset($user->profile_picture) }}" alt="Profile Picture">
            </div>
            <div class="profile-info">
                <h2>{{ $user->name }}</h2>
                <p class="profile-email">{{ $user->email }}</p>
                <p class="profile-phone">{{ $user->phone }}</p>
            </div>
            <div class="text-center mt-4">
                <a href="{{ url('/profile/edit') }}" class="btn btn-primary">Edit Profile</a>
            </div>
        </section>

        <section class="profile-skills">
            <h3>My Skills</h3>
            <div class="skills-grid">
                @foreach ($user->skills as $skill)
                    <div class="skill-card">
                        <img src="{{ asset($skill->skill_image) }}" alt="{{ $skill->skill_name }}">
                        <h3>{{ $skill->skill_name }}</h3>
                        <p class="skill-owner">{{ $skill->description }}</p>
                    </div>
                @endforeach
            </div>
            <div class="text-center my-4 mb-4">
                <a href="{{ url('/sk') }}" class="btn btn-primary me-2">Add Skill</a>
                <a href="{{ url('/user') }}" class="btn btn-primary">Back</a>
            </div>
            <br>
            <!-- Skill Assignments Table -->
            <h3 class="mt-4">Skill Assignments</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Assigned By</th>
                            <th>Skill Name</th>
                            <th>User Skill Name</th>
                            <th>Date Assigned</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $assignment)
                            <tr>
                                <td>{{ $assignment->assigner->id == auth()->user()->id ? $assignment->assignedUser->name : $assignment->assigner->name }}</td>
                                <td>{{ $assignment->skill->skill_name }}</td>
                                <td>{{ $assignment->userSkill->skill_name }}</td>
                                <td>{{ $assignment->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        

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

    <script src="{{ asset('js/profile.js') }}"></script>
    <!-- ✅ SweetAlert Trigger Script (AFTER DOM is loaded) -->
    @if(session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    title: @json(session('success')),
                    icon: "success",
                    showConfirmButton: false,
                    timer: 5000
                });
            });
        </script>
    @endif
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <style>
            a {
                text-decoration: none;
            }
            /* Add these new styles */
            .table {
                width: 100%;
                margin-top: 20px;
                border-collapse: collapse;
            }
            .table th,
            .table td {
                padding: 12px;
                border: 1px solid #dee2e6;
                text-align: left;
            }
            .table thead th {
                background-color: #f8f9fa;
                border-bottom: 2px solid #dee2e6;
            }
            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            .badge {
                padding: 5px 10px;
                border-radius: 4px;
                font-size: 12px;
                font-weight: 500;
                color: white;
            }
            .bg-success {
                background-color: #28a745;
            }
            .bg-warning {
                background-color: #ffc107;
            }
        </style>
</body>

</html>