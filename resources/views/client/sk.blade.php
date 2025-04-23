<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Skills - Skill Exchange</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
        .btn-container {
            display: flex;
            gap: 1rem;
            justify-content: space-between;
            margin-top: 2rem;
        }
        .btn, .btn-primary, .btn-secondary, .btn-outline-secondary, .btn-danger {
            padding: 0.25rem 0.75rem;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.875rem;
            transition: background 0.2s, color 0.2s, border 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(60,72,88,0.07);
            margin-bottom: 0;
            outline: none;
        }
        .btn-primary {
            background: #4a6cf7;
            color: #fff;
            border: 1px solid #4a6cf7;
        }
        .btn-primary:hover, .btn-primary:focus {
            background: #274bb6;
            border-color: #274bb6;
            color: #fff;
        }
        .btn-secondary {
            background: #f0f0f0;
            color: #333;
            border: 1px solid #ddd;
        }
        .btn-secondary:hover, .btn-secondary:focus {
            background: #e2e6ea;
            color: #222;
            border-color: #bbb;
        }
        .btn-outline-secondary {
            background: #fff;
            color: #333;
            border: 1px solid #4a6cf7;
        }
        .btn-outline-secondary:hover, .btn-outline-secondary:focus {
            background: #4a6cf7;
            color: #fff;
            border-color: #4a6cf7;
        }
        .btn-danger {
            background: #e74c3c;
            color: #fff;
            border: 1px solid #e74c3c;
        }
        .btn-danger:hover, .btn-danger:focus {
            background: #c0392b;
            border-color: #c0392b;
            color: #fff;
        }
        .btn:active {
            box-shadow: 0 0 0 2px #4a6cf733;
        }

        /* Remove margin-bottom from button HTML, use CSS for spacing */
        .btn-container > .btn,
        .btn-container > a.btn {
            margin-bottom: 0 !important;
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
                <a href="{{ url('/profile') }}">Profile</a>
                <a href="{{ url('/request') }}">Request Skill</a>
                <a href="{{ url('/contact') }}">Contact</a>
                <a href="{{ url('/logout') }}" class="auth-btn">Logout</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="form-section">
    <div class="edit-profile-container">
        <h2 class="text-center mb-4">Add Your Skills</h2>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('skills.store') }}" method="POST" enctype="multipart/form-data" id="skillsForm">
            @csrf
            <div id="skillsRepeater">
                <div class="skill-entry">
                    <div class="form-group">
                        <label class="form-label">Skill Name*</label>
                        <input type="text" name="skills[0][skill_name]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description*</label>
                        <textarea name="skills[0][description]" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Skill Category*</label>
                        <select name="skills[0][skill_category]" class="form-control" required>
                            <option value="">Select Category</option>
                            <option value="Programming">Programming</option>
                            <option value="Design">Design</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Writing">Writing</option>
                            <option value="Carpentry">Carpentry</option>
                            <option value="art">Art</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Skill Image</label>
                        <input type="file" name="skills[0][skill_image]" class="form-control">
                    </div>
                    <button type="button" class="btn btn-danger remove-skill">Remove</button>
                </div>
            </div>
            <div class="btn-container">
                <button type="button" class="btn btn-secondary mb-3" id="addSkill">Add Another Skill</button>
                <button type="submit" class="btn btn-primary mb-3">Submit Skills</button>
                <a href="{{ url('/profile') }}" class="btn btn-outline-secondary mb-3">Back</a>
            </div>
        </form>
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

    <script>
    let skillIndex = 1;
    const repeater = document.getElementById('skillsRepeater');
    const addSkillBtn = document.getElementById('addSkill');

    // Ensure only the first entry hides its remove button
    function updateRemoveButtons() {
        const entries = repeater.querySelectorAll('.skill-entry');
        entries.forEach((entry, idx) => {
            const removeBtn = entry.querySelector('.remove-skill');
            if (idx === 0) {
                removeBtn.style.display = 'none';
            } else {
                removeBtn.style.display = '';
            }
        });
    }

    // Initial state
    updateRemoveButtons();

    addSkillBtn.addEventListener('click', function () {
        const entry = repeater.firstElementChild.cloneNode(true);
        entry.querySelectorAll('input, textarea, select').forEach(function (input) {
            const name = input.getAttribute('name');
            if (name) {
                input.setAttribute('name', name.replace(/\d+/, skillIndex));
                if (input.type !== 'file') input.value = '';
            }
        });
        repeater.appendChild(entry);
        skillIndex++;
        updateRemoveButtons();
    });

    repeater.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-skill')) {
            e.target.closest('.skill-entry').remove();
            updateRemoveButtons();
        }
    });
</script>

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
