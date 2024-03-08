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


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["uname"];
	$password=$_POST["pass"];


	$sql="select * from user where username='".$username."' AND password='".$password."' ";

	$result=mysqli_query($data,$sql);

	$row=mysqli_fetch_array($result);

	if($row["usertype"]=="user")
	{	

		$_SESSION["username"]=$username;

		header("location:patient/index.php");
	}

	else
	{
		echo "<script>alert('username and password incorrect')</script>";
	}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient LOGIN</title>
</head>
<body>
    <?php
    include("include/header.php");
    ?>
    <div style="margin-top:60px;"></div>
    <div class="container-fluid" style="
    margin-top: 117px;
">
        <div class="col-mid-12">
            <div class="row">
                <div class="col-md-3"> </div>
                <div class="col-nd-6 jumbotron"  >
                    <form method="post" class="my-2">  
                         
                        <div class="form-group" style="
    padding: 3vh;
">
                            <label >Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" >
                     </div>
                     <div class="form-group" style="
    padding: 3vh;
">
                            <label > Password</label>
                            <input type="password" name="pass" class="form-control" >
                     </div>
                     <input type="submit" name="btn btn-success my-3" style="
    margin: 3vh;
" value="Login">
                    <p>Don't Have an account? <a href="signup.php">Click Here</a></p>
                    </form>
                </div>
                
            </div>
        </div>

    </div>
</body>
</html>