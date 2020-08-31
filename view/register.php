<?php
  include "load/head.php";
?>
<body id="register">
<div class="signup-form">
    <form action="/php_project/?controller=register&action=register" method="post">
        <h2>Register</h2>

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
        <div class="form-group">
            <div class="row">
                <div class="col-md-6"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
                <div class="col-md-6"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
            </div>          
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6"><input type="text" class="form-control" name="r_username" placeholder="Username" required="required"></div>
                <div class="col-md-6"><input type="date" class="form-control" name="dob" placeholder="Date of Birth" required="required"></div>
            </div>          
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6"><input type="password" class="form-control" name="r_password" placeholder="Password" required="required"></div>
                <div class="col-md-6"><input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required"></div>
            </div>          
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6"><input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control" name="phone" placeholder="Phone" required="required"></div>
                <div class="col-md-6"><input type="email" class="form-control" name="r_email" placeholder="Email" required="required"></div>
            </div>          
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Address" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="driverNo" placeholder="Driver #" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="credit_card" placeholder="Credit Card #" required="required">
        </div>        
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success btn-lg" name="register">Register Now</button>
            <button type="reset" class="btn btn-danger btn-lg" name="reset">Reset</button>
        </div>
        <div class="text-center">Already have an account? <a href="/php_project/">Sign in</a></div>
    </form>
</div>
</body>

</html>
<?php unset($_SESSION['successmsg']); 
   unset($_SESSION['errormsg']);
?>