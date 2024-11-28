import { createUserWithEmailAndPassword } from "firebase/auth";
import { auth } from './firebase-config';

// Registration function
async function registerUser(email, password, name) {
    try {
        const userCredential = await createUserWithEmailAndPassword(auth, email, password);
        const user = userCredential.user;
        
        // Store additional user data if needed
        await updateProfile(user, {
            displayName: name
        });

        // Show success message
        alert("Account created successfully!");
        
        // Redirect to dashboard or home page
        window.location.href = "dashboard.php";
        
    } catch (error) {
        // Handle errors
        let errorMessage;
        switch (error.code) {
            case 'auth/email-already-in-use':
                errorMessage = "This email is already registered";
                break;
            case 'auth/invalid-email':
                errorMessage = "Invalid email address";
                break;
            case 'auth/operation-not-allowed':
                errorMessage = "Email/password accounts are not enabled";
                break;
            case 'auth/weak-password':
                errorMessage = "Password should be at least 6 characters";
                break;
            default:
                errorMessage = error.message;
        }
        alert(errorMessage);
    }
} 

// Social login providers
const googleProvider = new firebase.auth.GoogleAuthProvider();
const facebookProvider = new firebase.auth.FacebookAuthProvider();

// Google Sign In
document.getElementById('googleLogin').addEventListener('click', () => {
    auth.signInWithPopup(googleProvider)
        .then((result) => {
            // Handle successful login
            const user = result.user;
            saveUserToDatabase(user);
            window.location.href = 'dashboard.php';
        })
        .catch((error) => {
            showError(error.message);
        });
});

// Facebook Sign In
document.getElementById('facebookLogin').addEventListener('click', () => {
    auth.signInWithPopup(facebookProvider)
        .then((result) => {
            // Handle successful login
            const user = result.user;
            saveUserToDatabase(user);
            window.location.href = 'dashboard.php';
        })
        .catch((error) => {
            showError(error.message);
        });
});

// Save user data to database
function saveUserToDatabase(user) {
    const userData = {
        name: user.displayName,
        email: user.email,
        photoURL: user.photoURL,
        uid: user.uid,
        provider: user.providerData[0].providerId
    };

    // Make API call to save user data
    fetch('api/save_user.php', {
        method: 'POST',
        body: JSON.stringify(userData)
    });
} 