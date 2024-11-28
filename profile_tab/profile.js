// Tab switching and Profile editing logic
document.addEventListener('DOMContentLoaded', function () {
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    const editProfileBtn = document.getElementById('edit-profile-btn');
    const profileForm = document.getElementById('profile-form');
    const profileDetails = document.getElementById('profile-details');
    const saveProfileBtn = document.getElementById('save-profile-btn');
    
    // Load existing user info from localStorage or set defaults
    const userData = {
        name: localStorage.getItem('userName') || 'John Doe',
        email: localStorage.getItem('userEmail') || 'johndoe@example.com',
        phone: localStorage.getItem('userPhone') || '+1-555-555-5555'
    };
    
    // Update the profile section with existing data
    document.getElementById('user-name').textContent = userData.name;
    document.getElementById('user-email').textContent = userData.email;
    document.getElementById('user-phone').textContent = userData.phone;
    
    // Tab switching logic
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const tabId = button.getAttribute('data-tab');
            
            // Remove active class from all tabs and buttons
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(tab => tab.classList.remove('active'));

            // Add active class to clicked button and corresponding tab
            button.classList.add('active');
            document.getElementById(tabId).classList.add('active');
        });
    });

    // Show the profile edit form when the Edit Profile button is clicked
    editProfileBtn.addEventListener('click', () => {
        profileDetails.style.display = 'none';
        profileForm.style.display = 'block';

        // Pre-fill the form with existing user data
        document.getElementById('profile-name').value = userData.name;
        document.getElementById('profile-email').value = userData.email;
        document.getElementById('profile-phone').value = userData.phone;
    });

    // Save the updated profile data when Save Changes button is clicked
    saveProfileBtn.addEventListener('click', () => {
        // Get new values from the form
        const newName = document.getElementById('profile-name').value;
        const newEmail = document.getElementById('profile-email').value;
        const newPhone = document.getElementById('profile-phone').value;

        // Update user data object
        userData.name = newName;
        userData.email = newEmail;
        userData.phone = newPhone;

        // Update the profile details section with the new data
        document.getElementById('user-name').textContent = newName;
        document.getElementById('user-email').textContent = newEmail;
        document.getElementById('user-phone').textContent = newPhone;

        // Save new data to localStorage
        localStorage.setItem('userName', newName);
        localStorage.setItem('userEmail', newEmail);
        localStorage.setItem('userPhone', newPhone);

        // Hide the form and show the updated profile details
        profileForm.style.display = 'none';
        profileDetails.style.display = 'block';

        // Show success message
        alert('Profile updated successfully!');
    });
});
