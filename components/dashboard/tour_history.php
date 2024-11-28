<?php
// Get completed tours
$stmt = $pdo->prepare("
    SELECT 
        b.*,
        p.title as package_title,
        p.image_url,
        p.tour_type
    FROM bookings b
    JOIN packages p ON b.package_id = p.id
    WHERE b.user_id = ? 
    AND b.travel_date < CURDATE()
    ORDER BY b.travel_date DESC
");
$stmt->execute([$_SESSION['user_id']]);
$tours = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="tour-history">
    <h2>Tour History</h2>
    <?php if ($tours): ?>
        <?php foreach ($tours as $tour): ?>
            <div class="tour-card">
                <img src="<?php echo htmlspecialchars($tour['image_url']); ?>" alt="Tour Image">
                <div class="tour-info">
                    <h3><?php echo htmlspecialchars($tour['package_title']); ?></h3>
                    <p>Travel Date: <?php echo date('d M Y', strtotime($tour['travel_date'])); ?></p>
                    <p>Status: <?php echo ucfirst($tour['status']); ?></p>
                    <p>Amount: <?php echo number_format($tour['total_amount'], 2); ?> BDT</p>
                    <span class="tour-type"><?php echo htmlspecialchars($tour['tour_type']); ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="no-data">No tour history found.</p>
    <?php endif; ?>
</div> 