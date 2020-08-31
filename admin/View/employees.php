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
                        <li class="breadcrumb-item"><a href="/php_project/admin/?controller=admindashboard&action=view"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Employees</li>
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



            <!--End validation for add employee -->

            <!-- Container fluid  -->

            <div class="container-fluid">
                <a href="#demo" class="btn btn-primary" data-toggle="collapse"><i class="fa fa-plus"></i>Add</a>
                <div id="demo" class="collapse mt-3">
                    <div class="card">


                        <form class="form-horizontal w-50" action="/php_project/admin/?controller=employees&action=registerEmployee" method="POST" >

                            <div class="card-body">
                                <h4 class="card-title"><i class="fa fa-file-text"></i> Register Employees</h4>






                                <div class="form-group row">
                                    <label for="uname" class="col-sm-3 text-right control-label col-form-label">UserName :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="User Name Here" name="Username" >

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 text-right control-label col-form-label">Password :</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" placeholder="Password is Here" name="Password" >


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">FullName :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Full Name Here" name="Fullname" >


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 text-right control-label col-form-label">Email :</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" placeholder="Email is Here" name="Email" >


                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-12">

                                        <input type="submit" class="btn btn-success float-right" value="Submit" name="addemp">
                                    </div>
                                </div>


                            </div>

                        </form>

                    </div>

                </div>

                <div class="container-fluid bg-white mt-3 pt-1">
                  <h2 class="text-center">Employees Details</h2>
                  
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th width="5%">EmpID</th>
                        <th width="10%">Username</th>
                        <th width="10%">Fullname</th>
                        <th width="10%">Email</th>
                        <th width="10%">Level</th>
                        <th width="5%">Status</th>
                        <th width="15%" class="text-center">Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php foreach ($employees as $employee) :?>
                      <tr>
                        <td><?= $employee->getUserID() ?></td>
                        <td><?= $employee->getUsername() ?></td>
                        <td><?= $employee->getFullname() ?></td>
                        <td><?= $employee->getEmail() ?></td>
                        <td><?= $employee->getLevel() ?></td>
                        <td><?= $employee->getStatus() ?></td>




                        <td class="text-center">
                            <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal" data-id="<?= $employee->getUserID() ?>"><b><i class='fas fa-edit'></i> Edit</b></a>&nbsp;

                            <a href="/php_project/admin/?controller=employees&action=banEmployee&BUserID=<?= $employee->getUserID() ?>" onclick="return confirm('Are you sure you want to Ban <?= $employee->getFullname() ?>')" class="btn btn-sm btn-dark"><b><i class="fa fa-ban"></i> Ban</b></a>&nbsp;

                            <a href="/php_project/admin/?controller=employees&action=deleteEmployee&DUserID=<?= $employee->getUserID() ?>" onclick="return confirm('Are you sure you want to delete <?= $employee->getFullname() ?>')" class="btn btn-sm btn-danger"><b><i class="fa fa-trash-o"></i> Delete</b></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <div class="container">



                  <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                      <div class="modal-content">
                        <div class="modal-header bg-white">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>

                      </div>
                      <div class="modal-body">
                         <form class="form-horizontal w-50" action="/php_project/admin/?controller=employees&action=editEmployee" method="POST" >

                            <div class="card-body">
                                <h4 class="card-title"><i class="fa fa-file-text"></i> Edit Employees</h4>
                                <input type="hidden" name="UserID" value="">

                                <div class="form-group row">
                                    <label for="uname" class="col-sm-3 text-right control-label col-form-label">UserName:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="uname"  name="Username" value="<?= $employee->getUsername() ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 text-right control-label col-form-label">Password:</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password" name="Password" value="<?= $employee->getPassword() ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">FullName:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fname" name="Fullname" value="<?= $employee->getFullname() ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 text-right control-label col-form-label">Email:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="email" name="Email" value="<?= $employee->getEmail() ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 text-right control-label col-form-label">Status:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="gender" name="Status">
                                            <option>Status</option>
                                            <option value="1" <?= $employee->getStatus() == "1"?'selected':'' ?>>Active</option>
                                            <option value="0" <?= $employee->getStatus() == "0"?'selected':'' ?>>Inactive</option>
                                        </select>
                                    </div>
                                </div>




                            </div>

                        </div>
                        <div class="modal-footer">
                         <div class="col-md-6">
                            <button type="submit" class="btn btn-success btn-block" name="editEmployee">Edit</button>
                        </div>
                        <div class="col-md-6">
                            <a href="/php_project/admin/?controller=employees&action=view" class="btn btn-danger btn-block">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

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

        $.post("/php_project/admin/?core=1&controller=employees&action=singleEmployee", {id: id}, function(data, status){
            var employee = JSON.parse(data);
            $("#myModal input[name='UserID']").val(employee['UserID'])
            $("#myModal input[name='Username']").val(employee['Username']);
            $("#myModal input[name='Password']").val(employee['Password']);
            $("#myModal input[name='Fullname']").val(employee['Fullname']);
            $("#myModal input[name='Email']").val(employee['Email']);
            $("#myModal input[name='Status']").val(employee['Status']);


        });
    });

});
</script>
<!-- End Container fluid  -->

<?php unset($_SESSION['successmsg']); 
unset($_SESSION['errormsg']);
?>