<?php
session_start();
require_once '../config/db.php';

header('Content-Type: application/json');

try {
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (!isset($data['email']) || !isset($data['token'])) {
        throw new Exception('Invalid data received');
    }

    // Store Google user data in session
    $_SESSION['user_id'] = $data['token'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['google_user'] = [
        'name' => $data['name'] ?? 'User',
        'email' => $data['email'],
        'picture' => $data['picture'] ?? null
    ];

    // You might want to store or update user in database
    try {
        $stmt = $pdo->prepare("
            INSERT INTO users (email, first_name, last_name, auth_provider) 
            VALUES (?, ?, ?, 'google')
            ON DUPLICATE KEY UPDATE 
            last_login = CURRENT_TIMESTAMP
        ");
        
        $names = explode(' ', $data['name'] ?? 'User');
        $firstName = $names[0];
        $lastName = isset($names[1]) ? $names[1] : '';
        
        $stmt->execute([$data['email'], $firstName, $lastName]);
    } catch (PDOException $e) {
        // Log error but don't stop the auth process
        error_log($e->getMessage());
    }
    
    echo json_encode([
        'success' => true,
        'message' => 'Authentication successful'
    ]);

} catch (Exception $e) {
    http_response_code(401);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?> 