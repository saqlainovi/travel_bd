<?php
require_once '../../config/db.php';
require_once '../../config/session.php';

try {
    $stmt = $pdo->prepare("
        SELECT 
            b.*,
            p.title,
            p.image_url,
            p.tour_type,
            p.duration,
            p.included_features
        FROM bookings b
        JOIN packages p ON b.package_id = p.id
        WHERE b.user_id = ? 
        AND b.travel_date >= CURDATE()
        AND b.status != 'cancelled'
        ORDER BY b.travel_date ASC
    ");
    $stmt->execute([$_SESSION['user_id']]);
    $upcoming_tours = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error: " . $e->getMessage());
    $upcoming_tours = [];
}
?>

<div class="upcoming-tours">
    <h2><i class="fas fa-plane-departure"></i> Upcoming Tours</h2>

    <?php if (empty($upcoming_tours)): ?>
        <div class="no-tours">
            <i class="fas fa-calendar-times"></i>
            <p>No upcoming tours found. Ready to plan your next adventure?</p>
            <a href="../destinations.php" class="btn-explore">Explore Packages</a>
        </div>
    <?php else: ?>
        <div class="tours-grid">
            <?php foreach ($upcoming_tours as $tour): ?>
                <div class="tour-card">
                    <div class="tour-image">
                        <img src="<?= htmlspecialchars($tour['image_url'] ?? 'images/default-package.jpg') ?>" 
                             alt="<?= htmlspecialchars($tour['title']) ?>">
                        <span class="tour-type"><?= htmlspecialchars($tour['tour_type']) ?></span>
                    </div>
                    <div class="tour-details">
                        <h3><?= htmlspecialchars($tour['title']) ?></h3>
                        <div class="tour-info">
                            <p><i class="far fa-calendar"></i> Travel Date: <?= htmlspecialchars($tour['travel_date']) ?></p>
                            <p><i class="fas fa-clock"></i> Duration: <?= htmlspecialchars($tour['duration']) ?></p>
                            <p><i class="fas fa-users"></i> Persons: <?= htmlspecialchars($tour['number_of_persons']) ?></p>
                            <p><i class="fas fa-money-bill-wave"></i> Total: ৳<?= number_format($tour['total_amount'], 2) ?></p>
                        </div>
                        <div class="tour-status">
                            <span class="status-badge status-<?= htmlspecialchars($tour['status']) ?>">
                                <?= ucfirst(htmlspecialchars($tour['status'])) ?>
                            </span>
                            <span class="payment-badge payment-<?= htmlspecialchars($tour['payment_status']) ?>">
                                Payment: <?= ucfirst(htmlspecialchars($tour['payment_status'])) ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div> 