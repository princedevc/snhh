<?php //session_start();
include_once('lib/header.php'); 
?>

<head>
    <title>Patient</title>
</head>
<body>
    <h4> Welcome To Your Page  </h4> <br/>
    <p>
    
    <?php
        if(isset($_SESSION['time'] )&& !empty($_SESSION['time'] )){
            echo "<span style='color:green'>"."Log in time:"."".$_SESSION["time"]."</span>";
          }
    ?>
    </p>

    <p><a href="logout.php">Logout</a>|
    <a href="dashboard.php">Dashboard </a>
    </p>
</body>
</html>

