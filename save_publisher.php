<?php
    session_start();
    require "connect.php";

    $publisherName = $_POST["PublisherName"];
    $firstName = $_POST["FirstName"];
    $lastName = $_POST["Lastname"];
    $publisherTel = $_POST["PublisherTel"];
    $username = $_SESSION["username"];

    $sql = "UPDATE user SET PublisherName = ?, FirstName = ?, LastName = ?, PublisherTel = ? WHERE Username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $publisherName);
    $stmt->bindParam(2, $firstName);
    $stmt->bindParam(3, $lastName);
    $stmt->bindParam(4, $publisherTel);
    $stmt->bindParam(5, $username);

    if ($stmt->execute()) {
        $_SESSION["publisherName"] = $publisherName;
        echo "<script>
                alert('สมัครเป็นผู้ขายสำเร็จ');
                window.location.href='http://localhost/Project_Books/';
            </script>";
    }
    else {
        echo "<script>
                alert('สมัครเป็นผู้ขายไม่สำเร็จ');
                window.location.href='http://localhost/Project_Books/signup_publisher.php';
            </script>";
    }
?>