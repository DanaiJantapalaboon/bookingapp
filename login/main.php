<?php

    session_start();
    require_once '../config/connection.php';

    if (!isset($_SESSION['user_login'])) {
        header("location: ../index.php");
    } else {

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookingApp</title>

    <!-- Bootstrap & custom headers -->
    <link href="../plugin/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugin/css/custom/headers.css" rel="stylesheet">
    <link href="../plugin/css/custom/custom.css" rel="stylesheet">

    <!-- js Bootstrap -->
    <script src="../plugin/js/bootstrap.bundle.min.js"></script>

    <!-- Full Calendar Packs-->
    <link href="../plugin/lib/main.min.css" rel="stylesheet">
    <script src="../plugin/lib/main.min.js"></script>

    <!-- DateTime Picker -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" /> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> -->

    <?php include "../script_calendar.php"; ?>

</head>


<body>

<?php // เอาไว้ดึง login ไปหน้าอื่นๆ
    if (isset($_SESSION['user_login'])) {
        $user_id = $_SESSION['user_login'];
        $stmt = $conn->query("SELECT * FROM account WHERE id = $user_id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }


    include "../component_header.php";
    include "component_navbar_login.php";
?>

    <div class="container" id="contentBox">
        <div class="text-end">
            <p><b>Welcome!, <?php echo $row['name'] . ' ' . $row['surname']. ' '; ?><a href="#" data-bs-toggle="modal" data-bs-target="#editaccount">Edit account</a></b><br>
            BookingApp System - Version 1.00</p>
        </div>

        <h3 class="text-center mt-4">Scheduling Calendar</h3>
        <hr>

        <div class="container py-3" id='calendar'></div>
    </div>

    <?php include "../component_footer.php"; ?>
    
</body>
</html>

<?php } ?>