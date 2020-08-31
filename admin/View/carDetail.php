<!-- Page wrapper  -->
<?php include 'View/menubar.php'; ?>
<?php include 'View/sidebar.php'; ?>
<div class="page-wrapper">
 <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">

            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/php_project/admin/?controller=admindashboard&action=view"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Car</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['errormsg'])): ?>
    <div class="alert alert-danger fade in alert-dismissible show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="font-size:20px">×</span>
            </button><strong>Error!</strong> <?= $_SESSION['errormsg']; ?>
        </div>
        <?php elseif (isset($_SESSION['successmsg'])): ?> 
           <div class="alert alert-success fade in alert-dismissible show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" style="font-size:20px">×</span>
                    </button>    <strong>Success!</strong> <?= $_SESSION['successmsg']; ?>
                </div>
            <?php endif ?>

            <!-- Container fluid  -->

            <div class="container-fluid">
                <a href="#demo" class="btn btn-primary" data-toggle="collapse"><i class="fa fa-plus"></i> Add</a>
                <div id="demo" class="collapse mt-3">
                    <div class="card">

                        <form class="form-horizontal w-50" action="/php_project/admin/?controller=carDetail&action=registerCar" method="POST" enctype="multipart/form-data">

                            <div class="card-body">
                                <h4 class="card-title"><i class="fa fa-file-text"></i> Register New Car</h4>
                                <div class="form-group row">
                                    <label for="carmodal" class="col-sm-3 text-right control-label col-form-label">Car Brand :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  placeholder="(e.g. Audi)" name="Brand">
                                    </div>
                                </div> 
                                
                                <div class="form-group row">
                                    <label for="carmodal" class="col-sm-3 text-right control-label col-form-label">Car Modal :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  placeholder="(e.g. Matrix,Escape)" name="Model">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cartype" class="col-sm-3 text-right control-label col-form-label">Car Type</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  placeholder="(e.g. Sedan,Van,Truck)" name="Type">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tankcapacity" class="col-sm-3 text-right control-label col-form-label">Tank Capacity :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="(e.g. 70 Litters.)" name="TankCapacity">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gasconsumption" class="col-sm-3 text-right control-label col-form-label">Gas Consumption :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="(e.g. 7L/100Km)" name="GasConsumption">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="carcolor" class="col-sm-3 text-right control-label col-form-label"> Car Color :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="(e.g. Black,Red,White etc.)" name="Color">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nopassenger" class="col-sm-3 text-right control-label col-form-label"> Number of Passenger :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="NumberOfPassenger" placeholder="(How many people can fit in the car)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="carrent" class="col-sm-3 text-right control-label col-form-label"> Car Rent Price :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="RentPrice" placeholder="(Rent per Day.)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="carimage" class="col-sm-3 text-right control-label col-form-label"> Car Image :</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="fileToUpload">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cardescription" class="col-sm-3 text-right control-label col-form-label"> Car Description :</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="5"  name="Description" placeholder="Car Short Description"></textarea>
                                    </div>
                                </div>


                                <div class="form-group row">

                                    <div class="col-sm-12">
                                        <input type="submit" class="btn btn-success float-right" id="submit" value="Submit" name="addcar">
                                    </div>
                                </div>


                            </div>

                        </form>

                    </div>

                </div>

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

                        <th width="33%" class="text-center">Action</th>
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






                        <td class="text-center">
                            <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal" data-id="<?= $cars->getCarID() ?>">
                                <b><i class='fas fa-edit'></i> Edit</b></a>&nbsp;

                                <a href="/php_project/admin/?controller=carDetail&action=banCar&BCarID=<?= $cars->getCarID() ?>" onclick="return confirm('Are you sure you want to Ban <?= $cars->getBrand() ?>')"  class="btn btn-sm btn-dark"><b><i class="fa fa-ban"></i> Ban</b></a>&nbsp;

                                <a href="/php_project/admin/?controller=carDetail&action=deleteCar&DCarID=<?= $cars->getCarID() ?>" onclick="return confirm('Are you sure you want to delete <?= $cars->getModel() ?>')"  class="btn btn-sm btn-danger"><b><i class="fa fa-trash-o"></i> Delete</b></a>
                            </td>
                        </tr>
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
                                            <img src="img/<?php echo $cars->getImage() ?>" style="height: 100px; width: 100px;">
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
                            <div class="modal-footer">
                               <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-block" name="editCar">Edit</button>
                            </div>
                            <div class="col-md-6">
                                <a href="/php_project/admin/?controller=carDetail&action=view" class="btn btn-danger btn-block">Cancel</a>
                            </div>
                        </form>

                    </div>

                </tbody>
            </table>
        </div>


    </div>
    <script type="text/javascript">

       $(document).ready(function () {

        $('#myModal').on('shown.bs.modal', function(e) {
            var id;
            id = $(e.relatedTarget).data('id');

            $.post("/php_project/admin/?core=1&controller=carDetail&action=singleCar", {id: id}, function(data, status){
                var cars = JSON.parse(data);
                $("#myModal input[name='CarID']").val(cars['CarID'])
                $("#myModal input[name='Brand']").val(cars['Brand']);
                $("#myModal input[name='Model']").val(cars['Model']);
                $("#myModal input[name='Type']").val(cars['Type']);
                $("#myModal input[name='TankCapacity']").val(cars['TankCapacity']);
                $("#myModal input[name='GasConsumption']").val(cars['GasConsumption']);
                $("#myModal input[name='Color']").val(cars['Color']);
                $("#myModal input[name='NumberOfPassenger']").val(cars['NumberOfPassenger']);
                $("#myModal input[name='RentPrice']").val(cars['RentPrice']);
                $("#myModal input[name='Image']").val(cars['Image']);
                $("#myModal input[name='Description']").val(cars['Description']);
                $("#myModal input[name='Status']").val(cars['Status']);
                


            });
        });

    });
</script>






<!-- End Container fluid  -->
<?php unset($_SESSION['successmsg']); 
   unset($_SESSION['errormsg']);
?>