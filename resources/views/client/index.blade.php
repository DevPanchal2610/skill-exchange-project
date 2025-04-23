<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Exchange - Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <h1>Skill Exchange</h1>
            </div>
            <div class="nav-links">
                <a href="{{ url('/user') }}" class="active">Home</a>
                <a href="{{ url('/profile') }}">Profile</a>
                <a href="{{ url('/request') }}">Request Skill</a>
                <a href="{{ url('/contact') }}">Contact</a>
                <a href="{{ url('/logout') }}" class="auth-btn">Logout</a>
            </div>
            {{-- <div class="notification-icon">
                <i class="fas fa-bell"></i>
                <span class="notification-count">0</span>
            </div> --}}
        </nav>
    </header>

    {{-- <div class="notification-panel" id="notificationPanel">
        <h3>Notifications</h3>
        <div class="notification-list">
            <!-- Notifications will be dynamically added here -->
        </div>
    </div> --}}

    <main>
        <section class="hero">
            <h1>Exchange Skills, Grow Together</h1>
            <p>Connect with talented individuals and exchange skills to learn and grow</p>
        </section>

        <section class="featured-skills">
            <div class="section-header">
                <h2>Featured Skills</h2>
                <div class="skill-filters">
    <button class="filter-btn active" data-filter="all">All</button>
                    <button class="filter-btn" data-filter="art">Art</button>
                    <button class="filter-btn" data-filter="Programming">Programming</button>
                    <button class="filter-btn" data-filter="Design">Design</button>
                    <button class="filter-btn" data-filter="Marketing">Marketing</button>
                    <button class="filter-btn" data-filter="Writing">Writing</button>
                    <button class="filter-btn" data-filter="Carpentry">Carpentry</button>
                    <button class="filter-btn" data-filter="Other">Other</button>

</div>
            </div>

            <div class="skills-masonry">

                @foreach ($data as $item)
                    @if ($item->user->id !== auth()->user()->id)
                        <div class="skill-item" data-category="{{ $item->skill_category }}">
                            <div class="skill-image">
                                <img src="{{ asset($item->skill_image) }}" alt="{{$item->skill_name}}" class="skill-main-image">
                                {{-- <img src="{{assert('$item->skill_image')}}" alt="Oil Painting" class="skill-main-image"> --}}
                                <div class="skill-overlay">
                                    <div class="skill-user">
                                        <img src="{{ asset($item->user->profile_picture) }}" alt="{{$item->user->name}}" class="user-avatar">
                                        <a href="{{ url('/see_user/' . $item->user->id) }}" class="user-name">{{$item->user->name}}
                                    </div>
                                    <h3>{{$item->skill_name}}</h3>
                                    <p>{{$item->description}}</p>
                                </a>
                                   
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
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

    <script src="js/main.js"></script>
</body>
</html>
