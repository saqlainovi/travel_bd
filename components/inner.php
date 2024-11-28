<!-- Modern Hero Slider Section -->
<section class="hero-slider">
    <div class="slider-container">
        <div class="slide active">
            <div class="slide-image">
                <img src="images/Screenshot_1.png" alt="Smart Tour 2.0">
            </div>
            <div class="slide-overlay"></div>
            <div class="slide-content">
                <h1>Smart Tour 2.0</h1>
                <p>Discover the Beauty of Bangladesh</p>
                <a href="#booking" class="cta-button">Start Your Journey</a>
            </div>
        </div>
        <div class="slide">
            <div class="slide-image">
                <img src="images/Screenshot_2.png" alt="Discover Bangladesh">
            </div>
            <div class="slide-overlay"></div>
            <div class="slide-content">
                <h1>Explore Paradise</h1>
                <p>Your Dream Destination Awaits</p>
                <a href="#booking" class="cta-button">Plan Your Trip</a>
            </div>
        </div>
        <div class="slide">
            <div class="slide-image">
                <img src="images/Screenshot_3.png" alt="Adventure Awaits">
            </div>
            <div class="slide-overlay"></div>
            <div class="slide-content">
                <h1>Adventure Calls</h1>
                <p>Create Unforgettable Memories</p>
                <a href="#booking" class="cta-button">Book Now</a>
            </div>
        </div>
    </div>
</section>

<!-- After the slider section -->
<section class="booking-section">
    <div class="booking-container">
        <div class="booking-card">
            <h2>Book Your Trip</h2>
            <form action="search_trips.php" method="POST" class="booking-form">
                <div class="form-group">
                    <label for="from">From</label>
                    <select id="from" name="from" required>
                        <option value="" disabled selected>Select departure</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="Khulna">Khulna</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="to">To</label>
                    <select id="to" name="to" required>
                        <option value="" disabled selected>Select destination</option>
                        <option value="Cox's Bazar">Cox's Bazar</option>
                        <option value="Sajek Valley">Sajek Valley</option>
                        <option value="Sundarbans">Sundarbans</option>
                        <option value="Bandarban">Bandarban</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="departure">Departure Date</label>
                    <input type="date" id="departure" name="departure" required>
                </div>

                <div class="form-group">
                    <label for="return">Return Date</label>
                    <input type="date" id="return" name="return">
                </div>

                <button type="submit" class="search-btn">Search</button>
            </form>
        </div>
    </div>
</section>

<!-- Discount Banner Section -->
<section class="discount-banner">
    <div class="banner-overlay"></div>
    <div class="banner-content">
        <h2>For 10% discount on your first trip, simply sign up here!</h2>
        <a href="register.php" class="sign-up-btn">Sign Up</a>
    </div>
</section>

<!-- Destinations Section -->
<section class="explore-destinations">
    <h2 class="section-title">Explore Destinations</h2>
    
    <div class="destinations-grid">
        <!-- Destination Card 1 -->
        <div class="destination-card">
            <div class="card-image">
                <img src="images/banglar-tajmohol.webp" alt="Banglar Taj Mahal">
            </div>
            <div class="card-content">
                <h3>Banglar Taj Mahal</h3>
                <p>Relax on the most stunning beaches around the world.</p>
                <a href="destination.php?id=1" class="learn-more">Learn More</a>
            </div>
        </div>

        <!-- Destination Card 2 -->
        <div class="destination-card">
            <div class="card-image">
                <img src="images/sonargaon-museum.webp" alt="Sonargaon Museum">
            </div>
            <div class="card-content">
                <h3>Sonargaon Museum</h3>
                <p>Embark on thrilling adventures in the mountains.</p>
                <a href="destination.php?id=2" class="learn-more">Learn More</a>
            </div>
        </div>

        <!-- Destination Card 3 -->
        <div class="destination-card">
            <div class="card-image">
                <img src="images/shishu-park.png" alt="National Shishu Park">
            </div>
            <div class="card-content">
                <h3>National Shishu Park</h3>
                <p>Discover the excitement of the world's greatest cities.</p>
                <a href="destination.php?id=3" class="learn-more">Learn More</a>
            </div>
        </div>
    </div>

    <!-- See More Button -->
    <div class="see-more-container">
        <a href="destinations.php" class="see-more">See more</a>
    </div>
</section>



<!-- Chat Widget -->


<!-- Add scripts at the bottom of inner.php -->
<script src="js/carousel.js"></script>
<script src="js/chat.js"></script> 