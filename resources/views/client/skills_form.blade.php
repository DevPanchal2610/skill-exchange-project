{{-- @extends('admin.AdminLayout.header') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Skills</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('dist/assets/images/image.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
    <link rel="stylesheet" href="{{ asset('dist/assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/fonts/material.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('dist/assets/css/style-preset.css') }}">
</head>
<body>
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
                        <form action="{{ route('skills.store') }}" method="POST" enctype="multipart/form-data" id="skillsForm">
                            @csrf
                            <div class="d-flex justify-content-between align-items-end mb-4">
                                <h3 class="mb-0"><b>Add Your Skills</b></h3>
                                <a href="/user/demo" class="link-primary">Skip for now</a>
                            </div>
                            <div id="skillsRepeater">
                                <div class="skill-entry mb-4 border p-3 rounded">
                                    <div class="mb-3">
                                        <label class="form-label">Skill Name*</label>
                                        <input type="text" name="skills[0][skill_name]" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description*</label>
                                        <textarea name="skills[0][description]" class="form-control" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Skill Category*</label>
                                        <select name="skills[0][skill_category]" class="form-select" required>
                                            <option value="">Select Category</option>
                                            <option value="Programming">Programming</option>
                                            <option value="Design">Design</option>
                                            <option value="Marketing">Marketing</option>
                                            <option value="Writing">Writing</option>
                                            <option value="Carpentry">Carpentry</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Skill Image</label>
                                        <input type="file" name="skills[0][skill_image]" class="form-control">
                                    </div>
                                    <button type="button" class="btn btn-danger remove-skill d-none">Remove</button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary mb-3" id="addSkill">Add Another Skill</button>
                            <button type="submit" class="btn btn-primary">Submit Skills</button>
                        </form>
                    </div>
                </div>
                <div class="auth-footer row">
                </div>
            </div>
        </div>
    </div>
    <script>
        let skillIndex = 1;
        document.getElementById('addSkill').onclick = function() {
            const repeater = document.getElementById('skillsRepeater');
            const entry = repeater.firstElementChild.cloneNode(true);
            entry.querySelectorAll('input, textarea, select').forEach(function(input) {
                const name = input.getAttribute('name');
                if (name) {
                    input.setAttribute('name', name.replace(/\d+/, skillIndex));
                    if (input.type !== 'file') input.value = '';
                }
            });
            entry.querySelector('.remove-skill').classList.remove('d-none');
            repeater.appendChild(entry);
            skillIndex++;
        };
        document.getElementById('skillsRepeater').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-skill')) {
                e.target.closest('.skill-entry').remove();
            }
        });
    </script>
    <script src="{{ asset('dist/assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/pcoded.js') }}"></script>
</body>
</html>

