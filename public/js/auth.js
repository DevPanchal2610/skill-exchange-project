document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // In a real application, this would make an API call
            console.log('Login attempt:', { email, password });
            alert('Login successful! Redirecting to profile...');
            window.location.href = 'profile.html';
        });
    }

    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = {
                fullName: document.getElementById('fullName').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                skills: document.getElementById('skills').value,
                password: document.getElementById('password').value,
                confirmPassword: document.getElementById('confirmPassword').value
            };

            if (formData.password !== formData.confirmPassword) {
                alert('Passwords do not match!');
                return;
            }

            // In a real application, this would make an API call
            console.log('Registration data:', formData);
            alert('Registration successful! Please login.');
            window.location.href = 'login.html';
        });
    }
});
