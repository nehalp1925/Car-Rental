<?php include 'View/menubar.php'; ?>
<?php include 'View/sidebar.php'; ?><!-- Page wrapper  -->
<div class="page-wrapper">
 <div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">

      <div class="ml-auto text-right">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/php_project/admin/?controller=admindashboard&action=view"><i class="fa fa-home" aria-hidden="true"></i>  Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Rent car</li>
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

      <form class="form-horizontal w-50" action="/php_project/admin/?controller=rental&action=registerRental" method="POST" id="form1">

        <div class="card-body">
          <h4 class="card-title"><i class="fa fa-file-text"></i> Rent a Car</h4>


          <div class="form-group row">
            <label for="CarID" class="col-sm-4 text-right control-label col-form-label">CarID :</label>
            <div class="col-sm-8">

             <select name="CarID" class="form-control">
              <?php foreach ($allcars as $c): ?>
                <option><?= $c->getCarID(); ?></option>
              <?php endforeach ?>

            </select>
            
          </div>
        </div>

        <div class="form-group row">
         <label for="CustomerID" class="col-sm-4 text-right control-label col-form-label">CustomerID :</label>
         <div class="col-sm-8">

           <select name="CustomerID" class="form-control">
            <?php foreach ($allCustomers as $cust): ?>
              <option><?= $cust->getCustomerID(); ?></option>
            <?php endforeach ?>

          </select>

        </div>
      </div>









      <div class="form-group row">
        <label for="startdate" class="col-sm-4 text-right control-label col-form-label">Start Date :</label>
        <div class="col-sm-8">
          <input type="date" class="form-control start_date" placeholder="Enter a start date." name="DateStart">

        </div>
      </div>
      <div class="form-group row">
        <label for="enddate" class="col-sm-4 text-right control-label col-form-label">End Date :</label>
        <div class="col-sm-8">
          <input type="date" class="form-control enddate" placeholder="Enter a End Date" name="DateEnd">

        </div>
      </div>
      <div class="form-group row">
        <label for="TosAccepted" class="col-sm-4 text-right control-label col-form-label">TOS Accepted :</label>
        <div class="col-sm-8">
          <input type="text" class="form-control start_date"  placeholder="Yes/No" name="TosAccepted">

        </div>
      </div>
      <div class="form-group row">
        <label for="Cancelled" class="col-sm-4 text-right control-label col-form-label">Cancelled Car :</label>
        <div class="col-sm-8">
          <input type="text" class="form-control start_date"  placeholder="Yes/No" name="Cancelled">

        </div>
      </div>
      <div class="form-group row">
        <label for="Inspected" class="col-sm-4 text-right control-label col-form-label">Inspected :</label>
        <div class="col-sm-8">
          <input type="text" class="form-control start_date"  placeholder="Yes/No" name="Inspected">

        </div>
      </div>

      <div class="form-group row">
        <label for="notes" class="col-sm-4 text-right control-label col-form-label">Notes :</label>
        <div class="col-sm-8">
          <textarea class="form-control" rows="5" name="Notes" placeholder="notes"></textarea>
        </div>
      </div>



      <div class="form-group row">

        <div class="col-sm-12">
          <input type="submit" class="btn btn-success float-right" value="Submit" name="addrental">
        </div>
      </div>


    </div>

  </form>

</div>

</div>

