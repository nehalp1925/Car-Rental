<?php 

spl_autoload_register(function ($class_name){
    require_once $class_name . '.class.php';
});

session_start();
$DBmanager = new DBmanager();

/*var_dump($_GET);*/

/*echo decrypt($_GET['username']);*/
if(isset($_GET['Username'])){
    $Username = Functions::decrypt($_GET['Username']);
    if($DBmanager->verify_existance($Username)){
        $DBmanager->activateUser($Username);
        echo "Validation Sucesfully done";

        echo '<br><a href="index.php">Click Here to go to Login</a>';

    }else
        echo "no";
}else
    echo "something";





 ?>