<?php include '../connection/connection.php' ?>
<?php include '../connection/session.php' ?>
<?php
    $action = $_GET['action']; //$_GET perform function on the url //
?>



<?php
   
    if ($action=='registerstaff'){

        $counterid="USER";

        $counterquery=mysqli_query($conn, "SELECT counter_value+1 AS counter_value FROM counter_tab WHERE counter_id='$counterid'");
        $counterqueryfetch=mysqli_fetch_array($counterquery);

        $countervalue=$counterqueryfetch['counter_value'];
        $userid=$counterid.$countervalue;
       

        /////  CHECK IF THE PASSWORD IN THE PASSWORD INPUT IS SAME AS THE ONE IN THE CONFIRMPASSWORD INPUT ///
        if($password!=$confirmpassword){

        ?>
        <script>
            alert('Password not match')
            window.parent(location="../registration-form.php")
        </script>
    
<?php 
    }else{

        /////  CHECK IF THE EMAIL IN THE EMAIL INPUT EXISTS /////
        $get_all_email=mysqli_query($conn, "SELECT * FROM `registration_tab` WHERE Email_address='$Email'");
        $count_email=mysqli_num_rows($get_all_email);
        
        if($count_email > 0) {
?>       
        <script>
            alert('Email already exists')
            window.parent(location="../registration-form.php")
        </script>     
<?php     
    }else{

            if(isset($_POST['submitpassport']) && isset($_FILES['ImageSelector'])){
        
                $image_name=$_FILES['ImageSelector']['name'];
                $tmp_name=$_FILES['ImageSelector']['tmp_name'];
                $error=$_FILES['ImageSelector']['error'];
                $image_size=$_FILES['ImageSelector']['size'];
        
                if($error== 0){
                    if($image_size > 500000){
?>
                     <script>
                        alert('Sorry, Your Image is too Large')
                        window.parent(location="registration-form.php")
                    </script>
        <?php
                    }else{
                        $image_extension= pathinfo($image_name, PATHINFO_EXTENSION);
                        $image_ex_lowercase=strtolower($image_extension);
                        $allowed_ex= array("jpg", "jpeg", "png");
        
                        if(in_array($image_ex_lowercase, $allowed_ex)){
                            $new_image_name=uniqid("IMG-", true).'.'.$image_ex_lowercase;
                            $image_upload_path='uploads/'.$new_image_name;
                            move_uploaded_file($tmp_name, $image_upload_path );
                            mysqli_query($conn, "UPDATE counter_tab SET counter_value='$countervalue' WHERE counter_id='$counterid'");
    
                          /// UPDATE THE COUNTER_TAB ///
                        mysqli_query($conn, "UPDATE counter_tab SET counter_value='$countervalue' WHERE counter_id='$counterid'");
                    
                        /// INSERTION INTO THE DATABASE ////  
                        mysqli_query($conn, "INSERT INTO `registration_tab`
                        (`user_id`, `First_name`, `Last_name`, `Date_of_birth`, `Gender`, `Phone_number`, `Email_address`, `Residential_address`, `password`, `Date`, `passport`) VALUES
                        ('$userid', '$Firstname', '$Lastname', '$Dateofbirth', '$Gender', '$Phonenumber', '$Email', '$Residentialaddress', '$password', NOW(), '$new_image_name')") or die('cannot insert into registration_tab');
                    
        ?>
                    <script>
                        window.parent(location="../registration-successful.php")
                    </script>
        <?php
                        }
                    }
                }else{
                    
        ?>
                    <script>
                        alert('Unknown Error Occured!!!')
                        window.parent(location="registration-form.php")
                    </script>
        <?php
                }
        
            }else{
        ?>
                <script>
                    window.parent(location="registration-form.php")
                </script>
        <?php
            }
        ?>

            <script>
                window.parent(location="../registration-successful.php");
            </script>


<?php


}
}
}
?>

<?php  
    // UPDATE THE DATABASE //
    if($action=='update'){
        $user_profile_id=$_GET['userid'];


        if(isset($_POST['update_submit']) && isset($_FILES['ImageFinder'])){
        
            $image_name=$_FILES['ImageFinder']['name'];
            $tmp_name=$_FILES['ImageFinder']['tmp_name'];
            $error=$_FILES['ImageFinder']['error'];
            $image_size=$_FILES['ImageFinder']['size'];
    
            if($error== 0){
                if($image_size > 500000){
?>
                 <script>
                    alert('Sorry, Your Image is too Large')
                    window.parent(location="../view-list-profile.php")
                </script>
    <?php
                }else{
                    $image_extension= pathinfo($image_name, PATHINFO_EXTENSION);
                    $image_ex_lowercase=strtolower($image_extension);
                    $allowed_ex= array("jpg", "jpeg", "png");
    
                    if(in_array($image_ex_lowercase, $allowed_ex)){
                        $new_image_name=uniqid("IMG-", true).'.'.$image_ex_lowercase;
                        $image_upload_path='uploads/'.$new_image_name;
                        move_uploaded_file($tmp_name, $image_upload_path );
                        mysqli_query($conn, "UPDATE counter_tab SET counter_value='$countervalue' WHERE counter_id='$counterid'");

                        mysqli_query($conn, "UPDATE `registration_tab`
                        SET `First_name`='$Firstname',`Last_name`='$Lastname',`Date_of_birth`='$Dateofbirth',`Gender`='$Gender',`Phone_number`='$Phonenumber',`Email_address`='$Email',`Residential_address`='$Residentialaddress', `passport`='$new_image_name' WHERE `user_id`='$user_profile_id'") or die('cannot update');
                
    ?>
                <script>
                    window.parent(location="../update-successful.php");
                </script>
    <?php
                    }
                }
            }else{
                
    ?>
                <script>
                    alert('Unknown Error Occured!!!')
                    window.parent(location="../view-list.php")
                </script>
    <?php
            }
    
        }else{
    ?>
            <script>
                alert('A known Error Occured!!!')
                window.parent(location="../view-list.php")
            </script>
    <?php
        }
    ?>



        
<?php 
    }
 ?>

 <?php 
    ///  DELETE FROM THE DATABASE ///
    if($action=='delete'){
        $user_profile_id=$_GET['userid'];
        mysqli_query($conn, "DELETE FROM `registration_tab` WHERE `user_id`='$user_profile_id'") or die('cannot delete from database');
 ?>
        <script>
            window.parent(location="../delete-successful.php");
        </script>

<?php 
    }
?>



<?php
    if ($action=='checkemail'){
        $checkemailquery=mysqli_query($conn, "SELECT Email_address FROM `registration_tab` where Email_address='$reset_password_email'");
        $check=mysqli_num_rows($checkemailquery);

        if ($check > 0) {
            $checkuseridquery=mysqli_query($conn, "SELECT `user_id` FROM `registration_tab` where Email_address='$reset_password_email'");
            $useridcheck=mysqli_fetch_array($checkuseridquery);
            $checkemail_userid=$useridcheck['user_id'];
?>    
            <script>
                window.parent(location="../reset-password-form.php?userid=<?php echo $checkemail_userid ?>")
            </script>  
<?php      
        }else{
?>
            <script>
                alert('Email not found')
                window.parent(location="../login-page.php")
            </script>
<?php
        }
        
    }
?>

<?php
    if($action=='resetpassword'){
        if($password!=$confirmpassword){
?>      
            <script>
                alert('Passsword not match')
                window.parent(location="../login-page.php")
            </script>  
<?php   
        }else
      
            $reset_password_userid=$_GET['userid'];
            mysqli_query($conn, "UPDATE `registration_tab`
            SET `password`='$password' WHERE `user_id`='$reset_password_userid'") or die('cannot update');
        

?>
            <script>
                window.parent(location="../reset-password-successful.php")
            </script>
<?php
        }


?>


<?php 
    if($action=='login'){
        $loginemailquery=mysqli_query($conn, "SELECT * FROM registration_tab WHERE Email_address='$loginemail' AND `password`='$loginpassword'");
        $loginemailcount=mysqli_num_rows($loginemailquery);
        
   

    if($loginemailcount>0){
        $loginuseridfetch=mysqli_fetch_array($loginemailquery);
        $loginuserid=$loginuseridfetch['user_id'];

        $_SESSION['user_id']=$loginuserid;
        $loginuserid=$_SESSION['user_id'];
?>
            <script>
                window.parent(location="../user-profile.php")   
            </script>
<?php
    }else{
?>
            <script> 
                alert('Invalid Login Details') 
                window.parent(location="../login-page.php")     
            </script>
<?php
         
    } 
}
?>

<?php
    if ($action=='logout'){
        session_destroy();
?>
            <script>
                window.parent(location="../session-destroyed.php")
            </script> 
<?php      
    }
?>