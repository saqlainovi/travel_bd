import { onAuthStateChanged } from "firebase/auth";
import { auth } from './firebase-config';

// Add this to monitor auth state changes
onAuthStateChanged(auth, (user) => {
    if (user) {
        // User is signed in
        console.log("User is signed in:", user);
        // You can update UI elements here
        document.getElementById('userEmail').textContent = user.email;
    } else {
        // User is signed out
        console.log("User is signed out");
        // Update UI for signed out state
    }
}); 