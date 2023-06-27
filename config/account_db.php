<?php

    session_start();
    require_once 'connection.php';

    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $position = $_POST['position'];
        $organisation = $_POST['organisation'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        if ($password != $confirmpassword) {
            echo "<script>alert('Password confirmation Incorrected, Please try again.'); window.location.href='../index.php';</script>";

        } else {
            try {

                // เช็คอีเมลล์ซ้ำใน db เวลาสมัคร
                // ใช้ method prepare เพื่อป้องกัน SQL injection

                $check_email = $conn->prepare("SELECT email FROM account WHERE email = :email");
                $check_email->bindParam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['email'] == $email) {
                    echo "<script>alert('E-mail has already registered, Please try again.'); window.location.href='../index.php';</script>";
                    //$_SESSION['warning'] = "มีอีเมลล์นี้อยู่ในระบบแล้ว <a href='signin.php'>คลิ๊กที่นี่เพื่อเข้าสู่ระบบ</a>";
                    //header("location: index.php");

                // ถ้าไม่ซ้ำให้เพิ่มข้อมูลลง db ได้

                } else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO account(name, surname, email, position, organisation, password)
                                            VALUES(:name, :surname, :email, :position, :organisation, :password)");

                    $stmt->bindParam(":name", $name);
                    $stmt->bindParam(":surname", $surname);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":position", $position);
                    $stmt->bindParam(":organisation", $organisation);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->execute();

                    echo "<script>alert('Register Successfully! Please login.'); window.location.href='../index.php';</script>";

                } else {
                    echo "<script>alert('Something went wrong!'); window.location.href='../index.php';</script>";
                }

            } catch(PDOException $e) {
                echo $e->getMessage();

            }
        }
    }

?>