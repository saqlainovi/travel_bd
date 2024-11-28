<?php
require_once '../../config/db.php';
require_once '../../config/session.php';

try {
    // Get payment statistics
    $stmt = $pdo->prepare("
        SELECT 
            COUNT(*) as total_transactions,
            SUM(CASE WHEN payment_status = 'completed' THEN total_amount ELSE 0 END) as total_paid,
            SUM(CASE WHEN payment_status = 'pending' THEN total_amount ELSE 0 END) as total_pending,
            COUNT(CASE WHEN payment_status = 'completed' THEN 1 END) as completed_payments,
            COUNT(CASE WHEN payment_status = 'pending' THEN 1 END) as pending_payments
        FROM bookings 
        WHERE user_id = ?
    ");
    $stmt->execute([$_SESSION['user_id']]);
    $payment_stats = $stmt->fetch(PDO::FETCH_ASSOC);

    // Get recent payments
    $stmt = $pdo->prepare("
        SELECT b.*, p.title
        FROM bookings b
        JOIN packages p ON b.package_id = p.id
        WHERE b.user_id = ?
        ORDER BY b.created_at DESC
        LIMIT 5
    ");
    $stmt->execute([$_SESSION['user_id']]);
    $recent_payments = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error: " . $e->getMessage());
    $payment_stats = [];
    $recent_payments = [];
}
?>

<div class="payment-info">
    <h2><i class="fas fa-credit-card"></i> Payment Information</h2>

    <div class="payment-stats">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <div class="stat-content">
                <h3>Total Paid</h3>
                <p>৳<?= number_format($payment_stats['total_paid'] ?? 0, 2) ?></p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-content">
                <h3>Pending Amount</h3>
                <p>৳<?= number_format($payment_stats['total_pending'] ?? 0, 2) ?></p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-content">
                <h3>Completed Payments</h3>
                <p><?= $payment_stats['completed_payments'] ?? 0 ?></p>
            </div>
        </div>
    </div>

    <div class="recent-payments">
        <h3>Recent Payments</h3>
        <?php if (empty($recent_payments)): ?>
            <div class="no-payments">
                <i class="fas fa-receipt"></i>
                <p>No payment history found.</p>
            </div>
        <?php else: ?>
            <div class="payments-table-container">
                <table class="payments-table">
                    <thead>
                        <tr>
                            <th>Package</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recent_payments as $payment): ?>
                            <tr>
                                <td><?= htmlspecialchars($payment['title']) ?></td>
                                <td><?= htmlspecialchars($payment['created_at']) ?></td>
                                <td>৳<?= number_format($payment['total_amount'], 2) ?></td>
                                <td>
                                    <span class="payment-badge payment-<?= htmlspecialchars($payment['payment_status']) ?>">
                                        <?= ucfirst(htmlspecialchars($payment['payment_status'])) ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div> 