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
                        <li class="breadcrumb-item active" aria-current="page">Customers</li>
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
            <!-- validation for add employee -->




            <!-- Container fluid  -->

            <div class="container-fluid">
                <a href="#demo" class="btn btn-primary" data-toggle="collapse"> <i class="fas-fa-plus"></i><i class="fa fa-plus"></i> Add</a>
                <div id="demo" class="collapse mt-3">
                    <div class="card">

                        <form class="form-horizontal w-50" action="/php_project/admin/?controller=customer&action=registerCustomer" method="POST">

                            <div class="card-body">
                                <h4 class="card-title"><i class="fa fa-file-text"></i> Register Customers</h4>

                                <div class="form-group row">
                                    <label for="uname" class="col-sm-3 text-right control-label col-form-label">UserName :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  placeholder="User Name Here" name="Username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 text-right control-label col-form-label">Password :</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control"  placeholder="Password is Here" name="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">FullName :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  placeholder="Full Name Here" name="Fullname">
                                    </div>
                                </div>





                                <div class="form-group row">
                                    <label for="dob" class="col-sm-3 text-right control-label col-form-label">DOB :</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" placeholder="DateOfBirth" name="DateOfBirth" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="number" class="col-sm-3 text-right control-label col-form-label">Phone Number :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="Phone" placeholder="111-111-1111" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 text-right control-label col-form-label">Email :</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="Email" placeholder="Enter a Email" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 text-right control-label col-form-label"> Address :</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="5" name="Address" placeholder="Address"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dlnumber" class="col-sm-3 text-right control-label col-form-label">Driver No :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="DriverNo" placeholder="Driver Licence Number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ccnumber" class="col-sm-3 text-right control-label col-form-label">CreditCard No :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="CreditCardNo" placeholder="Credit Card Number">
                                    </div>
                                </div>



                                <div class="form-group row">

                                    <div class="col-sm-12">
                                        <input type="submit" class="btn btn-success float-right" id="submit" value="Submit" name="addcustomer">
                                    </div>
                                </div>


                            </div>

                        </form>

                    </div>

                </div>

                <div class="container-fluid bg-white mt-3 pt-1">
                  <h2 class="text-center">Customers Details</h2>
                  <table class="table table-hover text-center">
                    <thead>
                      <tr>
                        <th width="3%">CustomerID</th>
                        <th width="5%">Username</th>
                        <th width="5%">Fullname</th>
                        <th width="10%">DateOfBirth</th>
                        <th width="10%">Phone</th>
                        <th width="10%">Email</th>
                        <th width="20%">Address</th>
                        <th width="10%">DriverNo</th>
                        <th width="10%">CreditCardNo</th>
                        <th width="15%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customer as $customers) :?>
                      <tr>
                        <td><?= $customers->getCustomerID() ?></td>
                        <td><?= $customers->getUsername() ?></td>
                        <td><?= $customers->getFullname() ?></td>
                        <td><?= $customers->getDateOfBirth() ?></td>
                        <td><?= $customers->getPhone() ?></td>
                        <td><?= $customers->getEmail() ?></td>
                        <td><?= $customers->getAddress() ?></td>
                        <td><?= $customers->getDriverNo() ?></td>
                        <td><?= $customers->getCreditCardNo() ?></td>






                        <td class="text-center">
                            <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal" data-id="<?= $customers->getCustomerID() ?>"><b><i class='fas fa-edit'></i> Edit</b></a>&nbsp;

                            <a href="/php_project/admin/?controller=customer&action=deleteCustomer&DCustomerID=<?= $customers->getcustomerID() ?>" onclick="return confirm('Are you sure you want to delete <?= $customers->getUsername() ?>')"  class="btn btn-sm btn-danger"><b><i class="fa fa-trash-o"></i> Delete</b></a>
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
                        <form class="form-horizontal w-50" action="/php_project/admin/?controller=customer&action=editCustomer" method="POST" >

                            <div class="card-body">
                                <h4 class="card-title"><i class="fa fa-file-text"></i>Edit Customer</h4>
                                <input type="hidden" name="CustomerID" value="">

                                <div class="form-group row">
                                    <label for="uname" class="col-sm-3 text-right control-label col-form-label">UserName :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  placeholder="User Name Here" name="Username" value="<?= $customers->getUsername() ?>" disabled="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 text-right control-label col-form-label">Password :</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control"  placeholder="Password is Here" name="Password" value="<?= $customers->getPassword() ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">FullName :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  placeholder="Full Name Here" name="Fullname" value="<?= $customers->getFullname()?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dob" class="col-sm-3 text-right control-label col-form-label">DOB :</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" placeholder="DateOfBirth" name="DateOfBirth" value="<?= $customers->getDateOfBirth()?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="number" class="col-sm-3 text-right control-label col-form-label">Phone Number :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="Phone" placeholder="Enter a mobile" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?= $customers->getPhone()?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 text-right control-label col-form-label">Email :</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="Email" placeholder="Enter a Email" value="<?= $customers->getEmail()?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 text-right control-label col-form-label"> Address :</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="5" name="Address" placeholder="Address" value="<?= $customers->getAddress()?>"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dlnumber" class="col-sm-3 text-right control-label col-form-label">Driver No :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="DriverNo" placeholder="Driver Licence Number" value="<?= $customers->getDriverNo()?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ccnumber" class="col-sm-3 text-right control-label col-form-label">CreditCard No :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="CreditCardNo" placeholder="Credit Card Number" value="<?= $customers->getCreditCardNo()?>">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                         <div class="col-md-6">
                            <button type="submit" class="btn btn-success btn-block" name="editCustomer">Edit</button>
                        </div>
                        <div class="col-md-6">
                            <a href="/php_project/admin/?controller=customer&action=view" class="btn btn-danger btn-block">Cancel</a>
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

        $.post("/php_project/admin/?core=1&controller=customer&action=singleCustomer", {id: id}, function(data, status){
            var customers = JSON.parse(data);
            $("#myModal input[name='CustomerID']").val(customers['CustomerID'])
            $("#myModal input[name='Username']").val(customers['Username']);
            $("#myModal input[name='Password']").val(customers['Password']);
            $("#myModal input[name='Fullname']").val(customers['Fullname']);
            $("#myModal input[name='DateOfBirth']").val(customers['DateOfBirth']);
            $("#myModal input[name='Phone']").val(customers['Phone']);
            $("#myModal input[name='Email']").val(customers['Email']);
            $("#myModal input[name='Address']").val(customers['Address']);
            $("#myModal input[name='DriverNo']").val(customers['DriverNo']);
            $("#myModal input[name='CreditCardNo']").val(customers['CreditCardNo']);
            


        });
    });

});
</script>
<!-- End Container fluid  -->

<?php unset($_SESSION['successmsg']); 
unset($_SESSION['errormsg']);
?>