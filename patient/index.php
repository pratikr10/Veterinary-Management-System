<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient PAGE</title>
</head>
<body>
    <?php
    include ("../include/header.php");
    ?>
    <div class="container-fluid" >
        <div class="col-md-12" style="
    margin-top: 84px;
">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php
                        include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-3 bg-info mx-2" style="height: 150px; margin-top :20px;">
                                    <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-4">My profile</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="profile.php">
                                                <i class="fa fa-user-circle fa-3x my-4" style="color:white;"></i>
                                            </a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-3 bg-danger mx-2" style="height: 150px; margin-top :20px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-4">Book Appointment</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="calendar.php">
                                                <i class="fa fa-calendar fa-3x my-4" style="color:white;"></i>
                                            </a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-3 bg-warning mx-2" style="height: 150px; margin-top :20px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-4">Booked Status</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="booked.php">
                                                <i class="fa fa-file-invoice-dollar fa-3x my-4" style="color:white;"></i>
                                            </a>
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