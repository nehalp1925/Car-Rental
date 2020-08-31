<?php
include "load/head.php";
?>

<?php
    include "load/menu.php";
?>

    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Rent
                    </h1>
                    <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="blog-single.html"> Rent</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

	<!-- Start blog-posts Area -->
	<section class="blog-posts-area section-gap">
		<div class="container">
        <?php if (isset($_SESSION['errormsg'])): ?>
            <div class="input-group form-group my-4">
                <div class="alert alert-danger fade in alert-dismissible show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" style="font-size:20px">×</span>
                    </button><strong>Error!</strong> <?= $_SESSION['errormsg']; ?>
                </div>
            </div>
        <?php elseif (isset($_SESSION['successmsg'])): ?>
            <div class="input-group form-group my-4">
                <div class="alert alert-success fade in alert-dismissible show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" style="font-size:20px">×</span>
                    </button>    <strong>Success!</strong> <?= $_SESSION['successmsg']; ?>
                </div>
            </div>
        <?php endif ?>      
			<div class="col-lg-8  col-md-8 header-right offset-md-2">
                    <h4 class="text-white pb-30">Book Your Car Today!</h4>
                    <form action="/php_project/?controller=rent&action=rentCar" method="POST" class="form" role="form" autocomplete="off">
                        <div class="form-group">
                            <div class="default-select" id="default-select"">
                                <select name="rented_car" required>
                                    <option value="" disabled selected hidden>Select Your Car</option>
                                    <?php foreach ($cars as $car): ?>
                                        <option value="<?= $car->getCarID()?>"><?= $car->getBrand().'-'.$car->getModel() ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 wrap-left">
                                <div class="input-group dates-wrap">
                                    <input class="dates form-control" placeholder="Start Date" type="date" name="startDate" min="<?php echo date('Y-m-d') ?>" required>
                                    <div class="input-group-prepend">
                                        <span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 wrap-right">
                                <div class="input-group dates-wrap">
                                    <input class="dates form-control" placeholder="End Date" type="date" name="endDate" min="<?php echo date('Y-m-d') ?>" required >
                                    <div class="input-group-prepend">
                                        <span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="from-group">
                            <input class="form-control txt-field" type="text" name="name" placeholder="Your name">
                            <input class="form-control txt-field" type="email" name="rent_email" placeholder="Email address">
                            <input class="form-control txt-field" type="tel" name="rent_phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Phone number">
                            <textarea rows="4" cols="98" placeholder="notes" name="notes"></textarea><br>
                            <input class="mb-3" type="checkbox" name="tos"> I agree Terms Of Service

                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-default btn-lg btn-block text-center text-uppercase" name="rent" value="Confirm Car Booking">
                            </div>
                        </div>
                    </form>
                </div>
		</div>
	</section>
<!-- End blog-posts Area -->
            <!-- Start callaction Area -->
<section class="callaction-area relative section-gap">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="text-white">Experience Great Support</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                </p>
                <a class="callaction-btn text-uppercase" href="#">Reach Our Support Team</a>
            </div>
        </div>
    </div>
</section>
<!-- End callaction Area -->

            <!-- Start reviews Area -->
<section class="reviews-area section-gap" id="review">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 pb-40 header-text text-center">
                <h1>Some Features that Made us Unique</h1>
                <p class="mb-10 text-center">
                    Who are in extremely love with eco friendly system.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-review">
                    <h4>Cody Hines</h4>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                    <div class="star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-review">
                    <h4>Chad Herrera</h4>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                    <div class="star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-review">
                    <h4>Andre Gonzalez</h4>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                    <div class="star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-review">
                    <h4>Jon Banks</h4>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                    <div class="star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-review">
                    <h4>Landon Houston</h4>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                    <div class="star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-review">
                    <h4>Nelle Wade</h4>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                    <div class="star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End reviews Area -->


<!-- start footer Area -->
<?php
    include "load/footer.php";
?>
<!-- End footer Area -->

