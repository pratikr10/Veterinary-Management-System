<?php
session_start();

?>
<?php
$duration=20;
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
 <?php
                     $host="sql308.infinityfree.com";
                     $user="if0_34536180";
                     $password="y8PZWKrynQim";
                     $db="if0_34536180_vms";
                
                    $mysqli = new mysqli("sql308.infinityfree.com","if0_34536180","y8PZWKrynQim","if0_34536180_vms");

                    // $connect=mysqli_connect($host,$user,$password,$db);

                    // $mysqli=new mysqli('localhost','root','','vms');
                    $user=$_SESSION['username'];
                    $query="SELECT * FROM user WHERE  username='$user'";
                    $res=mysqli_query($mysqli,$query);
                    $row=mysqli_fetch_array($res);
                    $username=$row['username'];
                    $mobile=$row['mobile'];
                    
                    if(isset($_GET['date'])){
                        $date=$_GET['date'];  
                        
                        $stmt=$mysqli->prepare('select * from appointment where appointment_date=?');
                        $stmt->bind_param('s',$date);
                        $slotbookings=array();
                        if($stmt->execute()){
                            $result=$stmt->get_result();
                            if($result->num_rows>0){
                                while($row=$result->fetch_assoc()){
                                    $slotbookings[]=$row['time_booked'];
                                    
                                }
                                $stmt->close();
                            }
                        }
                        
                    }
                    //$query="INSERT INTO appointment(appointment_date) VALUES('$date')";
                    if(isset($_POST['book'])){
                        
                        $sym=$_POST['sym'];
                        $pet=$_POST['pet'];
                        $timeslot=$_POST['timeslot'];
                    //    $id=$_POST['doctor_id'];
                        
                        
                        $row=mysqli_num_rows($res);
                    if(empty($pet)){

                    }
                    else{
                                
                        $query="INSERT INTO appointment (doctor_id,username, status, mobile, appointment_date, date_booked, pet_type, symptoms) VALUES('3','$username','pending','$mobile','$date','$timeslot','$pet','$sym')";
                        $slotbookings[]=$timeslot;
                        $res=mysqli_query($mysqli,$query);
                        if($res){
                            $msg="<div class='alert alert-success'>Booking Successful</div>";
                            echo "<script>alert('You have booked an appointment')</script>";
                        }
                        else {
                            $msg="<div class='alert alert-success'>Booking Unsuccessful</div>";
                            echo "<script>alert('You have not booked an appointment')</script>";
                        }
                    }

                           
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
    
    ?>
    
                    
                   
    <div class="container">
    <h5 class="text-center">Book Appointment <?php echo $date; ?></h5>
    <div class="row">
        <div class="col-md-12">
            <?php isset($msg)?$msg:""; ?>
        </div>
    <?php
        $timeslots=timeslots($duration,$cleanup,$start,$end);
        
        foreach($timeslots as $ts){
            ?>
            <div class="col-md-2">
                <div class="form-group">
                    <?php if(in_array($ts,$slotbookings)){?>
                        <button class="btn btn-danger" style="margin:2px;"><?php echo $ts;?></button>
                    <?php }else{?>
                        <button class="btn btn-success book" data-timeslot="<?php echo $ts;?>" style="margin:2px;"><?php echo $ts;?></button>
                    <?php } ?>
                    
                </div>
            </div>
                        
        <?php } ?>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Booking: <span id="slot"></span></h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
               
                    <div class="form-group">
                        <label for="">Timeslot</label>
                        <input required  type="text" readonly name="timeslot" id="timeslot" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">PET</label>
                        <input required  type="text" name="pet" id="pet" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Symptoms</label>
                        <input required type="text" name="sym" id="sym" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-info" name="book" value="Book Appointment">

                </form>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> 
                        
                    
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="btn-group">
<script>
     $(".book").click(function(){
        var timeslot=$(this).attr('data-timeslot');
        $("#slot").html(timeslot);
        $("#timeslot").val(timeslot);
        $("#myModal").modal("show");

    })
</script>
</body>
</html>