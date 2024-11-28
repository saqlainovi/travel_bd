import { auth } from '../config/firebase-config';
import { 
    createUserWithEmailAndPassword,
    signInWithEmailAndPassword,
    onAuthStateChanged,
    signOut 
} from "firebase/auth";

// Sign up new users
export const signUp = async (email, password) => {
    try {
        const userCredential = await createUserWithEmailAndPassword(auth, email, password);
        return userCredential.user;
    } catch (error) {
        throw error;
    }
};

// Sign in existing users
export const signIn = async (email, password) => {
    try {
        const userCredential = await signInWithEmailAndPassword(auth, email, password);
        return userCredential.user;
    } catch (error) {
        throw error;
    }
};

// Sign out
export const logOut = async () => {
    try {
        await signOut(auth);
    } catch (error) {
        throw error;
    }
};

// Auth state observer
export const onAuthStateChange = (callback) => {
    return onAuthStateChanged(auth, callback);
}; 