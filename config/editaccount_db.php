<?php

    session_start();
    require_once 'connection.php';

    if (isset($_POST['save'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $position = $_POST['position'];
        $organisation = $_POST['organisation'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        if ($password != $confirmpassword) {
            echo "<script>alert('Password confirmation Incorrected, Please try again.'); window.location.href='../login/main.php';</script>";

        } else {
            try {

                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("UPDATE account SET name = :name, surname = :surname, email = :email, position = :position, organisation = :organisation, password = :password WHERE id = :id");

                $stmt->bindParam(":id", $id);
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":surname", $surname);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":position", $position);
                $stmt->bindParam(":organisation", $organisation);
                $stmt->bindParam(":password", $passwordHash);
                $stmt->execute();

                echo "<script>alert('Update Account Successfully!'); window.location.href='../login/main.php';</script>";

            } catch(PDOException $e) {
                echo $e->getMessage();

            }
        }
    }

?>