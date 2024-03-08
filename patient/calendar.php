<?php
session_start();
function build_calendar($month, $year){
    //First of all we'll create an array containing names of all days in a week.
    $mysqli=new mysqli('localhost','root','','vms');
 
    $stmt=$mysqli->prepare('select * from appointment where MONTH(appointment_date)=? AND YEAR(appointment_date)=?');
    $stmt->bind_param('ss',$month,$year);
    $bookings=array();
    if($stmt->execute()){
        $result=$stmt->get_result();
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $bookings[]=$row['appointment_date'];
                
            }
            $stmt->close();
        }
        
    }
    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    //Then we'll get the first day of the month that is in the argument of this function
    $firstDayOfMonth = mktime(0,0,0,$month, 1, $year);
    //Now getting the number of days this month contains
    $numberDays = date('t', $firstDayOfMonth);
    //Getting some information about the first day of this month
    $dateComponents = getdate($firstDayOfMonth);
   
    //Getting the name of this month
    $monthName = $dateComponents['month'];
    //Getting the index value 0-6 of the first day of this month
    $dayOfWeek = $dateComponents['wday'];
    //Getting the current date
    $dateToday = date('Y-m-d');
    $prev_month=date('m',mktime(0,0,0,$month-1,1, $year));
    $prev_year=date('Y',mktime(0,0,0,$month-1,1, $year));
    $next_month=date('m',mktime(0,0,0,$month+1,1, $year));
    $next_year=date('Y',mktime(0,0,0,$month+1,1, $year));
    $calendar ="<center><h2>$monthName $year</h2>";
    $calendar.="<a class='btn btn-primary btn-xs' href='?month=".$prev_month." &year=".$prev_year."'>Prev Month</a>";
    $calendar.="<a class='btn btn-primary btn-xs' href='?month=".date('m')." &year=".date('Y')."'>Current Month</a>";
    $calendar.="<a class='btn btn-primary btn-xs' href='?month=".$next_month." &year=".$next_year."'>Next Month</a></center>";
    //Now creating the HTML table
    $calendar.= "<table class='table table-bordered'>";
    
    $calendar.= "<tr>";
    //Creating the calendar headers
    foreach($daysOfWeek as $day){
    $calendar.= "<th class='header'>$day</th>";
    }
    $calendar.= "</tr><tr>";

//The variable $dayOfWeek will make sure that there must be only 7 columns on our table
    $currentDay = 1;
    if($dayOfWeek >0){
        for($k=0;$k<$dayOfWeek;$k++){
            $calendar.="<td class='empty'></td>"; 
        }
    
    }
    //Getting the month number
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    while($currentDay <= $numberDays){
       
        //if seventh column (saturday) reached, start a new row
    if($dayOfWeek == 7){
    $dayOfWeek = 0; 
    $calendar.= "</tr><tr>";
    }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        $dayName=strtolower(date('l',strtotime($date)));
        $today=$date==date('Y-m-d')?"today":" ";
        
        if($dayName=='sunday'){
            $calendar.="<td><h4>$currentDay</h4><a class='btn btn-danger btn-xs'>Holiday</a></td>";
        }
        elseif($date<date('Y-m-d')){
            
            $calendar.="<td><h4>$currentDay</h4><a class='btn btn-danger btn-xs'>N/A</a></td>";
            
            
            
        }
        /*elseif(in_array($date,$bookings)){
            $calendar.="<td class='$today'><h4>$currentDay</h4><a class='btn btn-danger btn-xs'>Booked</a></td>";
            
        }*/
        else{
            $totalbookings=checkSlots($mysqli,$date);
            if($totalbookings>28){
                $calendar.="<td class='$today'><h4>$currentDay</h4><a href='#' class='btn btn-danger btn-xs'>ALL BOOKED</a></td>"; 
            }
            else{
                $calendar.="<td class='$today'><h4>$currentDay</h4><a href='book.php?date=".$date."' class='btn btn-success btn-xs'>Book</a></td>";
            }
            
        }
       
    
        $currentDay++;
        $dayOfWeek++;
        }

        //Completing the row of the last week in month, if necessary
if($dayOfWeek < 7){
    $remainingDays = 7-$dayOfWeek;
    for($i=0;$i<$remainingDays; $i++){
    $calendar.= "<td class='empty'></td>";
    }
    }
    $calendar.= "</tr>";
    $calendar.= "</table>";
    


    return $calendar;

}
function checkSlots($mysqli,$date){
    $stmt=$mysqli->prepare('select * from appointment where appointment_date=?');
    $stmt->bind_param('s',$date);
    $totalbookings=0;
    if($stmt->execute()){
        $result=$stmt->get_result();
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $totalbookings++;
                
            }
            $stmt->close();
        }
        
    }
    return $totalbookings;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /*table{
            table-layout:fixed;
        }
        td{
            width:33%;
        }
        .today{
            background:yellow;
        } */
        @media only screen and (max-width:760 px),(min-device-width:802px) and (max-device-width:1020px){
            table,
            thead,
            tbody,
            th,
            td,
            tr{
                display:block;
            }

            .empty{
                display:none;
            }
            th{
                position:absolute;
                top: -9999px;
                left: -9999px;
            }
            tr{
                border: 1px solid #ccc;
            }
            td{
                border:none;
                border-bottom:1px solid #eee;
                position:relative;
                padding-left:50%;
            }
            td:nth-of-type(1):before{
                content:"Sunday";
            }

        }
            @media only screen and (min-device-width:320px) and (max-device-width:480px){
                body{
                    padding:0;
                    margin:0;
                }
            }
            @media only screen and (min-device-width:802px) and (max-device-width:1020px){
                body{
                    width:495px;
                }
            }
            @media only screen and (min-width:641px) {
                table{
                    table-layout:fixed;
                }
                td{
                    width:33%;
                }
            }
            .row{
                margin-top:20px;
            }
            .today{
                background:yellow;
            }

    </style>
</head>
<body>
<?php
    include("../include/header.php");
    ?>
    <?php
    $host="sql308.infinityfree.com";
    $user="if0_34536180";
    $password="y8PZWKrynQim";
    $db="if0_34536180_vms";


    $connect=mysqli_connect($host,$user,$password,$db);
    ?>
    <div class="container">
        <div class="row" style="
    margin-top: 12vw;
">
            <div class="col-md-12">
                <?php
                    $dateComponents=getdate();
                    if(isset($_GET['month']) && isset($_GET['year'])){
                        $month=$_GET['month'];
                        $year=$_GET['year'];
                        echo build_calendar($month,$year);
                    }
                    else{
                    $month=$dateComponents['mon'];
                    $year=$dateComponents['year'];
                    echo build_calendar($month,$year);
                    }
                    
                    
                    
                ?>
            </div>
        </div>
    </div>
</body>
</html>