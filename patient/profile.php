
<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile page</title>
</head>
<body>
    <?php
    include("../include/header.php");
    $host="sql308.infinityfree.com";
    $user="if0_34536180";
    $password="y8PZWKrynQim";
    $db="if0_34536180_vms";
    
    
    
    $connect=mysqli_connect($host,$users,$password,$db);
    
    
    $user=$_SESSION['username'];
    $query="SELECT * FROM user WHERE  username='$user'";
    $res=mysqli_query($connect,$query);
    $row=mysqli_fetch_array($res);
    ?>

    <div class="contaier-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 style="margin-left:-30px;" style="margin-top:85px;">
                    <?php
                    include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10" style="
    margin-top: 110px;
">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                
                                if(isset($_POST['upload'])){
                                    $img=$_FILES['img']['name'];
                                    if(empty($img)){

                                    }else{
                                        $user=$_SESSION['username'];
                                        $query="UPDATE user SET profile='$img' WHERE username='$user'";
                                        $res=mysqli_query($connect,$query);
                                
                                        if($res){
                                            move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
                                        }
                                
                                    }
                                }
                                ?>
                                <h5> My Profile</h5>
                                <form method="post" enctype="multipart/form-data">
                                    <?php
                                        echo "<img src='img/".$row["profile"]."' class='col-md-7' style='height:250px;'>";
                                    ?>
                                    <input type="file" name="img" class="form-control my-2">
                                    <input type="submit" name="upload" class="btn btn-info" value="Update Profile">
                                </form>

                                <table class="table table-bordered">
                                    <tr>
                                        <th colspa="2" class="text-center">My details</th>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $row['username'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td><?php echo $row['mobile'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $row['gender'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $row['email'];?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-centre">Change Username</h5>
                                <?php
                                
                                if(isset($_POST['update'])){
                                    $uname=$_POST['uname'];
                                    if(empty($uname)){

                                    }else{
                                        $user=$_SESSION['username'];
                                        $query="UPDATE user SET username='$uname' WHERE username='$user'";
                                        $res=mysqli_query($connect,$query);
                                
                                        if($res){
                                            $_SESSION['username']=$uname;
                                        }
                                
                                    }
                                }
                                ?>
                                <form method="POST">
                                    <label>Enter Username</label>
                                    <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter username">
                                    <input type="submit" name="update" class="btn btn-info my-2"  value="Update Username" >
                                </form>
                                <h5 class="text-centre">Change Password</h5>
                                <?php
                                
                                if(isset($_POST['update'])){
                                    $pass=$_POST['pass'];
                                    if(empty($pass)){

                                    }else{
                                        $user=$_SESSION['username'];
                                        $query="UPDATE user SET password='$pass' WHERE username='$user'";
                                        $res=mysqli_query($connect,$query);
                                
                                        if($res){
                                            $_SESSION['password']=$pass;
                                        }
                                
                                    }
                                }
                                ?>
                                <form method="POST">
                                    <label>Enter New Password</label>
                                    <input type="password" name="pass" class="form-control" placeholder="Enter Password">
                                    <input type="submit" name="update" class="btn btn-info my-2"  value="Update Password" >
                                </form>

                                <h5 class="text-centre">Change Email</h5>
                                <?php
                                
                                if(isset($_POST['update'])){
                                    $email=$_POST['email'];
                                    if(empty($email)){

                                    }else{
                                        $user=$_SESSION['username'];
                                        $query="UPDATE user SET email='$email' WHERE username='$user'";
                                        $res=mysqli_query($connect,$query);
                                
                                        if($res){
                                            $_SESSION['email']=$email;
                                        }
                                
                                    }
                                }
                                ?>
                                <form method="POST">
                                    <label>Enter New Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Enter email">
                                    <input type="submit" name="update" class="btn btn-info my-2"  value="Update email" >
                                </form>

                                <h5 class="text-centre">Change Mobile Number</h5>
                                <?php
                                
                                if(isset($_POST['update'])){
                                    $mobile=$_POST['mobile'];
                                    if(empty($mobile)){

                                    }else{
                                        $user=$_SESSION['username'];
                                        $query="UPDATE user SET mobile='$mobile' WHERE username='$user'";
                                        $res=mysqli_query($connect,$query);
                                
                                        if($res){
                                            $_SESSION['mobile']=$mobile;
                                        }
                                
                                    }
                                }
                                ?>
                                <form method="POST">
                                    <label>Enter New Mobile Number</label>
                                    <input type="int" name="mobile" class="form-control" placeholder="Enter mobile">
                                    <input type="submit" name="update" class="btn btn-info my-2"  value="Update mobile" >
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>