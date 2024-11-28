<?php
require_once '../../config/db.php';
require_once '../../config/session.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../login.php');
    exit();
}

// Initialize default values
$stats = [
    'total_bookings' => 0,
    'total_spent' => 0,
    'pending_bookings' => 0,
    'confirmed_bookings' => 0
];

try {
    // Get booking statistics
    $stmt = $pdo->prepare("
        SELECT 
            COUNT(*) as total_bookings,
            COALESCE(SUM(total_amount), 0) as total_spent,
            COUNT(CASE WHEN status = 'pending' THEN 1 END) as pending_bookings,
            COUNT(CASE WHEN status = 'confirmed' THEN 1 END) as confirmed_bookings
        FROM bookings 
        WHERE user_id = ?
    ");
    $stmt->execute([$_SESSION['user_id']]);
    $stats = $stmt->fetch(PDO::FETCH_ASSOC);

    // Get recent bookings
    $stmt = $pdo->prepare("
        SELECT 
            b.*, 
            p.title, 
            p.image_url,
            COALESCE(p.image_url, 'images/default-package.jpg') as image_url
        FROM bookings b 
        JOIN packages p ON b.package_id = p.id 
        WHERE b.user_id = ? 
        ORDER BY b.created_at DESC 
        LIMIT 5
    ");
    $stmt->execute([$_SESSION['user_id']]);
    $recent_bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    error_log("Error: " . $e->getMessage());
    $recent_bookings = [];
}
?>

<div class="overview-container">
    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-ticket-alt"></i>
            </div>
            <div class="stat-content">
                <h3>Total Bookings</h3>
                <p><?= htmlspecialchars($stats['total_bookings'] ?? 0) ?></p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <div class="stat-content">
                <h3>Total Spent</h3>
                <p>৳<?= number_format(floatval($stats['total_spent'] ?? 0), 2) ?></p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-content">
                <h3>Pending Bookings</h3>
                <p><?= htmlspecialchars($stats['pending_bookings'] ?? 0) ?></p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-content">
                <h3>Confirmed Bookings</h3>
                <p><?= htmlspecialchars($stats['confirmed_bookings'] ?? 0) ?></p>
            </div>
        </div>
    </div>

    <!-- Recent Bookings -->
    <div class="recent-bookings">
        <h2>Recent Bookings</h2>
        <?php if (empty($recent_bookings)): ?>
            <div class="no-bookings">
                <i class="fas fa-calendar-times"></i>
                <p>No bookings found. Start planning your adventure today!</p>
                <a href="../destinations.php" class="btn-explore">Explore Packages</a>
            </div>
        <?php else: ?>
            <div class="bookings-list">
                <?php foreach ($recent_bookings as $booking): ?>
                    <div class="booking-card">
                        <div class="booking-image">
                            <img src="<?= htmlspecialchars($booking['image_url']) ?>" 
                                 alt="<?= htmlspecialchars($booking['title']) ?>"
                                 onerror="this.src='images/default-package.jpg'">
                        </div>
                        <div class="booking-info">
                            <h3><?= htmlspecialchars($booking['title']) ?></h3>
                            <div class="booking-details">
                                <p><i class="far fa-calendar"></i> Travel Date: <?= htmlspecialchars($booking['travel_date']) ?></p>
                                <p><i class="fas fa-users"></i> Persons: <?= htmlspecialchars($booking['number_of_persons']) ?></p>
                                <p><i class="fas fa-money-bill-wave"></i> Amount: ৳<?= number_format(floatval($booking['total_amount']), 2) ?></p>
                                <p class="booking-status">
                                    <i class="fas fa-info-circle"></i> 
                                    Status: <span class="status-<?= htmlspecialchars($booking['status']) ?>">
                                        <?= ucfirst(htmlspecialchars($booking['status'])) ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div> 