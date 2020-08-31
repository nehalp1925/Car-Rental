<?php include 'View/menubar.php'; ?>
<?php include 'View/sidebar.php'; ?>


<!-- Page wrapper  -->

<div class="page-wrapper">
 <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">

            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin_dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> 
                        Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Return Car</li>
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

            <form class="form-horizontal w-50" action="/php_project/admin/?controller=returnrental&action=registerReturn" method="POST">
                <input type="hidden" name="initialCharges">
                <input type="hidden" value="<?=date("Y/m/d h:i:sa"); ?>" name="ReturnDate">
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-file-text"></i> Return a Car</h4>

                    <div class="form-group row">
                        <label for="returndate" class="col-sm-3 text-right control-label col-form-label">Select Rented Car :</label>
                        <div class="col-sm-9">
                            <select name="carID" class="form-control">
                                <option value="-1">Select Car</option>
                                <?php foreach ($rentedCars as $car): 
                                    $now = time();
                                    $your_date = strtotime($car['DateStart']);
                                    $datediff = round(($now - $your_date)/60/60/24);
                                    ?>
                                    <option data-rentdate="<?php echo $datediff ?>" value="<?php echo $car['CarID'] ?>"><?php echo $car['Brand'] . " " . $car['Model'] ?></option>
                                <?php endforeach ?>
                            </select>

                        </div>

                    </div>


                    <script>
                        $(function(){
                            $("[name='carID']").on("change", function(e){
                                var days = $(this).find(':selected').data("rentdate");
                                $.post("index.php?core=1&controller=return&action=getCarInfo", {id:$(this).val()}, function( data ) {
                                    var car = JSON.parse(data);
                                    $("input[name='initialCharges']").val(car.RentPrice * days);
                                });
                            });
                        });
                    </script>

                    <div class="form-group row">
                        <label for="Inspected" class="col-sm-3 text-right control-label col-form-label">Inspected :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="YES/NO." name="Inspected">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Damage" class="col-sm-3 text-right control-label col-form-label"> Damage :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="YES/NO" name="Damage">
                        </div>
                    </div>
                   

                    <div class="form-group row">
                        <label for="notes" class="col-sm-3 text-right control-label col-form-label">Notes :</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" id="notes" name="notes" placeholder=" Notes for damage car."></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gaslevel" class="col-sm-3 text-right control-label col-form-label">Gas Level :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="gaslevel" placeholder="Enter a Car car gas level in %." name="gaslevel">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="illage" class="col-sm-3 text-right control-label col-form-label">Millage :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="millage" placeholder="Enter a Car return millage." name="millage">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addCharges" class="col-sm-3 text-right control-label col-form-label">Additional Charges :</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="addCharges" placeholder="Enter the additional charges here" name="addCharges">
                        </div>
                    </div>




                    <div class="form-group row">

                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-success float-right" value="Submit" name="returncar">
                        </div>
                    </div>


                </div>

            </form>

        </div>

    </div>

    <div class="container-fluid bg-white mt-3 pt-1">
      <h2 class="text-center">Return Rental Car Details</h2>

      <table class="table table-hover text-center">
        <thead>
          <tr>
            <th width="4%">ReturnID</th>
            <th width="4%">RentalID</th>
            <th width="5%">ReturnDate</th>
            <th width="5%">Inspected</th>
            <th width="8%">Damage</th>
            <th width="15%">Notes</th>
            <th width="4%">GasLevel</th>
            <th width="5%">Millage</th>
            <th width="5%">AdditionalCharge</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($returnedcar as $rentedcar) :?>
          <tr>
            <td><?= $rentedcar->getReturnID() ?></td>
            <td><?= $rentedcar->getRentalID() ?></td>
            <td><?= $rentedcar->getReturnDate() ?></td>
            <td><?= $rentedcar->getInspected() ?></td>
            <td><?= $rentedcar->getDamage() ?></td>
            <td><?= $rentedcar->getNotes() ?></td>
            <td><?= $rentedcar->getGasLevel() ?></td>
            <td><?= $rentedcar->getMillage() ?></td>
            <td><?= $rentedcar->getAdditionalCharge() ?></td>

    <?php endforeach; ?>


</tbody>
</table>
</div>


</div>







<!-- End Container fluid  -->


<?php unset($_SESSION['successmsg']); 
unset($_SESSION['errormsg']);
?>