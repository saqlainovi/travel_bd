<?php
// Remove session_start() if it exists here
?>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand" href="/travel-website-main/index.php">BD Adventures</a>
        
        <!-- Offcanvas Trigger -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas" aria-controls="navbarOffcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Offcanvas -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvas" aria-labelledby="navbarOffcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="navbarOffcanvasLabel">BD Adventures</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            
            <div class="offcanvas-body">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>" href="/travel-website-main/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'about_us.php') ? 'active' : ''; ?>" href="/travel-website-main/about_us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'destination.php') ? 'active' : ''; ?>" href="/travel-website-main/destination.php">Destinations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'contact_us.php') ? 'active' : ''; ?>" href="/travel-website-main/contact_us.php">Contact</a>
                    </li>
                </ul>
                
                <div class="d-flex auth-buttons">
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin'): ?>
                            <div class="dropdown">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                    Admin Panel
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                                    <li><a class="dropdown-item" href="/travel-website-main/admin_panel.php">Admin Dashboard</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="/travel-website-main/logout.php">Logout</a></li>
                                </ul>
                            </div>
                        <?php else: ?>
                            <div class="dropdown">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                    My Account
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                                    <li><a class="dropdown-item <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>" href="/travel-website-main/dashboard.php">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="/travel-website-main/profile.php">Profile</a></li>
                                    <li><a class="dropdown-item" href="/travel-website-main/Booking_history.php">Booking history</a></li>
                                    <li><a class="dropdown-item" href="/travel-website-main/payment_info.php">Payment info</a></li>
                                    <li><a class="dropdown-item <?php echo (basename($_SERVER['PHP_SELF']) == 'rating&review.php') ? 'active' : ''; ?>" href="/travel-website-main/rating&review.php">Review and rating</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="/travel-website-main/logout.php">Logout</a></li>
                                </ul>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <a href="/travel-website-main/login.php" class="btn btn-outline-primary me-2 <?php echo (basename($_SERVER['PHP_SELF']) == 'login.php') ? 'active' : ''; ?>">Login</a>
                        <a href="/travel-website-main/register.php" class="btn btn-primary <?php echo (basename($_SERVER['PHP_SELF']) == 'register.php') ? 'active' : ''; ?>">Sign Up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
/* Using the new color pattern */
:root {
    --dark-green: #446A46;     /* Top color */
    --light-beige: #FFF3E4;    /* Second color */
    --light-orange: #FFB085;   /* Third color */
    --dark-orange: #FF8038;    /* Bottom color */
}

.navbar {
    background-color: var(--dark-green);
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    padding: 1rem 2rem;
}

.navbar-brand {
    font-weight: bold;
    color: var(--light-beige);
}

.nav-link {
    color: var(--light-beige);
    font-weight: 500;
    padding: 0.5rem 1rem;
    transition: color 0.3s ease;
}

.nav-link:hover {
    color: var(--light-orange);
}

.nav-link.active {
    color: var(--dark-orange);
    font-weight: 600;
}

.btn-outline-primary {
    color: var(--light-beige);
    border-color: var(--light-beige);
}

.btn-outline-primary:hover {
    background-color: var(--dark-orange);
    border-color: var(--dark-orange);
    color: var(--light-beige);
}

.btn-primary {
    background-color: var(--dark-orange);
    border-color: var(--dark-orange);
    color: var(--light-beige);
}

.btn-primary:hover {
    background-color: var(--light-orange);
    border-color: var(--light-orange);
    color: var(--dark-green);
}

.dropdown-menu {
    border-radius: 10px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    background-color: var(--dark-green);
}

.dropdown-item {
    color: var(--light-beige);
}

.dropdown-item:hover {
    background-color: var(--dark-orange);
    color: var(--light-beige);
}

.dropdown-item.active {
    background-color: var(--dark-orange);
    color: var(--light-beige);
}

@media (max-width: 991px) {
    .offcanvas {
        max-width: 300px;
        background-color: var(--dark-green);
    }
    
    .offcanvas-title {
        color: var(--light-beige);
    }
    
    .btn-close {
        filter: invert(1);
    }
}
</style>

<script>
// Remove the mobile menu event listener as it's handled by Bootstrap
</script> 