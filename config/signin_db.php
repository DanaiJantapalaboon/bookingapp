<?php

    session_start();
    require_once 'connection.php';

    if (isset($_POST['signin'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        try {

            // ใช้ method prepare เพื่อป้องกัน SQL injection

            $check_data = $conn->prepare("SELECT * FROM account WHERE email = :email");
            $check_data->bindParam(":email", $email);
            $check_data->execute();
            $row = $check_data->fetch(PDO::FETCH_ASSOC);

            if ($check_data->rowCount() > 0) {                              // ถ้า login ถูก (match ในฐานข้อมูล)
                if ($email == $row['email']) {                              // เช็ค email ตรงกันหรือไม่
                    if (password_verify($password, $row['password'])) {     // เช็ค password ตรงกันหรือไม่
                        if ($row['urole'] == 'admin') {                     // เช็ค user level
                            $_SESSION['admin_login'] = $row['id'];          // ถ้าเป็น admin ให้ไปที่หน้า admin.php
                            header("location: admin.php");


                        } else {
                            $_SESSION['user_login'] = $row['id'];           // ถ้าเป็น user ให้ไปที่หน้า user.php
                            header("location: ../login/main.php");
                            // echo "<script>alert('Login Success!'); window.location.href='../login/main.php';</script>";
                        }
                            

                    } else {
                        echo "<script>alert('Incorrected Password! Please try again.'); window.location.href='../index.php';</script>";

                    }
                } else {
                    echo "<script>alert('Incorrected E-mail! Please try again.'); window.location.href='../index.php';</script>";

                }
            } else {
                echo "<script>alert('Error! wrong e-mail! or password, Please try again.'); window.location.href='../index.php';</script>";

            }

        } catch(PDOException $e) {
            echo $e->getMessage();

        }
    }

?>