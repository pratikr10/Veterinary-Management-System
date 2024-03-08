<?php

// $host="vms.crmthbjxciun.ap-south-1.rds.amazonaws.com";
//     $user="admin";
//     $password="sameep077";
//     $db="vms";
    $host="sql308.infinityfree.com";
    $user="if0_34536180";
    $password="y8PZWKrynQim";
    $db="if0_34536180_vms";
session_start();
error_reporting(0);

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}



	$username=$_POST['uname'];
	$password=$_POST["pass"];
    $mobile=$_POST["mname"];
    $Email=$_POST["email"];
    $Gender=$_POST["gender"];


	$sql="select * from user where username='".$username."' ";

	$result=mysqli_query($data,$sql);

	$row=mysqli_num_rows($result);
    if($row==1){
        echo"<script>alert('Username already taken')</script>";
    }
    else{
        $reg="insert into user(username,password,mobile,email,date_reg,gender,profile) values('$username','$password','$mobile','$Email',NOW(),'$Gender','profile.jpg')";
        mysqli_query($data,$reg);
        echo"<script>Registration successful</script>";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>
</head>
<body>
    <?php
    include("include/header.php");
    ?>
    <div style="margin-top:60px;"></div>
    <div class="container" style="
    margin-top: 117px;
">
        <div class="col-mid-12">
            <div class="row">
                <div class="col-md-3"> </div>
                <div class="col-nd-6 jumbotron"  >
                    <form method="post" class="my-2">  
                         
                        <div class="form-group" style="padding: 3vh;">
                            <label >Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" >
                     </div>
                     
                     <div class="form-group" style="
    padding: 3vh;
">
                            <label >Password</label>
                            <input type="password" name="pass" class="form-control" >
                     </div>
                    
                    <div class="form-group" style="
    padding: 3vh;
">
                            <label >Mobile Number</label>
                            <input type="int" name="mname" class="form-control" autocomplete="off" placeholder="Enter Mobile" >
                     </div>

                     <div class="form-group" style="padding: 3vh;">
                            <label >Email</label>
                            <input type="text" name="email" class="form-control" autocomplete="off" placeholder="Enter Email" >
                     </div>

                     <div class="form-group" style="padding: 3vh;">
                            <label >Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="">Male</option>
                                <option value="">Female</option>
                            </select>
                     </div>

                    
                     <input type="submit" name="btn btn-success my-3" style="
    margin: 3vh;
" value="Register">
                    <p>Already have an account? <a href="patientlogin.php">Click here.</a></p>
                    </form>
                </div>
                
            </div>
        </div>

    </div>
</body>
</html>