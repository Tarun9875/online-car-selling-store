<?php 
    #PHP INCLUDES
   
    include "Includes/templates/header.php";
    include "Includes/templates/navbar.php";
?>


<!-- Home Section -->
<section class = "home_section">
    <div class="section-header">
    
        <div class="section-title" style = "font-size:50px; color:white">
            Find Best Car & Limousine
        </div>
        
        <hr class="separator">
		<div class="section-tagline">
            From as low as $10 per day with limited time offer discounts
		</div>					
	</div>
</section>

<!-- Our Services Section -->
<section class = "our-services" id = "services">
    <div class = "container">
        <div class="section-header">
            <div class="section-title">
                What Services we offer to our clients
            </div>
            <hr class="separator">
            <div class="section-tagline">
                Who are in extremely love with eco friendly system.
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4>
                        <span>
                            <i class="far fa-user"></i>
                        </span>
                        Expert Technicians
                    </h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4>
                        <span>
                            <i class="fas fa-certificate"></i>
                        </span>
                        Professional Service
                    </h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4>
                        <span>
                            <i class="fas fa-phone-alt"></i>
                        </span>
                        Great Support
                    </h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4>
                        <span>
                            <i class="fas fa-rocket"></i>
                        </span>
                        Technical Skills
                    </h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4>
                        <span>
                            <i class="fas fa-gem"></i>
                        </span>
                        Highly Recomended
                    </h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4>
                        <span>
                            <i class="far fa-comments"></i>
                        </span>
                        Positive Reviews
                    </h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Area Section -->
<section class = "about-area">
    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-md-6 left-area" style = "padding:0px">
                <img src="Design/images/about-img.jpg" alt="Car Rental Image">
            </div>
            <div class = "col-md-6 right-area" style = "padding:50px">
                <h1>
                    Globally Connected <br>
                    by Large Network
                </h1>
                <p>
                    <span>
                        We are here to listen from you deliver exellence
                    </span>
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.
                </p>
                <a class="my-btn bttn" href="#">get details</a>
            </div>
        </div>
    </div>
</section>

<!-- Our Brands Section -->

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
                    <br>
                    <br>
                    First Class Car Categories
                    <a href="brands.php" class="btn btn-primary" style="margin-left: 20px;">View All Brands</a>
                    <a href="index.php" class="btn btn-secondary" style="margin-left: 10px;">Home</a>
                </div>
                <hr class="separator">
                <div class="section-tagline">
                    We offer professional car rental & limousine services in our range of high-end vehicles
                </div>
            </div>

            <div class="car-brands">
                <div class="row">
                    <!-- Static Car Brand 1 -->
                    <div class="col-md-4">
                        <div class="car-brand">
                            <img src="images/1.jpg" alt="Brand A" class="brand-image">
                            <div class="car-brand-details">
                                
                            </div>
                        </div>
                    </div>
                    
                    <!-- Static Car Brand 2 -->
                    <div class="col-md-4">
                        <div class="car-brand">
                            <img src="images/2.jpg" alt="Brand B" class="brand-image">
                            <div class="car-brand-details">
                                <h3>Brand B</h3>
                                <p>Price: $60,000</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Static Car Brand 3 -->
                    <div class="col-md-4">
                        <div class="car-brand">
                            <img src="images/3.jpg" alt="Brand C" class="brand-image">
                            <div class="car-brand-details">
                                <h3>Brand C</h3>
                                <p>Price: $90,000</p>
                            </div>
                        </div>
                    </div>

                    <!-- Static Car Brand 4-->
                    <div class="col-md-4">
                        <div class="car-brand">
                            <img src="images/4.jpg" alt="Brand D" class="brand-image">
                            <div class="car-brand-details">
                                <h3>Brand D</h3>
                                <p>Price: $100,000</p>
                            </div>
                        </div>
                    </div>

                    <!-- Static Car Brand 5-->
                    <div class="col-md-4">
                        <div class="car-brand">
                            <img src="images/5.jpg" alt="Brand E" class="brand-image">
                            <div class="car-brand-details">
                                <h3>Brand E</h3>
                                <p>Price: $120,000</p>
                            </div>
                        </div>
                    </div>

                    <!-- Static Car Brand 6-->
                    <div class="col-md-4">
                        <div class="car-brand">
                            <img src="images/6.jpg" alt="Brand F" class="brand-image">
                            <div class="car-brand-details">
                                <h3>Brand F</h3>
                                <p>Price: $800,000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section> 

