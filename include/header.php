<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $loggedin=true;
}else{
    $loggedin=false;
}
?> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Ginny Corporation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
		<script src="https://kit.fontawesome.com/0ef8057b2b.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" width="90" height="90" ALT="align box" ALIGN=CENTER></a>
        </div>
        <div class="phone_navbar">
        <div class="nav_button">
            <span class="bar1" ></span>
            <span class="bar2" ></span>
        </div>
        <div class="menu">
            <ul>  
                <?php
                if(!$loggedin){
                    ?>
                    <li><div class="apply_ani"><a href="apply_online.php">Register</a></div></li>
                    <?php
                }
                ?>
                <?php
                if($loggedin){
                    ?>
                    <li><div class="about_ani"><a href="<?php echo $_SESSION['pagelink'];?>">Dashboard</a></div></li>
                    <?php
                }
                ?>
                <li><div class="contact_ani"><a href="contact_us.php">Contact Us</a></div></li>
                <li><div class="about_ani"><a href="our_mission.php" id="aboutus">About Us</a></div>
            </ul>
        </div>
        </div>
        <?php
            if(!$loggedin){
                ?>
                <ul>
        <li><div class="login"><a href="login.php">Login</a></div></li>
        </ul>
        <?php
            }
        ?>
        
        <?php
            if($loggedin){
                ?>
                <ul>
        <li><div class="login"><a href="logout.php">Logout</a></div></li>
        </ul>
        <?php
            }
        ?>
    </nav>