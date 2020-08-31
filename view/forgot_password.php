<?php
  include "load/head.php";
?> 

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5" id="forgot_card">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
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
        <form action="/php_project/?controller=forgot&action=forgot" method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus" name="forgot_email">
              <label for="inputEmail">Enter email address</label>
            </div>
          </div>
          <input type="submit" name="forgot_password"class="btn btn-primary btn-block" value="Reset Password">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="/php_project/?controller=register&action=">Register an Account</a>
          <a class="d-block small" href="/php_project/">Login Page</a>
          <a class="d-block small" href="/php_project/?controller=reset&action="">reset Page</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<?php unset($_SESSION['successmsg']); 
   unset($_SESSION['errormsg']);
?>
