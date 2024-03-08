<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VMS SYSTEM</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
    <link rel="stylesheet" href="style10.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-1g navbar-dark p-md-3" style="
    background-color: #0009;    line-height: 10px;

">
        <h5 class="text-white"> VETERINARY MANAGEMENT SYSTEM </h5>

        <div class="mr-auto"></div> 
        <ul class="navbar-nav">
            <?php
            
            if(isset($_SESSION['username'])){
                $user=$_SESSION['username'];
                echo '
                
            <li class="nav-item"><a href="../index.php" class="nav-link text-white">'.$user.'</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>
                ';
            }
            else{
                echo'
                
                <li class="nav-item" style="font-size:12px;"><a href="adminlogin.php" class="nav-link text-white">ADMIN</a></li>
            <li class="nav-item" style="font-size:12px;"><a href="patientlogin.php" class="nav-link text-white">PATIENT</a></li>
            <li class="nav-item" style="font-size:12px;"><a href="doctorlogin.php" class="nav-link text-white">DOCTOR</a></li>
            <li class="nav-item" style="font-size:12px;"><a href="contact.php" class="nav-link text-white">CONTACT</a></li>
                ';
            }
            ?>
            
        </ul>
    </nav>
    
</body>

</html>