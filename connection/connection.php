    
<?php 
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING);
header("Acces-Contorl-Allow-Origin");/// to call API and clear the error from web-page
   

    // Database Configuration //
    $main_server = "localhost";
    $server_username = "root";
    $server_password = "";

    // Create Connection //
    $conn = mysqli_connect($main_server, $server_username, $server_password) or die("connection error");
    mysqli_select_db($conn, "yooga_database");
?>

<?php 

    // variable declaration  //

     $Firstname=trim($_POST['Firstname']);
     $Lastname=trim($_POST['Lastname']);  
     $Dateofbirth=trim($_POST['Dateofbirth']);  
     $Gender=trim($_POST['Gender']);
     $Phonenumber=trim($_POST['Phonenumber']);
     $Email=trim($_POST['Email']);
     $Residentialaddress=trim($_POST['Residentialaddress']);
     $password=trim($_POST['Createpassword']);
     $confirmpassword=trim($_POST['Confirmpassword']);
     $reset_password_email=trim($_POST['resetpasswordemail']);
     $loginemail=trim($_POST['loginemail']);
     $loginpassword=trim($_POST['loginpassword']);
?>