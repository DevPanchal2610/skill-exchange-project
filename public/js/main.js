document.addEventListener('DOMContentLoaded', function() {
    // Notification panel toggle
    const notificationIcon = document.querySelector('.notification-icon');
    const notificationPanel = document.getElementById('notificationPanel');

    if (notificationIcon && notificationPanel) {
        notificationIcon.addEventListener('click', function() {
            notificationPanel.classList.toggle('show');
        });

        // Close notification panel when clicking outside
        document.addEventListener('click', function(event) {
            if (!notificationIcon.contains(event.target) && !notificationPanel.contains(event.target)) {
                notificationPanel.classList.remove('show');
            }
        });
    }

    // Skill filtering
    const filterButtons = document.querySelectorAll('.filter-btn');
    const skillItems = document.querySelectorAll('.skill-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');

            skillItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // Handle skill exchange requests
    const requestButtons = document.querySelectorAll('.request-skill-btn');
    requestButtons.forEach(button => {
        button.addEventListener('click', function() {
            const skillItem = this.closest('.skill-item');
            const skillName = skillItem.querySelector('h3').textContent;
            const userName = skillItem.querySelector('.user-name').textContent;
            
            // Show modal or form for skill exchange request
            const userSkill = prompt('What skill would you like to exchange with ' + userName + ' for ' + skillName + '?');
            
            if (userSkill) {
                // In a real application, this would make an API call
                alert(`Request sent to ${userName} to exchange ${userSkill} for ${skillName}`);
                this.textContent = 'Request Sent';
                this.disabled = true;
            }
        });
    });

    // Handle user profile links
    const userLinks = document.querySelectorAll('.user-name');
    userLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Redirect to the actual user profile page using the href
            e.preventDefault();
            window.location.href = this.href;
        });
    });

    // Optional: Add animation when skills come into view
    const observerOptions = {
        threshold: 0.2
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    skillItems.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(20px)';
        item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(item);
    });
});
