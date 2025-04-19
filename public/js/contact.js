document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                subject: document.getElementById('subject').value,
                message: document.getElementById('message').value
            };

            // In a real application, this would make an API call
            console.log('Contact form submission:', formData);
            alert('Thank you for your message! We will get back to you soon.');
            contactForm.reset();
        });
    }
});