<!-- CAR RESERVATION SECTION 
<section class="reservation_section" style = "padding:50px 0px" id = "reserve">
	<div class="container">
		<div class = "row">
			<div class = "col-md-5"></div>
			<div class = "col-md-7">
				<form method="POST" action = "reserve.php" class = "car-reservation-form" id = "reservation_form" v-on:submit = "checkForm">
					<div class="text_header">
						<span>
							Find your car
						</span>
					</div>
					<div>
						<div class = "form-group">
							<label for="pickup_location">Pickup Location</label>
							<input type = "text" class = "form-control" name = "pickup_location" placeholder = "34 Mainfield Road" v-model = 'pickup_location'>
							<div class="invalid-feedback" style = "display:block" v-if="pickup_location === null">
								Pickup location is required
							</div>
						</div>
						<div class = "form-group">
							<label for="return_location">Return Location</label>
							<input type = "text" class = "form-control" name = "return_location" placeholder = "34 Mainfield Road" v-model = 'return_location'>
							<div class="invalid-feedback" style = "display:block" v-if="return_location === null">
								Return location is required
							</div>
						</div>
						<div class = "form-group">
							<label for="pickup_date">Pickup Date</label>
							<input type = "date" min = "<?php echo date('Y-m-d', strtotime("+1 day"))?>" name = "pickup_date" class = "form-control" v-model = 'pickup_date'>
							<div class="invalid-feedback" style = "display:block" v-if="pickup_date === null">
								Pickup date is required
							</div>
						</div>
						<div class = "form-group">
							<label for="return_date">Return Date</label>
							<input type = "date" min = "<?php echo date('Y-m-d', strtotime("+2 day"))?>" name = "return_date"  class = "form-control" v-model = 'return_date'>
							<div class="invalid-feedback" style = "display:block" v-if="return_date === null">
								Return date is required
							</div>
						</div>
						
						<button type="submit" class="btn sbmt-bttn" name = "reserve_car">Book Instantly</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
 Submit Button -->
<!-- CONTACT SECTION 

<section class="contact-section" id="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 sm-padding">
                <div class="contact-info">
                    <h2>
                        Get in touch with us & 
                        <br>send us message today!
                    </h2>
                    <p>
                        Getting dressed up and traveling with good friends makes for a shared, unforgettable experience.
                    </p>
                    <h3>
                        198 West 21th Street, Suite 721 
                        <br>
                        New York, NY 10010
                    </h3>
                    <ul>
                        <li>
                            <span style = "font-weight: bold">Email:</span> 
                            contact@yahyacarrental.com
                        </li>
                        <li>
                            <span style = "font-weight: bold">Phone:</span> 
                            +88 (0) 101 0000 000
                        </li>
                        <li>
                            <span style = "font-weight: bold">Fax:</span> 
                            +88 (0) 202 0000 001
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 sm-padding">
                <div class="contact-form">
                    <div id="contact_ajax_form" class="contactForm">
                        <div class="form-group colum-row row">
                            <div class="col-sm-6">
                                <input type="text" id="contact_name" name="name" class="form-control" placeholder="Name">
                            </div>
                            <div class="col-sm-6">
                                <input type="email" id="contact_email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" id="contact_subject" name="subject" class="form-control" placeholder="Subject">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea id="contact_message" name="message" cols="30" rows="5" class="form-control message" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button id="contact_send" class="contact_send_btn">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 Footer Section -->
<section class="widget_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer_widget">
                    <a class="navbar-brand" href="">
                        Yah<span style = "color:#04DBC0">Ya</span>&nbsp;CarRental
                    </a>
                    <p>
                        Getting dressed up and traveling with good friends makes for a shared, unforgettable experience.
                    </p>
                    <ul class="widget_social">
                        <li><a href="#" data-toggle="tooltip" title="Facebook"><i class="fab fa-facebook-f fa-2x"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" title="Twitter"><i class="fab fa-twitter fa-2x"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" title="Instagram"><i class="fab fa-instagram fa-2x"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" title="LinkedIn"><i class="fab fa-linkedin fa-2x"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" title="Google+"><i class="fab fa-google-plus-g fa-2x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer_widget">
                    <h3>Contact Info</h3>
                    <ul class = "contact_info">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>962 Fifth Avenue, 3rd Floor New York, NY10022
                        </li>
                        <li>
                            <i class="far fa-envelope"></i>contact@barbershop.com
                        </li>
                        <li>
                            <i class="fas fa-mobile-alt"></i>+123 456 789 101
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer_widget">
                    <h3>Newsletter</h3>
                    <p style = "margin-bottom:0px">Don't miss a thing! Sign up to receive daily deals</p>
                    <div class="subscribe_form">
                        <form action="#" class="subscribe_form" novalidate="true">
                            <input type="email" name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address...">
                            <button type="submit" class="submit">SUBSCRIBE</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BOTTOM FOOTER -->
<?php include "Includes/templates/footer.php"; ?>



<script>

new Vue({
    el: "#reservation_form",
    data: {
        pickup_location: '',
        return_location: '',
        pickup_date: '',
		return_date: ''
    },
    methods:{
        checkForm: function(event){
            if( this.pickup_location && this.return_location && this.pickup_date && this.return_date)
            {
                return true;
            }
            
            if (!this.pickup_location)
            {
                this.pickup_location = null;
            }

            if (!this.return_location)
            {
                this.return_location = null;
            }

            if (!this.pickup_date)
            {
                this.pickup_date = null;
            }

			if (!this.return_date)
            {
                this.return_date = null;
            }
            
            event.preventDefault();
        },
    }
})


</script>