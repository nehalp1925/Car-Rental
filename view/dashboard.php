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
				<div class="row d-flex align-items-center justify-content-center" style="height: 696px!important;">
					<div class="banner-content col-lg-7 col-md-6 ">
						<h6 class="text-white ">the Royal Essence of Journey</h6>
						<h1 class="text-white text-uppercase">
							Relaxed Journey Ever				
						</h1>
						<p class="pt-20 pb-20 text-white">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</p>
						<a href="#" class="primary-btn text-uppercase">Rent Car Now</a>
					</div>
					<div class="col-lg-5  col-md-6 header-right">
						<h4 class="text-white pb-30">Choose Your Car Today!</h4>
						<form action="/php_project/?controller=dashboard&action=searchCar" method="post" autocomplete="off">
						    <div class="form-group">
						       	<div class="default-select" id="default-select"">
									<select name="cartype">
										<option value="" disabled selected hidden>Select Your Car</option>
										<?php foreach ($cars as $car): ?>
                                        <option value="<?= $car->getType()?>"><?= $car->getType() ?></option>
                                    <?php endforeach ?>
									</select>
								</div>
						    </div>
						    <div class="form-group row">
						    	<div class="col-md-9">
						        </div>
						        <div class="col-md-3">
						            <input type="submit" class="btn btn-lg text-uppercase" name="searchCar" value="Select">
						        </div>
						    </div>
						</form>
					</div>											
				</div>
			</div>					
		</section>
		<!-- End banner Area -->	

		<!-- Start model Area -->
		<section class="model-area section-gap" id="cars">
			<div class="container">
				<div class="row d-flex justify-content-center pb-40">
					<div class="col-md-8 pb-40 header-text">
						<h1 class="text-center pb-10">Choose your Desired Car Model</h1>
						<p class="text-center">
							Who are in extremely love with eco friendly system.
						</p>
					</div>
				</div>

				<div class="active-model-carusel mt-2">
					<div class="row align-items-center single-model item">
						<div class="col-lg-6 model-left">
							<div class="title justify-content-between d-flex">
								<h4 class="mt-20">Audi 3000 msi</h4>
								<h2>$149<span>/day</span></h2>
							</div>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</p>
							<p>
								Capacity         : 04 Person <br>
								Doors            : 04 <br>
								Air Condition    : Dual Zone <br>
								Transmission     : Automatic
							</p>
						</div>
						<div class="col-lg-6 model-right">
							<img class="img-fluid" src="img/car.jpg" alt="">
						</div>
					</div>
					<div class="row align-items-center single-model item">
						<div class="col-lg-6 model-left">
							<div class="title justify-content-between d-flex">
								<h4 class="mt-20">Audi 3000 msi</h4>
								<h2>$149<span>/day</span></h2>
							</div>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</p>
							<p>
								Capacity         : 04 Person <br>
								Doors            : 04 <br>
								Air Condition    : Dual Zone <br>
								Transmission     : Automatic
							</p>
							<a class="text-uppercase primary-btn" href="#">Book This Car Now</a>
						</div>
						<div class="col-lg-6 model-right">
							<img class="img-fluid" src="img/car.jpg" alt="">
						</div>
					</div>
					<div class="row align-items-center single-model item">
						<div class="col-lg-6 model-left">
							<div class="title justify-content-between d-flex">
								<h4 class="mt-20">Audi 3000 msi</h4>
								<h2>$149<span>/day</span></h2>
							</div>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</p>
							<p>
								Capacity         : 04 Person <br>
								Doors            : 04 <br>
								Air Condition    : Dual Zone <br>
								Transmission     : Automatic
							</p>
							<a class="text-uppercase primary-btn" href="#">Book This Car Now</a>
						</div>
						<div class="col-lg-6 model-right">
							<img class="img-fluid" src="img/car.jpg" alt="">
						</div>
					</div>												
				</div>
			</div>	
		</section>
		<!-- End model Area -->


		<!-- Start fact Area -->
		<section class="facts-area section-gap">
			<div class="container">
				<div class="row">
					<div class="col single-fact">
						<h1 class="counter">2536</h1>
						<p>Projects Completed</p>
					</div>
					<div class="col single-fact">
						<h1 class="counter">6784</h1>
						<p>Really Happy Clients</p>
					</div>
					<div class="col single-fact">
						<h1 class="counter">1059</h1>
						<p>Total Tasks Completed</p>
					</div>
					<div class="col single-fact">
						<h1 class="counter">2239</h1>
						<p>Cups of Coffee Taken</p>
					</div>	
					<div class="col single-fact">
						<h1 class="counter">435</h1>
						<p>In House Professionals</p>
					</div>												
				</div>
			</div>	
		</section>
		<!-- end fact Area -->							

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

		<!-- Start blog Area -->
		<section class="blog-area section-gap" id="blog">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="menu-content pb-70 col-lg-8">
						<div class="title text-center">
							<h1 class="mb-10">Latest From Our Blog</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p>
						</div>
					</div>
				</div>					
				<div class="row">
					<div class="col-lg-3 col-md-6 single-blog">
						<div class="thumb">
							<img class="img-fluid" src="img/b1.jpg" alt="">								
						</div>
						<p class="date">10 Jan 2018</p>
						<a href="blog-single.html"><h4>Addiction When Gambling
						Becomes A Problem</h4></a>
						<p>
							inappropriate behavior ipsum dolor sit amet, consectetur.
						</p>
						<div class="meta-bottom d-flex justify-content-between">
							<p><span class="lnr lnr-heart"></span> 15 Likes</p>
							<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
						</div>									
					</div>
					<div class="col-lg-3 col-md-6 single-blog">
						<div class="thumb">
							<img class="img-fluid" src="img/b2.jpg" alt="">								
						</div>
						<p class="date">10 Jan 2018</p>
						<a href="blog-single.html"><h4>Addiction When Gambling
						Becomes A Problem</h4></a>
						<p>
							inappropriate behavior ipsum dolor sit amet, consectetur.
						</p>
						<div class="meta-bottom d-flex justify-content-between">
							<p><span class="lnr lnr-heart"></span> 15 Likes</p>
							<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
						</div>									
					</div>
					<div class="col-lg-3 col-md-6 single-blog">
						<div class="thumb">
							<img class="img-fluid" src="img/b3.jpg" alt="">								
						</div>
						<p class="date">10 Jan 2018</p>
						<a href="blog-single.html"><h4>Addiction When Gambling
						Becomes A Problem</h4></a>
						<p>
							inappropriate behavior ipsum dolor sit amet, consectetur.
						</p>
						<div class="meta-bottom d-flex justify-content-between">
							<p><span class="lnr lnr-heart"></span> 15 Likes</p>
							<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
						</div>									
					</div>
					<div class="col-lg-3 col-md-6 single-blog">
						<div class="thumb">
							<img class="img-fluid" src="img/b4.jpg" alt="">								
						</div>
						<p class="date">10 Jan 2018</p>
						<a href="blog-single.html"><h4>Addiction When Gambling
						Becomes A Problem</h4></a>
						<p>
							inappropriate behavior ipsum dolor sit amet, consectetur.
						</p>
						<div class="meta-bottom d-flex justify-content-between">
							<p><span class="lnr lnr-heart"></span> 15 Likes</p>
							<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
						</div>									
					</div>							
				</div>
			</div>	
		</section>
		<!-- End blog Area -->


		<!-- start footer Area -->	
		<?php
	        include "load/footer.php";
	    ?>	

		<!-- End footer Area -->		



