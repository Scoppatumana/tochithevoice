<?php include 'connection/connection.php' ?>
<?php include 'connection/code.php' ?>

<html>
    <head>
        <title>www.yooga.com</title>
        <?php include 'reference.php' ?>
    </head>

    <!-- HEADER CSS -->
 <body>



    <div class="menu-bar-overall-div" onClick="_close_menu();">
        <div class="side-menu-bar">
            <ul class="side-bar-ul">
             <a href="index.php"><li class="side-bar-li">HOME</li></a>
             <a href="registration-form.php"><li class="side-bar-li">REGISTER</li></a>
             <a href="view-list.php"><li class="side-bar-li">VIEW LIST</li></a>
            </ul>
        </div>
    </div>











    <header class="animated fadeInDown animated animated">
            <div class="header-top-div">
                <div class="header-top-inner-div">
                    <div class="available-periods open-periods">
                        <i class="fa fa-clock-o fa-lg"></i> 8:00 - 9:00 Mon - Fri
                    </div>
                    <div class="available-periods appointment-phone">
                        <i class="fa fa-phone fa-lg"></i> +123 456 7890 For Appointment
                    </div>
                    <ul>
                        <a href="#"> <li> <i class="fa fa-twitter"></i> </li> </a>
                        <a href="#"> <li> <i class="fa fa-facebook"></i> </li> </a>
                        <a href="#"> <li> <i class="fa fa-linkedin"></i> </li> </a>
                        <a href="#"> <li> <i class="fa fa-instagram"></i> </li> </a>
                    </ul>
                </div>
            </div>

<?php  
    if ($s_userid=='') {
        
    
?>
            <div class="header-bottom-div">
                <div class="header-bottom-centered-div">
                    <h1>Y<span>oo</span>GA</h1>
                    <button class="login_btn menu-btn" onClick="_open_menu();"> <i class="fa fa-bars fa-lg"></i></button>
                    <a href="login-page.php"><button class="login_btn"> <i class="fa fa-lock"></i> LOGIN </button></a>
                    <ul class="navbar-ul">
                        <a href="index.php"> <li class="active navigation">HOME</li> </a>
                        <a href="registration-form.php"> <li class="navigation">REGISTER</li> </a>
                        <a href="view-list.php"> <li class="navigation">VIEW LIST</li> </a>
                        <li class="navigation"><i class="fa fa-search"></i></li>                      
                    </ul>
                    
                </div>
            </div>
<?php
    }else{
?>                     
         <div class="header-bottom-div">
                <div class="header-bottom-centered-div">
                    <h1>Y<span>oo</span>GA</h1>
                    <button class="login_btn menu-btn" onClick="_open_menu();"> <i class="fa fa-bars fa-lg"></i></button>
                    <a href="connection/code.php?action=logout"><button class="login_btn"> <i class="fa fa-lock"></i> LOGOUT </button></a>
                    <ul class="navbar-ul">
                        <a href="index.php"> <li class="active navigation">HOME</li> </a>
                        <a href="registration-form.php"> <li class="navigation">REGISTER</li> </a>
                        <a href="view-list.php"> <li class="navigation">VIEW LIST</li> </a>
                        <li class="navigation"><i class="fa fa-search"></i></li>                      
                    </ul>
                    
                </div>
            </div>
<?php
    }
?>
        </header>

   
</body>
    

   

<html>