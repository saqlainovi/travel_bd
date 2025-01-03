<?php namespace ProcessWire; ?>

<section class="travel-spot-container">
    <h1><?= $sectionTitle ?></h1>
    <div class="card-container">
        <?php foreach($destinations as $dest): ?>
            <div class="travel-card">
                <img src="<?= $dest['image'] ?>" alt="<?= $dest['title'] ?>" class="card-image">
                <div class="card-content">
                    <h3><?= $dest['title'] ?></h3>
                    <p><?= $dest['description'] ?></p>
                    <button onclick="window.location.href='<?= $dest['link'] ?>'">Learn More</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section> 