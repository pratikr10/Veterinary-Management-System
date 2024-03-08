<?php
session_start();
include("../include/header.php");
$host="sql308.infinityfree.com";
                     $user="if0_34536180";
                     $password="y8PZWKrynQim";
                     $db="if0_34536180_vms";



$connect=mysqli_connect($host,$user,$password,$db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment page</title>
    <link rel="stylesheet" href="style4.css">
</head>
<style>
    table{
    border-collapse: collapse;
    background-color: rgba(0, 119, 255, 0.6);
    box-shadow: 0 10px 20px 0 rgba(0,0,0,.03);
    border-radius: 10px;
    margin: auto;

}

th,td{
    border: 1px solid #011064;
    
    padding: 8px 30px;
    text-align: center;
    color: rgb(255, 255, 255);

}
th{
    text-transform: uppercase;
    font-weight: 500;
}
td{
    font-size: 13px;
}
</style>
<body>
<div class="main-div" style="margin-top:140px;">
        <h3 style="
    text-align: center;
">All appointment Details</h3>
<div class="center-div">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>username</th>
                            <th>mobile</th>
                            <th>appointment_date</th>
                            <th>time_booked</th>
                            <th>pet_type</th>
                            <th>symptoms</th>
                            <th>Action</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                     $d_query="SELECT * from appointment ";
                     $result=mysqli_query($connect,$d_query);
                         while($d_row=mysqli_fetch_array($result)){
                            ?>
                            <tr>
                            <td><?php echo $d_row['id'];?></td>
                            <td><?php echo $d_row['username'];?></td>
                            <td><?php echo $d_row['mobile'];?></td>
                            <td><?php echo $d_row['appointment_date'];?></td>
                            <td><?php echo $d_row['time_booked'];?></td>
                            <td><?php echo $d_row['pet_type'];?></td>
                            <td><?php echo $d_row['symptoms'];?></td>
                            <td><?php echo $d_row['status'];?></td>
                            <td>
                                <form action="appointment.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $d_row['id']; ?>">
                                    <input type="submit" name="approve" value="approve">
                                    <input type="submit" name="reject" value="reject">
                                </form>
                            </td>

                        </tr>
                        <?php
                         }
                    
                    ?>
                       
                    </tbody>
                </table>
                <?php
                if(isset($_POST['approve'])){
                        $id=$_POST['id'];
                        $select="UPDATE appointment SET status='approved' where id='$id'";
                        $result=mysqli_query($connect,$select);
                        

                     }
                     if(isset($_POST['reject'])){
                        $id=$_POST['id'];
                        $select="UPDATE appointment SET status='rejected' where id='$id'";
                        $result=mysqli_query($connect,$select);
                        

                     }
                     ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>