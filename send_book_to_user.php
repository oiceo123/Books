<?php
    require "connect.php";
    session_start();

    date_default_timezone_set("Asia/Bangkok");

    $userId = $_SESSION["userId"];
    $datePurchase = date("Y-m-d");

    foreach ($_SESSION["cart"] as $item) {
        if (!empty($item["Checked"])) {
            $bookId = $item["BookId"];

            $sql = "INSERT INTO orders (UserId, BookId, DatePurchase) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $userId);
            $stmt->bindParam(2, $bookId);
            $stmt->bindParam(3, $datePurchase);
            
            if($stmt->execute()) {
                unset($_SESSION['cart'][$bookId]);
            }
            else {
                echo "เกิดข้อผิดพลาด";
            }
        }
    }

    echo "<script>window.location.href='http://localhost/Project_Books/book_of_user.php';</script>";
?>