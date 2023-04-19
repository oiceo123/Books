<?php 
    require "connect.php";

    // เตรียมข้อมูล
    $username = $_POST["Username"];
    $password = $_POST["Password"];
    $email = $_POST["Email"];
    $name = $_POST["DisplayName"];
    $gender = $_POST["Gender"];
    $marketing = isset($_POST["MarketingCheckbox"]) ? $_POST["MarketingCheckbox"] : 0;

    // Hash Password
    /* $options = [
        'cost' => 14
    ]; */

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // การบันทึกข้อมูล
    $sql = "INSERT INTO user (Username, Password, Email, DisplayName, Gender, MarketingMessages ) VALUES (?, ?, ?, ?, ?, ?)";
    
    // เตรียมคำสั่ง sql
    $stmt = $conn->prepare($sql);

    // bindParam ผ่านชื่อ parameter
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $passwordHash);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $name);
    $stmt->bindParam(5, $gender);
    $stmt->bindParam(6, $marketing);
    
    // รัน sql
    if ($stmt->execute()) {
        echo "<script>
                alert('สมัครสมาชิกสำเร็จ');
                window.location.href='http://localhost/Project_Books/login.php';
            </script>";
    }
    else {
        echo "<script>
                alert('สมัครสมาชิกไม่สำเร็จ');
                window.location.href='http://localhost/Project_Books/signup.php';
            </script>";
    }
?>