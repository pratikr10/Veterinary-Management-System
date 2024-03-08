<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
    <?php
    include("include/header.php");
    $host="sql308.infinityfree.com";
    $user="if0_34536180";
    $password="y8PZWKrynQim";
    $db="if0_34536180_vms";



    $connect=mysqli_connect($host,$user,$password,$db);
    ?>
    
    <div class="main-div" style="margin-top:140px;">
        <h3 style="
    text-align: center;
">Contact Details of all Registered Vet Doctors</h3>
        <div class="center-div">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>username</th>
                            <th>mobile</th>
                            <th>address</th>
                            <th>email</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                     $d_query="SELECT * from doctor";
                     $result=mysqli_query($connect,$d_query);
                         while($d_row=mysqli_fetch_array($result)){
                            ?>
                            <tr>
                            <td><?php echo $d_row['doctor_id'];?></td>
                            <td><?php echo $d_row['username'];?></td>
                            <td><?php echo $d_row['mobile'];?></td>
                            <td><?php echo $d_row['address'];?></td>
                            <td><?php echo $d_row['email'];?></td>
                        </tr>
                        <?php
                         }
                     
                    ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>