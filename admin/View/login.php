
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Admin Login</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">

</head>

<body>
    <div class="main-wrapper">

        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="assets/images/logo.png" alt="logo" /></span>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" id="loginform" method="POST" action="/php_project/admin/?controller=login&action=login">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>

                                    <input type="hidden" name="controller" value="login">
                                    <input type="hidden" name="action" value="login">

                                    <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"  name="uname" required="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="Password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1"  name="pwd" required="">
                                </div>

                                <?php if (isset($_SESSION['errormsg'])): ?>
                                    <div class="input-group form-group my-4">
                                        <div class="alert alert-danger fade in alert-dismissible show">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true" style="font-size:20px">×</span>
                                                </button><strong>Error!</strong> <?= $_SESSION['errormsg']; ?>
                                            </div>
                                        </div>
                                        <?php elseif (isset($_SESSION['successmsg'])): ?>
                                            <div class="input-group form-group my-4">
                                                <div class="alert alert-success fade in alert-dismissible show">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true" style="font-size:20px">×</span>
                                                        </button>    <strong>Success!</strong> <?= $_SESSION['successmsg']; ?>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="row border-top border-secondary">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="p-t-20">

                                                    <input type="submit" name="login" class="btn btn-success float-right" value="Login">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="recoverform">
                                <div class="text-center">
                                    <span class="text-white">Enter your e-mail address below and we will send you instructions how to recover a password.</span>
                                </div>
                                <div class="row m-t-20">
                                    <!-- Form -->
                                    <form class="col-12" action="index.html">
                                        <!-- email -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        <!-- pwd -->
                                        <div class="row m-t-20 p-t-20 border-top border-secondary">
                                            <div class="col-12">
                                                <a class="btn btn-success" href="#" id="to-login" name="action">Back To Login</a>
                                                <button class="btn btn-info float-right" type="button" name="action">Recover</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- ============================================================== -->
                <!-- All Required js -->
                <!-- ============================================================== -->
                <script src="assets/libs/jquery/dist/jquery.min.js"></script>
                <!-- Bootstrap tether Core JavaScript -->
                <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
                <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
                <!-- ============================================================== -->
                <!-- This page plugin js -->
                <!-- ============================================================== -->
                <script>

                    $('[data-toggle="tooltip"]').tooltip();
                    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){

        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
</script>

</body>

</html>
<?php 
if (isset($_SESSION['successmsg'])) {
    unset($_SESSION['successmsg']);
} 
if (isset($_SESSION['errormsg'])) {
    unset($_SESSION['errormsg']);
}
   
?>