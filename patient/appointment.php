<?php
session_start();


?>
<?php
$duration=10;
$cleanup=0;
$start="09:00";
$end="18:00";
function timeslots($duration,$cleanup,$start,$end){
    $start=new DateTime($start);
    $end= new DateTime($end);
    $interval=new DateInterval("PT".$duration."M");
    $cleanupInterval=new DateInterval("PT".$cleanup."M");
    $slots=array();

    for($intStart=$start;$intStart<$end;$intStart->add($interval)->add($cleanupInterval)){
        $endPeriod=clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }
        $slots[]=$intStart->format("H:iA")."-".$endPeriod->format("H:iA");
    }
    return $slots;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
</head>
<body> 
    <?php
    include("../include/header.php");
    $host="sql308.infinityfree.com";
    $user="if0_34536180";
    $password="y8PZWKrynQim";
    $db="if0_34536180_vms";



    $connect=mysqli_connect($host,$user,$password,$db);
    ?>
    <div class="contaier-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 style="margin-left:-30px; margin-top:85px; " style="
    margin-top: 85px;
">
                    <?php
                    include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10" style="
    margin-top: 110px;
">  
                    
                    <?php
                    $user=$_SESSION['username'];
                    $query="SELECT * FROM user WHERE  username='$user'";
                    $res=mysqli_query($connect,$query);
                    $row=mysqli_fetch_array($res);
                    $username=$row['username'];
                    $mobile=$row['mobile'];
                    if(isset($_GET['date'])){
                        $date=$_GET['date'];
                    }
                    if(isset($_POST['book'])){
                        
                        $sym=$_POST['sym'];
                        $pet=$_POST['type'];
                        $id=$_POST['doctor_id'];
                        
                        
                        $row=mysqli_num_rows($res);
                    if(empty($pet)){

                    }
                    else{
                        
                        $query="INSERT INTO appointment (doctor_id,username, status, mobile, appointment_date, date_booked, pet_type, symptoms) VALUES('$id','$username','pending','$mobile','$date',NOW(),'$pet','$sym')";
                       
                        $res=mysqli_query($connect,$query);
                        if($res){
                            echo "<script>alert('You have booked an appointment')</script>";
                        }
                    }

                        
                        
                        
                    }
                    ?>
                   <div class="container">
                   <h5 class="text-center">Book Appointment <?php echo date('Y-m-d',strtotime($date)); ?></h5>
                   <div class="row">
                   <?php
                        $timeslots=timeslots($duration,$cleanup,$start,$end);
                        foreach($timeslots as $ts){
                            ?>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button class="btn btn-success button" data-timeslot="<?php echo $ts;?>" style="margin:2px;"><?php echo $ts;?></button>
                                </div>
                            </div>
                        
                        <?php } ?>
                   </div>
                   </div>
                    
                   
                        
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <form method="post">
                                    <select name="doctor_id">
                                        <optgroup label="Select Doctor">
                                            <?php
                                            $d_query="SELECT * from doctor";
                                            $result=mysqli_query($connect,$d_query);
                                            if(mysqli_num_rows($result)>0){
                                                while($d_row=mysqli_fetch_assoc($result)){
                                                    ?>
                                                    <option value="<?php echo $d_row['doctor_id']?>"><?php echo $d_row['username']?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </optgroup>
                                    </select>
                                    <label for="">Timeslot</label>
                                    <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
                                    <label>Pet type</label>
                                    <input required type="text" name="type" class="form-control" >
                                    <label>Symptoms</label>
                                    <input required type="text" name="sym" class="form-control">
                                    <input type="submit" class="btn btn-info" name="book" value="Book Appointment">

                                </form>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>