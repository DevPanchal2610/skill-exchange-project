<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Skill Exchange</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                <a href="{{ url('/contact') }}" class="active">Contact</a>
                <a href="{{ url('/logout') }}" class="auth-btn">Logout</a>
                {{-- <a href="{{ url('/register') }}" class="auth-btn">Register</a> --}}
            </div>
        </nav>
    </header>

    <main class="contact-container">
        <section class="contact-header">
            <h2>Contact Us</h2>
            <p>Have questions? We'd love to hear from you!</p>
        </section>

        <section class="contact-content">
            <div class="contact-info">
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <h3>Address</h3>
                        <p>123 Skill Street, Exchange City, 12345</p>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <div>
                        <h3>Phone</h3>
                        <p>(123) 456-7890</p>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h3>Email</h3>
                        <p>info@skillexchange.com</p>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <h3>Send us a message</h3>
                <form id="contactForm" action="/contact" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn-primary">Send Message</button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-bottom">
            <p>&copy; 2025 Skill Exchange. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/contact.js') }}"></script>
</body>
</html>
