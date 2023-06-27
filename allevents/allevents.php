<?php

    session_start();
    require_once '../config/connection.php';

    if (!isset($_SESSION['user_login'])) {
        header("location: ../index.php");
    } else {

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->query("DELETE FROM booking WHERE id = $delete_id");
        $deletestmt->execute();
    
        if ($deletestmt) {
            //echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted successfully";
            header("refresh:2; url=allevents.php"); // หน่วงเวลา refresh 2 วินาที เพื่อให้แสดงข้อความ session
        }
    }

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

    <!-- Jquery & Table Filter Plugin -->
    <script src="../plugin/jquery/jquery.min.js"></script>
    <script src="../plugin/jquery/ddtf.js"></script>

    <!-- DateTime Picker -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" /> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> -->

    <?php include "../script_calendar.php"; ?>

</head>


<body>

<?php   // เอาไว้ดึง login ไปหน้าอื่นๆ
    if (isset($_SESSION['user_login'])) {
        $user_id = $_SESSION['user_login'];
        $stmt = $conn->query("SELECT * FROM account WHERE id = $user_id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }


    include "../component_header.php";
    include "component_navbar_allevents.php";
?>

    <div class="container" id="contentBox">
        <div class="text-end">
            <p><b>Welcome!, <?php echo $row['name'] . ' ' . $row['surname']. ' '; ?><a href="#" data-bs-toggle="modal" data-bs-target="#editaccount">Edit account</a></b><br>
            BookingApp System - Version 1.00</p>
        </div>
        <h3 class="text-center mt-4 mb-4">Scheduling Calendar - Summary Table</h3>

        <!-- ------------------------------------------------------------------------------------------------------------------- -->
        <!-- PHP SelectBox -->
        <?php
            // $stmtScheduler = $conn->prepare("SELECT DISTINCT scheduler FROM booking");
            // $stmtScheduler->execute();
            // $results_scheduler = $stmtScheduler->fetchAll();

            // $stmtRoom = $conn->prepare("SELECT DISTINCT room FROM booking");
            // $stmtRoom->execute();
            // $results_Room = $stmtRoom->fetchAll();
        ?>

        <!-- SelectBox ข้อมูล -->
        <!-- <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <h5>Filter Scheduler :</h5>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu..</option>
                        <?php //foreach($results_scheduler as $output) { ?>
                        <option><?php //echo $output['scheduler']; ?></option>
                        <?php //} ?>
                    </select>
                </div>

                <div class="col-sm-4">
                    <h5>Filter Room :</h5>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu..</option>
                        <?php //foreach($results_Room as $output) { ?>
                        <option><?php //echo $output['room']; ?></option>
                        <?php //} ?>
                    </select>
                </div>
            </div>
        </div> -->
        <!-- PHP SelectBox -->
        <!-- ------------------------------------------------------------------------------------------------------------------- -->

<style>


    tr:nth-child(even) {
  background-color: #f2f2f2;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
}


tr:hover {background-color: lightgray;}

select {
    border: none;
    width: 120px;
    font-weight: bold;
    background-color: lightgray;
}

thead {
    background-color: lightgray;

}

</style>

        <!-- ส่วนตาราง -->
        <div class="container py-3 table-responsive">
            <!-- <table class="table table-hover" id="myTable"> -->
                <!-- <thead class="table-danger"> -->
            <table cellpadding="3" id="myTable">
                <thead>
                    <tr>
                        <th class="py-2" scope="col">#</th>
                        <th scope="col">Scheduler</th>
                        <th scope="col" class="skip-filter">Purpose</th>
                        <th scope="col">Room</th>
                        <th scope="col" class="skip-filter">Start-Date</th>
                        <th scope="col" class="skip-filter">End-Date</th>
                        <th scope="col" class="skip-filter">Edit by</th>
                        <th scope="col" class="skip-filter">Timestamp</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if (isset($_SESSION['success'])) { ?>
                        <div class="alert alert-success">
                            <?php    // สคริปต์ดึงข้อความ success
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                            ?>
                        </div>
                    <?php } ?>

                    <?php   // สคริปต์ดึงข้อมูลจากตาราง booking
                        

                        $stmt = $conn->query("SELECT * FROM booking ORDER BY timestamp DESC");
                        $stmt->execute();
                        $booking = $stmt->fetchAll();

                        if (!$booking) {
                            echo "<p><td colspan='9' class='text-center'>No booking found</td></p>";
                        } else {
                            foreach ($booking as $user_booking) {
                    ?>

                    <tr>
                        <th scope="row"><?php echo $user_booking['id']; ?></th>
                        <td><?php echo $user_booking['scheduler']; ?></td>
                        <td><?php echo $user_booking['purpose']; ?></td>
                        <td><?php echo $user_booking['room']; ?></td>
                        <td><?php echo $user_booking['start']; ?></td>
                        <td><?php echo $user_booking['end']; ?></td>
                        <td><?php echo $user_booking['editby']; ?></td>
                        <td><?php echo $user_booking['timestamp']; ?></td>

                        <td>
                            <!-- Pass Value ไป Modal ต้องใช้ button เท่านั้น -->
                            <?php
                                $scheduler = strval(trim($user_booking['scheduler']));
                                $user = strval(trim($row['name'] . ' ' . $row['surname']));
                                if ($scheduler == $user) { ?>
                                    <button type="submit" data-bs-toggle="modal" data-bs-target="#editBooking<?php echo $user_booking['id']; ?>" class="btn btn-success">Edit</button>
                                    <a href="?delete=<?php echo $user_booking['id']; ?>" class="btn btn-danger" onclick="return confirm('Please confirm to delete ?')">Delete</a>
                                <?php } else { ?>
                                    <button type="button" disabled class="btn btn-secondary">Edit</button>
                                    <button type="button" disabled class="btn btn-secondary">Delete</button>
                                <?php }

                            ?>

                        </td>
                    </tr>

                    <?php
                            include "../modal_editbooking.php";
                            }
                        }
                    ?>
                    
                </tbody>
            </table>



            <script type="text/javascript">


                $('#myTable').ddTableFilter();
            </script>
        </div>
    </div>

    <?php include "../component_footer.php" ?>
</body>
</html>

<?php } ?>