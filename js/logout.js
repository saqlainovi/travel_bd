import { auth } from '../config/firebase-config.js';
import { signOut } from "https://www.gstatic.com/firebasejs/10.7.0/firebase-auth.js";

async function logout() {
    try {
        await signOut(auth);
        // Clear session on server
        await fetch('logout.php');
        window.location.href = 'login.php';
    } catch (error) {
        console.error('Logout error:', error);
    }
}

document.querySelector('.logout').addEventListener('click', logout); 