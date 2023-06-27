<?php

    session_start();
    require_once 'connection.php';

    if (isset($_POST['editbooking'])) {
        $id = $_POST['id'];
        $scheduler = $_POST['scheduler'];
        $purpose = $_POST['purpose'];
        $room = $_POST['room'];
        $startdate = $_POST['startdate'];
        $finisheddate = $_POST['finisheddate'];
        $editby = $_POST['editby'];

        try {

            $sql = $conn->prepare("UPDATE booking SET scheduler = :scheduler, purpose = :purpose, room = :room, start = :start, end = :end, editby = :editby WHERE id = :id");

            $sql->bindParam(":id", $id);
            $sql->bindParam(":scheduler", $scheduler);
            $sql->bindParam(":purpose", $purpose);
            $sql->bindParam(":room", $room);
            $sql->bindParam(":start", $startdate);
            $sql->bindParam(":end", $finisheddate);
            $sql->bindParam(":editby", $editby);
            $sql->execute();

            echo "<script>alert('Booking update successfully!'); window.location.href='../allevents/allevents.php';</script>";

            } catch(PDOException $e) {
                echo $e->getMessage();

            }
        }
?>