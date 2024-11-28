import { signIn } from './auth/authHandler';

const loginForm = document.getElementById('loginForm');

loginForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    
    try {
        const user = await signIn(email, password);
        // Redirect or update UI on successful login
        window.location.href = '/dashboard.html';
    } catch (error) {
        // Handle errors (show error message to user)
        console.error(error.message);
    }
}); 