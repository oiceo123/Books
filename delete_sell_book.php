<?php
    require "connect.php";

    $bookId = $_GET["BookId"];

    $stmt = $conn->prepare("SELECT BookCoverPath, BookPath, BookSamplePath FROM book WHERE BookId = ?");
    $stmt->bindParam(1, $bookId);
    
    if (!$stmt->execute()) {
        echo "ไม่สามารถลบหนังสือได้ กรุณาลองใหม่อีกครั้ง";
        header('refresh:10;show_sell_book.php');
        exit;
    }
    
    $row = $stmt->fetch();

    $dir = "publishers/";
    $bookCoverPath = $dir . $row["BookCoverPath"];
    $bookPath = $dir . $row["BookPath"];
    $bookSamplePath = $dir . $row["BookSamplePath"];

    if (!unlink($bookCoverPath)) {
        echo "ไม่สามารถลบหนังสือได้ กรุณาลองใหม่อีกครั้ง";
        header('refresh:10;show_sell_book.php');
        exit;
    }

    if (!unlink($bookPath)) {
        echo "ไม่สามารถลบหนังสือได้ กรุณาลองใหม่อีกครั้ง";
        header('refresh:10;show_sell_book.php');
        exit;
    }

    if (!unlink($bookSamplePath)) {
        echo "ไม่สามารถลบหนังสือได้ กรุณาลองใหม่อีกครั้ง";
        header('refresh:10;show_sell_book.php');
        exit;
    }

    $stmt = $conn->prepare("DELETE FROM book WHERE BookId = ?");
    $stmt->bindParam(1, $bookId);
    
    if ($stmt->execute()) {
        echo "<script>window.location.href='http://localhost/Project_Books/show_sell_book.php';</script>";
    }
    else {
        echo "ไม่สามารถลบหนังสือได้ กรุณาลองใหม่อีกครั้ง";
        header('refresh:10;show_sell_book.php');
        exit;
    }
?>