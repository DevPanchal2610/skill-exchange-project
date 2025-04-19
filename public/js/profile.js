document.addEventListener('DOMContentLoaded', function() {
    // Handle notification actions
    const notificationActions = document.querySelectorAll('.notification-actions button');
    notificationActions.forEach(button => {
        button.addEventListener('click', function() {
            const notificationItem = this.closest('.notification-item');
            const action = this.classList.contains('btn-accept') ? 'accepted' : 
                          this.classList.contains('btn-reject') ? 'rejected' : 'dismissed';

            // In a real application, this would make an API call
            console.log(`Notification ${action}`);
            notificationItem.remove();

            // Update notification count
            const count = document.querySelector('.notification-count');
            count.textContent = parseInt(count.textContent) - 1;
        });
    });

    // Handle profile picture upload
    const editProfilePic = document.querySelector('.edit-profile-pic');
    if (editProfilePic) {
        editProfilePic.addEventListener('click', function() {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            
            input.onchange = function(e) {
                const file = e.target.files[0];
                if (file) {
                    // In a real application, this would upload the file to a server
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        document.querySelector('.profile-image img').src = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            };

            input.click();
        });
    }

    // Handle add new skill
    const addSkillBtn = document.querySelector('.btn-add-skill');
    if (addSkillBtn) {
        addSkillBtn.addEventListener('click', function() {
            const skillName = prompt('Enter your new skill:');
            if (skillName) {
                const skillDescription = prompt('Enter a brief description of your skill:');
                if (skillDescription) {
                    // In a real application, this would make an API call
                    const skillsGrid = document.querySelector('.skills-grid');
                    const newSkill = document.createElement('div');
                    newSkill.className = 'skill-card';
                    newSkill.innerHTML = `
                        <img src="https://via.placeholder.com/150" alt="${skillName}">
                        <h3>${skillName}</h3>
                        <p class="skill-description">${skillDescription}</p>
                        <button class="btn-edit">Edit</button>
                    `;
                    skillsGrid.appendChild(newSkill);
                }
            }
        });
    }

    // Handle review buttons
    const reviewButtons = document.querySelectorAll('.btn-review');
    reviewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const exchangeItem = this.closest('.exchange-item');
            const exchangeTitle = exchangeItem.querySelector('h4').textContent;
            const rating = prompt(`Rate your experience with ${exchangeTitle} (1-5 stars):`);
            const review = prompt('Write your review:');
            
            if (rating && review) {
                // In a real application, this would make an API call
                console.log('Review submitted:', { exchangeTitle, rating, review });
                alert('Thank you for your review!');
                this.textContent = 'Reviewed';
                this.disabled = true;
            }
        });
    });
});
