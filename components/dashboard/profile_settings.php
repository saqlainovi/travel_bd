<?php
require_once '../../config/db.php';
require_once '../../config/session.php';

try {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error: " . $e->getMessage());
    $user = [];
}
?>

<div class="profile-settings">
    <h2><i class="fas fa-user-cog"></i> Profile Settings</h2>

    <div class="profile-form">
        <form id="profileUpdateForm" action="update_profile.php" method="POST">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" 
                       value="<?= htmlspecialchars($user['first_name'] ?? '') ?>" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" 
                       value="<?= htmlspecialchars($user['last_name'] ?? '') ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" 
                       value="<?= htmlspecialchars($user['email'] ?? '') ?>" required readonly>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" 
                       value="<?= htmlspecialchars($user['phone'] ?? '') ?>">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-update">Update Profile</button>
            </div>
        </form>

        <div class="password-change">
            <h3>Change Password</h3>
            <form id="passwordChangeForm" action="update_password.php" method="POST">
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" id="current_password" name="current_password" required>
                </div>

                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" id="new_password" name="new_password" required>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm New Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-update">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</div> 