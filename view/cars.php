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
							Cars			
						</h1>	
						<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="cars.html"> Cars</a></p>
					</div>											
				</div>
			</div>
		</section>
		<!-- End banner Area -->
		<section class="model-area pt-5 mt-5" id="cars">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-md-8 pb-40 header-text">
						<h1 class="text-center pb-10">Choose your Desired Car Model</h1>
						<p class="text-center">
							Who are in extremely love with eco friendly system.
						</p>
					</div>
				</div>
			</div>
		</section>
		<section class="search-sec">
		    <div class="container">
		        <form action="/php_project/?controller=car&action=searchCar" method="post">
		            <div class="row">
		                <div class="col-lg-12">
		                    <div class="row">
		                        <div class="col-lg-4 col-md-3 col-sm-12 p-0 ">
		                            <select class="form-control search-slt " id="exampleFormControlSelect1" required name="car_type">
		                                <option  value="">Select Type</option>
		                                <?php foreach ($cars as $car): ?>
                                        <option value="<?= $car->getType()?>"><?= $car->getType() ?></option>
                                    	<?php endforeach ?>
		                            </select>
		                        </div>
		                        <div class="col-lg-4 col-md-3 col-sm-12 p-0">
		                            <select class="form-control search-slt" id="exampleFormControlSelect1" required name="car_brand">
		                                <option  value="">Select Brand</option>
		                                <?php foreach ($cars as $car): ?>
                                        <option value="<?= $car->getBrand()?>"><?= $car->getBrand() ?></option>
                                    	<?php endforeach ?>
		                            </select>
		                        </div>
		                        <div class="col-lg-4 col-md-3 col-sm-12 p-0">
		                            <input type="submit" name="car_search" class="btn btn-danger wrn-btn" value="Search">
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </form>
		    </div>
		</section>	

		<!-- Start model Area -->
		<section class="model-area section-gap" id="cars">
			<?php if (isset($_SESSION['car'])): ?>
				<?php foreach ($_SESSION['car'] as $car): ?>
					<div class="container-fluid">
					<div class="vehicle car_bg px-2 py-4 rounded-lg shadow">
						<div class="container">
							<div class="row my-1">
								<div class="col-md-9">
									<div><h2 class="text-muted py-3"><strong><?= $car->getBrand()?> </strong> <small><?= $car->getModel() ?></small></h2> </div>
									<div><img src="img/car/<?= $car->getImage() ?>" width="300"></div>
								</div>
								<div class="col-md-3 pt-3 align-middle">
									<div class="mt-5 "><h1 class="price mt-5 text-warning"><strong><?= $car->getRentPrice()  ?>$</strong></h1></div>
									<div class="ml-5 mt-3 btn btn-sm btn-warning"><a data-toggle="modal" data-target="#myModal" data-id="<?= $car->getCarID() ?>">More Details</a></div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
					
				<?php endforeach ?>
					
			<?php elseif(isset($_SESSION['errormsg'])): ?>
				<div class="alert alert-danger fade in alert-dismissible show">
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true" style="font-size:20px">×</span>
		            </button><strong>Error!</strong> <?= $_SESSION['errormsg']; ?>
		        </div>
				
			<?php else: ?>
				<?php foreach ($cars as $car): ?>
				<div class="container-fluid">
				<div class="vehicle car_bg px-2 py-4 rounded-lg shadow">
					<div class="container">
						<div class="row my-1">
							<div class="col-md-9">
								<div><h2 class="text-muted py-3"><strong><?= $car->getBrand()?> </strong> <small><?= $car->getModel() ?></small></h2> </div>
								<div><img src="img/car/<?= $car->getImage() ?>" width="300"></div>
							</div>
							<div class="col-md-3 pt-3 align-middle">
								<div class="mt-5 "><h1 class="price mt-5 text-warning"><strong><?= $car->getRentPrice()  ?>$</strong></h1></div>
								<div class="ml-5 mt-3 btn btn-sm btn-warning"><a data-toggle="modal" data-target="#myModal" data-id="<?= $car->getCarID() ?>">More Details</a></div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<?php endforeach ?>
				
			<?php endif ?>
			
		</section>						
		<!-- End model Area -->	
		  <!-- The Modal -->
		<div class="modal" id="myModal">
			<div class="modal-dialog">
			  <div class="modal-content">
			  
			    <!-- Modal Header -->
			    <div class="modal-header">
			      <h4 class="modal-title"><strong id="brand"><?= $car->getBrand()?> </strong> <small id="model"><?= $car->getModel() ?></small></h4>
			      <button type="button" class="close" data-dismiss="modal">&times;</button>
			    </div>
			    
			    <!-- Modal body -->
			    <div class="modal-body">
			      <div class="row align-items-center single-model item">
				      <div class="col-lg-6 model-left">
				        <div class="title justify-content-between d-flex">
				          <h2 id="price">$149</h2>
				        </div>
				        <p id="info"></p>
				      </div>
				      <div class="col-lg-6 model-right">
				        <img class="img-fluid" src="img/car.jpg" alt="" id="carimg">
				      </div>
			    </div>
			    <div class="row align-items-center single-model item">
				      <div class="col-lg-12 model-left">
				        <p id="description">
				        </p>
				        <!-- <a class="text-uppercase" href="#">Book This Car Now</a> -->
				      </div>
			    </div>  

			    </div>
			    
			    <!-- Modal footer -->
			    <div class="modal-footer">
			      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			    </div>
			    
			  </div>
			</div>
		</div>
  <!-- End Modal -->

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
		<script type="text/javascript">
			 $(document).ready(function () {

			    $('#myModal').on('shown.bs.modal', function(e) {
			        var id;
			        id = $(e.relatedTarget).data('id');
			        var jId = {id: id};

			        $.post("/php_project/?&controller=car&action=singleCar",jId , function(data, status){
			           	var car = JSON.parse(data);
			            $("#myModal #brand").html(car.Brand);
			            $("#myModal #model").html(car['Model']);
			            $("#myModal #price").html("$"+car['RentPrice']+"<span>/day</span>");
			            $("#myModal #info").html("Type : "+car['Type']+"</br>TankCapacity : "+car['Type']+"</br>Color : "+car['Color']+"</br>NumberOfPassenger : "+car['NumberOfPassenger']+"</br>GasConsumption : "+car['GasConsumption']);
			            $("#myModal #description").html(car['Description']);
			            $("#myModal #carimg").attr('src','img/car/'+car['Image']);
			        });
			    });

});
		</script>
