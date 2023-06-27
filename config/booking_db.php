<?php

    session_start();
    require_once 'connection.php';

    if (isset($_POST['booking'])) {
        $scheduler = $_POST['scheduler'];
        $purpose = $_POST['purpose'];
        $room = $_POST['room'];
        $startdate = $_POST['startdate'];
        $finisheddate = $_POST['finisheddate'];


        try {
            //$query = "INSERT INTO booking(scheduler, purpose, room, start, end) VALUES(:scheduler, :purpose, :room, :start, :end)");
            $stmt = $conn->prepare("INSERT INTO booking(scheduler, purpose, room, start, end) VALUES(:scheduler, :purpose, :room, :start, :end)");

            $stmt->bindParam(":scheduler", $scheduler);
            $stmt->bindParam(":purpose", $purpose);
            $stmt->bindParam(":room", $room);
            $stmt->bindParam(":start", $startdate);
            $stmt->bindParam(":end", $finisheddate);
            $stmt->execute();

            header("location: ../login/main.php");
            //echo "<script>alert('Booking Complete!, Thank you for your information.'); window.location.href='../login/main.php';</script>";

            } catch(PDOException $e) {
                echo $e->getMessage();

        }
    }

?>