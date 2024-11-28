// After successful Firebase login
firebase.auth().onAuthStateChanged((user) => {
    if (user) {
        console.log("Firebase Auth State Changed - User:", user);
        
        // Create a complete user data object
        const userData = {
            firebase_uid: user.uid,
            email: user.email, // This should be 212002082ovi@gmail.com
            name: user.displayName || 'Firebase User',
            provider: 'google',
            created_at: new Date(user.metadata.creationTime).toISOString(),
            last_sign_in: new Date(user.metadata.lastSignInTime).toISOString()
        };

        console.log("Sending user data to backend:", userData);

        fetch('set_firebase_session.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(userData)
        })
        .then(response => {
            console.log("Raw response:", response);
            return response.json();
        })
        .then(data => {
            console.log("Server Response:", data);
            if (data.success) {
                window.location.href = 'profile.php';
            } else {
                alert('Failed to sync user data: ' + (data.error || 'Unknown error'));
                console.error('Sync Error:', data);
            }
        })
        .catch(error => {
            console.error('Fetch Error:', error);
            alert('Error syncing user data: ' + error.message);
        });
    } else {
        console.log("User is signed out");
    }
}); 