<?php
    require "connect.php";

    $username = $_POST["Username"];
    $password = $_POST["Password"];

    $sql = "SELECT * FROM user WHERE Username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $username);
    $stmt->execute();
    $row = $stmt->fetch();

    if (empty($row)) {
        echo "<script>
                alert('Username หรือ Password ไม่ถูกต้อง');
                window.location.href='http://localhost/Project_Books/login.php';
            </script>";
    }

    if (password_verify($password, $row["Password"])) {
        session_start();
        session_regenerate_id(); /* ป้องกัน Session Fixation */    
        $_SESSION["userId"] = $row["UserId"];
        $_SESSION["username"] = $row["Username"];
        $_SESSION["displayName"] = $row["DisplayName"];
        $_SESSION["publisherName"] = $row["PublisherName"];
        $_SESSION["role"] = $row["Role"];
        if($row["Role"] == "admin") {
            echo "<script>window.location.href='http://localhost/Project_Books/admin.php';</script>";
        }
        else {
            echo "<script>window.location.href='http://localhost/Project_Books/';</script>";
        }
    }
    else {
        echo "<script>
                alert('Username หรือ Password ไม่ถูกต้อง');
                window.location.href='http://localhost/Project_Books/login.php';
            </script>";
    }
?>