<div class="container-fluid bg-white mt-3 pt-1">
  <h2 class="text-center">Rental Details</h2>

  <table class="table table-hover text-center">
    <thead>
      <tr>
        <th width="4%">RentalID</th>
        <th width="8%">CarID</th>
        <th width="8%">CustomerID</th>
        <th width="8%">StartDate</th>
        <th width="8%">EndDate</th>
        <th width="4%">TosAccepted</th>
        <th width="5%">Cancelled</th>
        <th width="8%">Inspected</th>
        <th width="18%">Notes</th>
        <th width="20%" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <tbody>
        <?php foreach ($rental as $rentals) :?>
          <tr>
            <td><?= $rentals->getRentalID() ?></td>
            <td><?= $rentals->getCarID() ?></td>
            <td><?= $rentals->getCustomerID() ?></td>
            <td><?= $rentals->getDateStart() ?></td>
            <td><?= $rentals->getDateEnd() ?></td>
            <td><?= $rentals->getTosAccepted() ?></td>
            <td><?= $rentals->getCancelled() ?></td>
            <td><?= $rentals->getInspected() ?></td>
            <td><?= $rentals->getNotes() ?></td>



            <td class="text-center">
              <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal" data-id="<?= $rentals->getRentalID() ?>"><b><i class='fas fa-edit'></i> Edit</b></a>&nbsp;

              <a href="/php_project/admin/?controller=rental&action=deleteRental&DRentalID=<?= $rentals->getRentalID() ?>" onclick="return confirm('Are you sure you want to delete <?= $rentals->getRentalID() ?>')" class="btn btn-sm btn-danger"><b><i class="fa fa-trash-o"></i> Delete</b></a>
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
                  <form class="form-horizontal w-50" action="/php_project/admin/?controller=rental&action=editRental" method="POST" >

                    <div class="card-body">
                      <h4 class="card-title"><i class="fa fa-file-text"></i> Edit Rental Car</h4>
                      <input type="hidden" name="RentalID" value="">

                      <div class="form-group row">
                        <label for="CarID" class="col-sm-4 text-right control-label col-form-label">CarID :</label>
                        <div class="col-sm-8">

                         <select name="CarID" class="form-control">
                          <?php foreach ($allcars as $c): ?>
                            <option><?= $c->getCarID(); ?></option>
                          <?php endforeach ?>

                        </select>
                        
                      </div>
                    </div>

                    <div class="form-group row">
                     <label for="CustomerID" class="col-sm-4 text-right control-label col-form-label">CustomerID :</label>
                     <div class="col-sm-8">

                       <select name="CustomerID" class="form-control">
                        <?php foreach ($allCustomers as $cust): ?>
                          <option><?= $cust->getCustomerID(); ?></option>
                        <?php endforeach ?>

                      </select>

                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="startdate" class="col-sm-4 text-right control-label col-form-label">Start Date :</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control start_date" placeholder="Enter a start date." name="DateStart" value="<?= $rentals->getDateStart() ?>">

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="enddate" class="col-sm-4 text-right control-label col-form-label">End Date :</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control enddate" placeholder="Enter a End Date" name="DateEnd" value="<?= $rentals->getDateEnd() ?>">

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="TosAccepted" class="col-sm-4 text-right control-label col-form-label">TOS Accepted :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control start_date"  placeholder="Yes/No" name="TosAccepted" value="<?= $rentals->getTosAccepted() ?>">

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Cancelled" class="col-sm-4 text-right control-label col-form-label">Cancelled Car :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control start_date"  placeholder="Yes/No" name="Cancelled" value="<?= $rentals->getCancelled() ?>">

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Inspected" class="col-sm-4 text-right control-label col-form-label">Inspected :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control start_date"  placeholder="Yes/No" name="Inspected" value="<?= $rentals->getInspected() ?>">

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="notes" class="col-sm-4 text-right control-label col-form-label">Notes :</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" rows="5" id="notes" name="Notes" placeholder="notes" value="<?= $rentals->getNotes() ?>"></textarea>
                    </div>
                  </div>






                </div>
                <div class="modal-footer">
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-success btn-block" name="editRental">Edit</button>
                  </div>
                  <div class="col-md-6">
                    <a href="/php_project/admin/?controller=rental&action=view" class="btn btn-danger btn-block">Cancel</a>
                  </div>
                </form>
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

        $.post("/php_project/admin/?core=1&controller=rental&action=singleRental", {id: id}, function(data, status){
          var rental = JSON.parse(data);
          $("#myModal input[name='RentalID']").val(rental['RentalID'])
          $("#myModal input[name='CarID']").val(rental['CarID']);
          $("#myModal input[name='CustomerID']").val(rental['CustomerID']);
          $("#myModal input[name='DateStart']").val(rental['DateStart']);
          $("#myModal input[name='DateEnd']").val(rental['DateEnd']);
          $("#myModal input[name='TosAccepted']").val(rental['TosAccepted']);
          $("#myModal input[name='Cancelled']").val(rental['Cancelled']);
          $("#myModal input[name='Inspected']").val(rental['Inspected']);
          $("#myModal input[name='Notes']").val(rental['Notes']);



        });
      });

    });
  </script>






  <!-- End Container fluid  -->

<?php unset($_SESSION['successmsg']); 
unset($_SESSION['errormsg']);
?>