<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors PAGE</title>
</head>
<body>
    <?php    
    include ("../include/header.php");
    $host="sql308.infinityfree.com";
                     $user="if0_34536180";
                     $password="y8PZWKrynQim";
                     $db="if0_34536180_vms";



$connect=mysqli_connect($host,$user,$password,$db);
    ?>
    <div class="container-fluid">
        <div class="col-md-12" style="
    margin-top: 84px;
">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php
                        include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10" >
                    <div class="container-fluid">
                        <div class="col-md-12" 
>
                            <div class="row">
                                <div class="col-md-3 my-2 bg-info mx-2" style="height:150px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8" >
                                            <h5 class="text-white" style="margin-top: 30px;">My profile</h5>
                                       </div>
                                       <div class="col-md-2">
                                       <a href="#"> <i class="fa fa-user-circle fa-3x my-4" style="color:white"></i></a>
                                       </div>
                                    </div>
                                </div>

                                </div>

                                <div class="col-md-3 my-2 bg-warning mx-1" style="height:150px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8" >
                                        <?php
                                        $ad=mysqli_query($connect,"SELECT * FROM user");
                                        $num=mysqli_num_rows($ad);
                                        ?>
                                        <h5 class="text-white my-2" style="font-size:30px;"><?php echo $num;?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Patient</h5>
                                       </div>
                                       <div class="col-md-2">
                                       <a href="#"> <i class="fa fa-procedures fa-3x my-4" style="color:white"></i></a>
                                       </div>
                                    </div>
                                </div>

                                </div>

                                <div class="col-md-3 my-2 bg-success mx-2" style="height:150px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <?php
                                        $ad=mysqli_query($connect,"SELECT * FROM appointment");
                                        $num=mysqli_num_rows($ad);
                                        ?>
                                        <h5 class="text-white my-2" style="font-size:30px;"><?php echo $num;?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Appointment</h5>
                                       </div>
                                       <div class="col-md-2">
                                       <a href="appointment.php"> <i class="fa fa-calendar fa-3x my-4" style="color:white"></i></a>
                                       </div>
                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</body>
</html>