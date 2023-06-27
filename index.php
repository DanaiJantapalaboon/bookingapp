<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookingApp</title>

    <!-- Bootstrap & custom headers -->
    <link href="plugin/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugin/css/custom/headers.css" rel="stylesheet">
    <link href="plugin/css/custom/custom.css" rel="stylesheet">

    <!-- js Bootstrap -->
    <script src="plugin/js/bootstrap.bundle.min.js"></script>

    <!-- Full Calendar Packs-->
    <link href="plugin/lib/main.min.css" rel="stylesheet">
    <script src="plugin/lib/main.min.js"></script>

    <!-- DateTime Picker
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>-->

    <?php include "script_calendar.php"; ?>

</head>


<body>


<?php
    include "component_header.php";
    include "component_navbar.php";
    include "component_calendar.php";
    include "component_footer.php";
?>

    
</body>
</html>