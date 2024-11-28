// Place this in your main JavaScript file or script tag
firebase.auth().onAuthStateChanged((user) => {
    if (user) {
        // Get Firebase user data
        const userData = {
            firebase_uid: user.uid,
            email: user.email,
            first_name: user.displayName ? user.displayName.split(' ')[0] : '',
            last_name: user.displayName ? user.displayName.split(' ')[1] || '' : '',
            photo_url: user.photoURL || '',
            provider: user.providerData[0].providerId
        };

        // Send to your backend
        saveUserToDatabase(userData);
    }
});

function saveUserToDatabase(userData) {
    fetch('firebase_auth_handler.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(userData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Redirect to dashboard or reload page
            window.location.href = 'dashboard.php';
        } else {
            console.error('Error:', data.message);
        }
    })
    .catch(error => console.error('Error:', error));
} 