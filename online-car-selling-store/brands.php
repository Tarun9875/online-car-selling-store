<?php 
// PHP INCLUDES
include "Includes/templates/header.php";
include "Includes/templates/navbar.php";
?>

<style>
/* CSS for car-brand images */
.brand-image {
    width: 100%;
    height: 300px; /* Set to your desired height */
    object-fit: cover; /* Ensures the image covers the area while maintaining its aspect ratio */
}

/* Container for brand name and price */
.car-brand-details {
    text-align: center;
    padding: 10px;
}

/* Box for each car brand */
.car-brand {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
</style>

<section class="brands_section">
    <section class="our-brands" id="brands">
        <div class="container">
            <div class="section-header">
                <div class="section-title">
                    <br><br>
                    First Class Car Sales & Limousine Services
                    <a href="brands.php" class="btn btn-primary" style="margin-left: 20px;">View All Brands</a>
                    <a href="index.php" class="btn btn-secondary" style="margin-left: 10px;">Home</a>
                </div>
                <hr class="separator">
                <div class="section-tagline">
                    We offer professional Cars & Limousine services with a wide range of luxury vehicles to choose from.
                </div>
            </div>

            <div class="car-brands">
                <div class="row">
                    <!-- Car Brand 1 -->
                    <div class="col-md-4">
                        <div class="car-brand">
                            <img src="images/1.jpg" alt="Brand A" class="brand-image">
                            <div class="car-brand-details">
                                <h3>Lexus</h3>
                                <p>Price: $50,0000</p>
                                <p class="brand-description">Lexus offers a balance of luxury and performance, featuring cutting-edge technology and a stylish design. Ideal for city driving and long journeys.</p>
                                <a href="sell.php?brand=BrandA" class="btn btn-success">Sell Now</a>
                            </div>
                        </div>
                    </div>

                    <!-- Car Brand 2 -->
                    <div class="col-md-4">
                        <div class="car-brand">
                            <img src="images/2.jpg" alt="Brand B" class="brand-image">
                            <div class="car-brand-details">
                                <h3>Mini Cooper</h3>
                                <p>Price: $60,0000</p>
                                <p class="brand-description">Mini Cooper is known for its powerful engine and sporty design. It combines comfort and performance, making it a popular choice for car enthusiasts.</p>
                                <a href="sell.php?brand=BrandB" class="btn btn-success">Sell Now</a>
                            </div>
                        </div>
                    </div>

                    <!-- Car Brand 3 -->
                    <div class="col-md-4">
                        <div class="car-brand">
                            <img src="images/3.jpg" alt="Brand C" class="brand-image">
                            <div class="car-brand-details">
                                <h3>Audi</h3>
                                <p>Price: $90,0000</p>
                                <p class="brand-description">Audi offers the ultimate luxury driving experience with a focus on high-end materials, innovative features, and exceptional ride quality.</p>
                                <a href="sell.php?brand=BrandC" class="btn btn-success">Sell Now</a>
                            </div>
                        </div>
                    </div>

                    <!-- Car Brand 4 -->
                    <div class="col-md-4">
                        <div class="car-brand">
                            <img src="images/4.jpg" alt="Brand D" class="brand-image">
                            <div class="car-brand-details">
                                <h3>Audi A8</h3>
                                <p>Price: $100,0000</p>
                                <p class="brand-description">Audi A8 is a leader in luxury and innovation. Its sleek design and advanced safety features make it a favorite among discerning drivers.</p>
                                <a href="sell.php?brand=BrandD" class="btn btn-success">Sell Now</a>
                            </div>
                        </div>
                    </div>

                    <!-- Car Brand 5 -->
                    <div class="col-md-4">
                        <div class="car-brand">
                            <img src="images/5.jpg" alt="Brand E" class="brand-image">
                            <div class="car-brand-details">
                                <h3>BMW</h3>
                                <p>Price: $120,0000</p>
                                <p class="brand-description">BMW offers cutting-edge technology and unparalleled comfort. It's the perfect blend of luxury and performance for long-distance travel.</p>
                                <a href="sell.php?brand=BrandE" class="btn btn-success">Sell Now</a>
                            </div>
                        </div>
                    </div>

                    <!-- Car Brand 6 -->
                    <div class="col-md-4">
                        <div class="car-brand">
                            <img src="images/6.jpg" alt="Brand F" class="brand-image">
                            <div class="car-brand-details">
                                <h3>Mercedez</h3>
                                <p>Price: $800,0000</p>
                                <p class="brand-description">Mercedez is a top-tier luxury vehicle known for its exclusivity and unmatched performance. Designed for the elite, it redefines the concept of luxury travel.</p>
                                <a href="sell.php?brand=BrandF" class="btn btn-success">Sell Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>


<?php include "Includes/templates/footer.php"; ?>
