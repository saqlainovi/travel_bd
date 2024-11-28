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
            p.duration
        FROM bookings b
        JOIN packages p ON b.package_id = p.id
        WHERE b.user_id = ?
        ORDER BY b.booking_date DESC
    ");
    $stmt->execute([$_SESSION['user_id']]);
    $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error: " . $e->getMessage());
    $bookings = [];
}
?>

<div class="booking-history">
    <h2><i class="fas fa-history"></i> Booking History</h2>

    <div class="booking-filters">
        <div class="filter-group">
            <select id="statusFilter" class="filter-select">
                <option value="">All Statuses</option>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="cancelled">Cancelled</option>
            </select>
            <input type="date" id="dateFilter" class="filter-date">
        </div>
    </div>

    <?php if (empty($bookings)): ?>
        <div class="no-bookings">
            <i class="fas fa-folder-open"></i>
            <p>No booking history found.</p>
        </div>
    <?php else: ?>
        <div class="bookings-table-container">
            <table class="bookings-table">
                <thead>
                    <tr>
                        <th>Package</th>
                        <th>Booking Date</th>
                        <th>Travel Date</th>
                        <th>Persons</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookings as $booking): ?>
                        <tr>
                            <td>
                                <div class="package-info">
                                    <img src="<?= htmlspecialchars($booking['image_url'] ?? 'images/default-package.jpg') ?>" 
                                         alt="<?= htmlspecialchars($booking['title']) ?>">
                                    <div>
                                        <strong><?= htmlspecialchars($booking['title']) ?></strong>
                                        <span><?= htmlspecialchars($booking['tour_type']) ?></span>
                                    </div>
                                </div>
                            </td>
                            <td><?= htmlspecialchars($booking['booking_date']) ?></td>
                            <td><?= htmlspecialchars($booking['travel_date']) ?></td>
                            <td><?= htmlspecialchars($booking['number_of_persons']) ?></td>
                            <td>৳<?= number_format($booking['total_amount'], 2) ?></td>
                            <td><span class="status-badge status-<?= htmlspecialchars($booking['status']) ?>">
                                <?= ucfirst(htmlspecialchars($booking['status'])) ?></span>
                            </td>
                            <td><span class="payment-badge payment-<?= htmlspecialchars($booking['payment_status']) ?>">
                                <?= ucfirst(htmlspecialchars($booking['payment_status'])) ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div> 