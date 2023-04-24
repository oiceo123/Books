<?php
    require "connect.php";
    session_start();

    $bookId = $_POST["bookId"];
    $bookName = $_POST["bookName"];
    $authorName = ($_POST["authorName"] != '') ? $_POST["authorName"] : NULL ;
    $painterName = ($_POST["painterName"] != '') ? $_POST["painterName"] : NULL ;
    $publisherName = $_SESSION["publisherName"];
    $bookDetail = ($_POST["bookDetail"] != '') ? $_POST["bookDetail"] : NULL;
    $series = ($_POST["series"] != '') ? $_POST["series"] : NULL ;
    $category = ($_POST["category"] != 'other') ? $_POST["category"] : $_POST["otherCategory"];
    $price = $_POST["price"];
    $bookCoverPrice = ($_POST["bookCoverPrice"] != '') ? $_POST["bookCoverPrice"] : NULL ;
    $page = $_POST["page"];
    $bookCoverPath = $_FILES["bookCoverPath"];
    $bookPath = $_FILES["bookPath"];
    $bookSamplePath = $_FILES["bookSamplePath"];

    $bookCoverPathOld = "";
    $bookPathOld = "";
    $bookSamplePathOld = "";

    $stmt = $conn->prepare("SELECT BookCoverPath, BookPath, BookSamplePath FROM book WHERE BookId = ?");
    $stmt->bindParam(1, $bookId);

    if($stmt->execute()){
        $row = $stmt->fetch();
        $bookCoverPathOld = "publishers/" . $row["BookCoverPath"];
        $bookPathOld = "publishers/" . $row["BookPath"];
        $bookSamplePathOld = "publishers/" . $row["BookSamplePath"];
    }
    else {
        echo "<script>
            alert('เกิดข้อผิดพลาด ไม่สามารถแก้ไขหนังสือได้');
            window.location.href='http://localhost/Project_Books/show_sell_book.php';
        </script>";
        exit;
    }


    $sql = "UPDATE book SET BookName = ?, AuthorName = ?, PainterName = ?, BookDetails = ?, Series = ?, Category = ?, Price = ?, BookCoverPrice = ?, Page = ? WHERE BookId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $bookName);
    $stmt->bindParam(2, $authorName);
    $stmt->bindParam(3, $painterName);
    $stmt->bindParam(4, $bookDetail);
    $stmt->bindParam(5, $series);
    $stmt->bindParam(6, $category);
    $stmt->bindParam(7, $price);
    $stmt->bindParam(8, $bookCoverPrice);
    $stmt->bindParam(9, $page);
    $stmt->bindParam(10, $bookId);
        
    if(!$stmt->execute()){
        echo "<script>
            alert('เกิดข้อผิดพลาด ไม่สามารถแก้ไขหนังสือได้');
            window.location.href='http://localhost/Project_Books/show_sell_book.php';
        </script>";
        exit;
    }

    $uploadNotOk = false;
    $dirPublisher = "publishers/$publisherName/";
    
    if (!empty($bookCoverPath["name"])) {
        $fileBookCoverPath = $dirPublisher . "book_cover/" . $bookCoverPath["name"];
        // Check if file already exists
        if (file_exists($fileBookCoverPath)) {
            $uploadNotOk = true;
            echo "เกิดข้อผิดพลาด ไม่สามารถแก้ไขรูปภาพหน้าปกได้" . "<br>";
            echo "Sorry, The file " . htmlspecialchars($bookCoverPath["name"]) . " already exists." . "<br>";
        }
        else {
            if (!move_uploaded_file($bookCoverPath["tmp_name"], $fileBookCoverPath)) {
                $uploadNotOk = true;
                echo "เกิดข้อผิดพลาด ไม่สามารถแก้ไขรูปภาพหน้าปกได้" . "<br>";
                echo "The file ". htmlspecialchars($bookCoverPath["name"]) . " hasn't been uploaded." . "<br>";
            }
            else {
                $bookCoverPathSql = $publisherName . "/" . "book_cover/" . $bookCoverPath["name"];

                $sql = "UPDATE book SET BookCoverPath = ? WHERE BookId = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $bookCoverPathSql);
                $stmt->bindParam(2, $bookId);
                
                if($stmt->execute()){
                    if ($bookCoverPathOld != "") {
                        unlink($bookCoverPathOld);
                    }
                }
                else {
                    $uploadNotOk = true;
                    unlink($fileBookCoverPath);
                    echo "เกิดข้อผิดพลาด ไม่สามารถแก้ไขรูปภาพหน้าปกได้" . "<br>";
                }
            }
        }
    }

    if (!empty($bookPath["name"])) {
        $fileBookPath = $dirPublisher . "book/" . $bookPath["name"];
        // Check if file already exists
        if (file_exists($fileBookPath)) {
            $uploadNotOk = true;
            echo "เกิดข้อผิดพลาด ไม่สามารถแก้ไขไฟล์หนังสือได้" . "<br>";
            echo "Sorry, The file " . htmlspecialchars($bookPath["name"]) . " already exists." . "<br>";
        }
        else {
            if (!move_uploaded_file($bookPath["tmp_name"], $fileBookPath)) {
                $uploadNotOk = true;
                echo "เกิดข้อผิดพลาด ไม่สามารถแก้ไขไฟล์หนังสือได้" . "<br>";
                echo "The file ". htmlspecialchars($bookPath["name"]) . " hasn't been uploaded." . "<br>";
            }
            else {
                $bookPathSql = $publisherName . "/" . "book/" . $bookPath["name"];

                $sql = "UPDATE book SET BookPath = ? WHERE BookId = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $bookPathSql);
                $stmt->bindParam(2, $bookId);
                
                if($stmt->execute()){
                    if ($bookPathOld != "") {
                        unlink($bookPathOld);
                    }
                }
                else {
                    $uploadNotOk = true;
                    unlink($fileBookPath);
                    echo "เกิดข้อผิดพลาด ไม่สามารถแก้ไขไฟล์หนังสือได้" . "<br>";
                }
            }
        }
    }

    if (!empty($bookSamplePath["name"])) {
        $fileBookSamplePath = $dirPublisher . "book_sample/" . $bookSamplePath["name"];
        // Check if file already exists
        if (file_exists($fileBookSamplePath)) {
            $uploadNotOk = true;
            echo "เกิดข้อผิดพลาด ไม่สามารถแก้ไขไฟล์ตัวอย่างหนังสือได้" . "<br>";
            echo "Sorry, The file " . htmlspecialchars($bookSamplePath["name"]) . " already exists." . "<br>";
        }
        else {
            if (!move_uploaded_file($bookSamplePath["tmp_name"], $fileBookSamplePath)) {
                $uploadNotOk = true;
                echo "เกิดข้อผิดพลาด ไม่สามารถแก้ไขไฟล์ตัวอย่างหนังสือได้" . "<br>";
                echo "The file ". htmlspecialchars($bookSamplePath["name"]) . " hasn't been uploaded." . "<br>";
            }
            else {
                $bookSamplePathSql = $publisherName . "/" . "book_sample/" . $bookSamplePath["name"];

                $sql = "UPDATE book SET BookSamplePath = ? WHERE BookId = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $bookSamplePathSql);
                $stmt->bindParam(2, $bookId);
                
                if($stmt->execute()){
                    if ($bookSamplePathOld != "") {
                        unlink($bookSamplePathOld);
                    }
                }
                else {
                    $uploadNotOk = true;
                    unlink($fileBookSamplePath);
                    echo "เกิดข้อผิดพลาด ไม่สามารถแก้ไขไฟล์ตัวอย่างหนังสือได้" . "<br>";
                }
            }
        }
    }

    if ($uploadNotOk == true) {
        echo "ไม่สามารถอัพโหลดไฟล์เหล่านี้ได้";
        header('refresh:10;show_sell_book.php');
        exit;
    }
    else {
        echo "<script>window.location.href='http://localhost/Project_Books/show_sell_book.php';</script>";
    }
?>