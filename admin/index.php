<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE</title>
</head>
<body>
    <?php
    include ("../include/header.php");
    include("../include/connection.php");
    ?>
    <div class="container-fluid" style="
    
    /* padding-left: inherit; */
    padding-bottom: 6vw;
">
        <div class="col-md-8" style="
    margin-top: 84px;
">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php
                    include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <h4 class="my-2">Admin Dashboard</h4>
                    <div class="col-md-12 my-1">
                        <div class="row">
                            <div class="col-md-3 bg-success mx-2" style="height:130px;">
                            <div class="col-nd-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php
                                        $ad=mysqli_query($connect,"SELECT * FROM admin");
                                        $num=mysqli_num_rows($ad);                                     ?>
                                        <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $num;?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Admin</h5>
                                    </div>
                                    <div class="col-md-3" ><a href="a.php">
                                        <i class="fa fa-users-cog fa-3x my-5" style="color:white;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-3 bg-info mx-2" style="height:130px;">
                            <div class="col-nd-12">
                                <div class="row">
                                    <div class="col-md-6">
                                    <?php
                                        $ad=mysqli_query($connect,"SELECT * FROM doctor");
                                        $num=mysqli_num_rows($ad);                                     ?>
                                        <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $num;?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Doctors</h5>
                                    </div>
                                    <div class="col-md-3" ><a href="d.php">
                                        <i class="fa fa-user-md fa-3x my-5" style="color:white;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-3 bg-warning mx-2" style="height:130px;">
                            <div class="col-nd-12">
                                <div class="row">
                                    <div class="col-md-6">
                                    <?php
                                        $ad=mysqli_query($connect,"SELECT * FROM user");
                                        $num=mysqli_num_rows($ad);                                     ?>
                                        <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $num;?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Users</h5>
                                    </div>
                                    <div class="col-md-3" ><a href="p.php">
                                        <i class="fa fa-procedures fa-3x my-5" style="color:white;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-danger mx-2" style="height:130px;margin:8px;">
                            <div class="col-nd-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php
                                        $ad=mysqli_query($connect,"SELECT * FROM appointment");
                                        $num=mysqli_num_rows($ad);                                     ?>
                                        <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $num;?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Appointments</h5>
                                    </div>
                                    <div class="col-md-2" ><a href="app.php">
                                        <i class="fa fa-users-cog fa-3x my-4" style="color:white;"></i></a>
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