<?php
require "connect.php";
session_start();

$star = $_POST["star"];
$bookId = $_POST["bookId"];
$userId = $_SESSION["userId"];

// ดึงข้อมูลออกมาดูก่อนว่า user ได้เคยให้คะแนนไปรึยัง
$stmt = $conn->prepare("SELECT * FROM review WHERE BookId = ? AND UserId = ?");
$stmt->bindParam(1, $bookId);
$stmt->bindParam(2, $userId);

if (!$stmt->execute()) {
        echo "<script>
                alert('เกิดข้อผิดพลาด ให้คะแนนไม่สำเร็จ');
                window.location.href='http://localhost/Project_Books/detail.php?BookId=$bookId';
        </script>";
        exit;
}

$row = $stmt->fetch();

if (!empty($row)) {
        // ถ้าเคยให้ไปแล้วจะ UPDATE Row ที่มีอยู่
        $stmt = $conn->prepare("UPDATE review SET Rating = ? WHERE BookId = ? AND UserId = ?");
        $stmt->bindParam(1, $star);
        $stmt->bindParam(2, $bookId);
        $stmt->bindParam(3, $userId);

        if (!$stmt->execute()) {
                echo "<script>
                alert('เกิดข้อผิดพลาด ให้คะแนนไม่สำเร็จ');
                window.location.href='http://localhost/Project_Books/detail.php?BookId=$bookId';
        </script>";
                exit;
        }
} else {
        // ถ้าไม่เคยให้จะ INSERT Row ใหม่
        $stmt = $conn->prepare("INSERT INTO review VALUES ('', ?, ?, ?)");
        $stmt->bindParam(1, $star);
        $stmt->bindParam(2, $bookId);
        $stmt->bindParam(3, $userId);

        if (!$stmt->execute()) {
                echo "<script>
                alert('เกิดข้อผิดพลาด ให้คะแนนไม่สำเร็จ');
                window.location.href='http://localhost/Project_Books/detail.php?BookId=$bookId';
        </script>";
                exit;
        }
}

// ดึงข้อมูลผลรวมของคะแนน กับ จำนวนแถว โดยมีเงื่อนไขว่าจะต้องมี BookId ตรงกับ BookId ที่ user ส่งเข้ามา (ก็คือหนังสือที่ user ให้คะแนน)
$stmt = $conn->prepare("SELECT SUM(Rating) AS Rating, COUNT(BookId) AS NumberOfRaters FROM review GROUP BY BookId HAVING BookId = ?");
$stmt->bindParam(1, $bookId);

if (!$stmt->execute()) {
        echo "<script>
                alert('เกิดข้อผิดพลาด ให้คะแนนไม่สำเร็จ');
                window.location.href='http://localhost/Project_Books/detail.php?BookId=$bookId';
        </script>";
        exit;
}

$row = $stmt->fetch();

// คำนวณเป็นค่าเฉลี่ยเป็น Rating ของหนังสือ
$rating = number_format($row["Rating"] / $row["NumberOfRaters"], 2, '.', '');

// UPDATE ตาราง book ในส่วนของคอลัมน์ Rating กับ NumberOfRaters
$stmt = $conn->prepare("UPDATE book SET Rating = ?, NumberOfRaters = ? WHERE BookId = ?");
$stmt->bindParam(1, $rating);
$stmt->bindParam(2, $row["NumberOfRaters"]);
$stmt->bindParam(3, $bookId);

if ($stmt->execute()) {
        echo "<script>
                alert('ให้คะแนนสำเร็จ');
                window.location.href='http://localhost/Project_Books/detail.php?BookId=$bookId';
        </script>";
        exit;
} else {
        echo "<script>
                alert('เกิดข้อผิดพลาด ให้คะแนนไม่สำเร็จ');
                window.location.href='http://localhost/Project_Books/detail.php?BookId=$bookId';
        </script>";
        exit;
}
