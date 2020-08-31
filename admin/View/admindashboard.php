<?php include 'View/menubar.php'; ?>
<?php include 'View/sidebar.php'; ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
 <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- Column -->
                <div class="col-md-6 col-lg-4">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"><?= $stats['cars'] ?></i></h1>
                            <h6 class="text-white">Cars</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-4">
                    <div class="card card-hover">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"><?= $stats['customers'] ?></i></h1>
                            <h6 class="text-white">Customers</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-4">
                    <div class="card card-hover">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-collage"><?=$stats['rentals'] ?></i></h1>
                            <h6 class="text-white">Rented Cars</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                
            </div>
                


            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
    </div>
</div>

<!-- Container fluid  -->
<div class="container-fluid">
    <div class="container-fluid bg-white mt-3 pt-1">
      <h2 class="text-center">Car Details</h2>

      <table class="table table-hover text-center">
        <thead>
          <tr>
            <th width="2%">CarID</th>
            <th width="5%">CarBrand</th>
            <th width="5%">CarModel</th>
            <th width="5%">CarType</th>
            <th width="5%">TankCapacity</th>
            <th width="5%">GasConsumption</th>
            <th width="5%">Color</th>
            <th width="4%">NoOfPassenger</th>
            <th width="5%">RentPrice</th>
            <th width="8%">Image</th>
            <th width="18%">Description</th>
            <th width="4%">Status</th>

            
        </tr>
    </thead>
    <tbody>
      <?php foreach ($car as $cars) :?>
          <tr>
            <td><?= $cars->getCarID() ?></td>
            <td><?= $cars->getBrand() ?></td>
            <td><?= $cars->getModel() ?></td>
            <td><?= $cars->getType() ?></td>
            <td><?= $cars->getTankCapacity() ?></td>
            <td><?= $cars->getGasConsumption() ?></td>
            <td><?= $cars->getColor() ?></td>
            <td><?= $cars->getNumberOfPassenger() ?></td>
            <td><?= $cars->getRentPrice() ?></td>
            <td><?= $cars->getImage() ?></td>
            <td><?= $cars->getDescription() ?></td>
            <td><?= $cars->getStatus() ?></td>






            
        <?php endforeach; ?>

        <div class="container">



          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">

              <div class="modal-content">
                <div class="modal-header bg-white">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>
              <div class="modal-body">
                <form class="form-horizontal w-50" action="/php_project/admin/?controller=carDetail&action=editCar" method="POST" >

                    <div class="card-body">
                        <h4 class="card-title"><i class="fa fa-file-text"></i> Edit Car</h4>
                        <input type="hidden" name="carID" value="">

                        <div class="form-group row">
                            <label for="carbrand"  class="col-sm-3 text-right control-label col-form-label">Car Brand:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="carbrand"  name="Brand" value="<?= $cars->getBrand() ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="carmodel" class="col-sm-3 text-right control-label col-form-label">Car Model:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="carmodel" name="Model" value="<?= $cars->getModel() ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cartype" class="col-sm-3 text-right control-label col-form-label">Car Type</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  placeholder="(e.g. Sedan,Van,Truck)" name="Type" value="<?= $cars->getType() ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tankcapacity" class="col-sm-3 text-right control-label col-form-label">Tank Capacity :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="(e.g. 70 Litters.)" name="TankCapacity" value="<?= $cars->getTankCapacity() ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gasconsumption" class="col-sm-3 text-right control-label col-form-label">Gas Consumption :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="(e.g. 7L/100Km)" name="GasConsumption" value="<?= $cars->getGasConsumption() ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="carcolor" class="col-sm-3 text-right control-label col-form-label"> Car Color :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="(e.g. Black,Red,White etc.)" name="Color" value="<?= $cars->getColor() ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nopassenger" class="col-sm-3 text-right control-label col-form-label"> Number of Passenger :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="NumberOfPassenger" placeholder="(How many people can fit in the car)" value="<?= $cars->getNumberOfPassenger() ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="carrent" class="col-sm-3 text-right control-label col-form-label"> Car Rent Price :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="RentPrice" placeholder="(Rent per Day.)" value="<?= $cars->getRentPrice() ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="carimage" class="col-sm-3 text-right control-label col-form-label"> Car Image :</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="Image" value="<?= $cars->getImage() ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cardescription" class="col-sm-3 text-right control-label col-form-label"> Car Description :</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="5"  name="Description" placeholder="Car Short Description" value="<?= $cars->getDescription() ?>"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Status" class="col-sm-3 text-right control-label col-form-label">Status:</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="gender" name="Status">
                                    <option>Status</option>
                                    <option value="1" <?= $cars->getStatus() == "1"?'selected':'' ?>>Active</option>
                                    <option value="0" <?= $cars->getStatus() == "0"?'selected':'' ?>>Inactive</option>
                                </select>
                            </div>
                        </div>




                    </div>

                </div>

            </form>

        </div>

    </tbody>
</table>
</div>

</div>

<!-- End Container fluid  -->

