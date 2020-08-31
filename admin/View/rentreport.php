<?php include 'View/menubar.php'; ?>
<?php include 'View/sidebar.php'; ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
 <div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">Cars Report</h4>
      <div class="ml-auto text-right">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/php_project/admin/?controller=admindashboard&action=view">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cars Report</li>
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
<div class="container-fluid bg-white mt-3 pt-1">
  <h2 class="text-center">Rental Details</h2>

  <table class="table table-hover text-center">
    <thead>
      <tr>
        <th width="4%">RentalID</th>
        <th width="8%">CarID</th>
        <th width="8%">CustomerID</th>
        <th width="15%">StartDate</th>
        <th width="15%">EndDate</th>
        <th width="4%">TosAccepted</th>
        <th width="5%">Cancelled</th>
        <th width="8%">Inspected</th>
        <th width="18%">Notes</th>
        
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

          </tr>
        <?php endforeach; ?>
      </div>

      <!-- End Container fluid  -->

