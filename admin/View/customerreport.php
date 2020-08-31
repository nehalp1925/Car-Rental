<?php include 'View/menubar.php'; ?>
<?php include 'View/sidebar.php'; ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
   <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Customer Report</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/php_project/admin/?controller=admindashboard&action=view">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Customer Report</li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <div class="container-fluid">
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

</div>
</div>
</div>

<!-- Container fluid  -->
<div class="container-fluid">
    <div class="container-fluid bg-white mt-3 pt-1">
        <h2 class="text-center">Customer Report</h2>

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
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
</div>

</div>

<!-- End Container fluid  -->

