<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <a href="{{ asset('/user') }}">Home</a>
                <a href="{{ asset('/profile') }}" class="active">Profile</a>
                <a href="{{ url('/request') }}">Request Skill</a>
                <a href="{{ asset('/contact') }}">Contact</a>
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
                    <a href="#" class="btn btn-success w-25 btn-sm me-1 exchange-btn" data-request-id="{{ $request->request_id }}" data-user-id="{{ $request->user_id }}" data-skill-id="{{ $request->skill_id }}">Exchange</a>
                   | <a href="#" class="btn btn-danger w-25 btn-sm reject-btn" data-request-id="{{ $request->request_id }}">Reject</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No requests found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Skill Exchange Modal -->
    <div class="modal fade" id="exchangeModal" tabindex="-1" aria-labelledby="exchangeModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exchangeModalLabel">Select Skill to Exchange</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="exchangeForm">
              <div class="mb-3">
                <label for="userSkillDropdown" class="form-label">Select one of your skills to exchange:</label>
                <select class="form-select" id="userSkillDropdown" name="user_skill_id" required>
                  <option value="">Loading...</option>
                </select>
              </div>
              <input type="hidden" id="exchange_request_id" name="request_id">
              <input type="hidden" id="exchange_skill_id" name="skill_id">
              <button type="submit" class="btn btn-primary">Exchange</button>
            </form>
          </div>
        </div>
      </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/profile.js') }}"></script>
    <script>
    // Reject button AJAX handler
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.reject-btn').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const requestId = this.getAttribute('data-request-id');
                const row = this.closest('tr');
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to reject and remove this request?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, reject it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/request/${requestId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json',
                            },
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                row.remove();
                                Swal.fire('Rejected!', data.message || 'Request removed.', 'success');
                            } else {
                                Swal.fire('Error', data.message || 'Failed to remove request.', 'error');
                            }
                        })
                        .catch(() => {
                            Swal.fire('Error', 'Something went wrong.', 'error');
                        });
                    }
                });
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
        let exchangeModal = new bootstrap.Modal(document.getElementById('exchangeModal'));
        let userSkillDropdown = document.getElementById('userSkillDropdown');
        let exchangeForm = document.getElementById('exchangeForm');
        let exchangeRequestId = document.getElementById('exchange_request_id');
        let exchangeSkillId = document.getElementById('exchange_skill_id');

        // When Exchange button is clicked
        document.querySelectorAll('.exchange-btn').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                let requestId = this.getAttribute('data-request-id');
                let userId = this.getAttribute('data-user-id');
                let skillId = this.getAttribute('data-skill-id');

                // Set hidden fields
                exchangeRequestId.value = requestId;
                exchangeSkillId.value = skillId;

                // Fetch user's skills for the dropdown
                userSkillDropdown.innerHTML = '<option value="">Loading...</option>';
                fetch(`/user/${userId}/skills`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.success && data.skills.length > 0) {
                            userSkillDropdown.innerHTML = '<option value="">Select Skill</option>' +
                                data.skills.map(skill => `<option value="${skill.skill_id}">${skill.skill_name}</option>`).join('');
                        } else {
                            userSkillDropdown.innerHTML = '<option value="">No skills found</option>';
                        }
                    });
                exchangeModal.show();
            });
        });

        // Handle form submission
        exchangeForm.addEventListener('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(exchangeForm);
            fetch('/assign_skill', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    exchangeModal.hide();
                    Swal.fire({
                        title: 'Success!',
                        text: data.message || 'Skills exchanged successfully!',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    // Remove the request row from the table
                    const row = document.querySelector(`.exchange-btn[data-request-id='${exchangeRequestId.value}']`).closest('tr');
                    if (row) row.remove();
                } else {
                    Swal.fire('Error', data.message || 'Could not exchange skills.', 'error');
                }
            })
            .catch(() => {
                Swal.fire('Error', 'Something went wrong.', 'error');
            });
        });
    });
    </script>
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
