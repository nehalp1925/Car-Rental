<?php
  include "load/head.php";
?> 

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5" id="forgot_card">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Reset your password</h4>
          <p>Welcom <?=$_SESSION['forgetuser'] ?> !Please enter your new password and confirm password.</p>
        </div>
        <form action="/php_project/?controller=reset&action=reset" method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" class="form-control" placeholder="New Password" required="required" name="newpassword">
              <label for="password">New Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="conpassword" class="form-control" placeholder="Confirm password" required="required" name="newConpassword">
              <label for="conpassword">Confirm password</label>
            </div>
          </div>
          <input type="submit" name="reset_password" class="btn btn-primary btn-block" value="Reset Password">
        </form>
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
    </div>
  </div>
</body>

</html>
<?php unset($_SESSION['successmsg']); 
   unset($_SESSION['errormsg']);
?>
