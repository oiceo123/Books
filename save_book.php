<?php
    require "connect.php";
    session_start();

    date_default_timezone_set("Asia/Bangkok");

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
    $releaseDate = date("Y-m-d");
    $rating = 0.00;
    $numberOfRaters = 0;
    $bookCoverPath = $_FILES["bookCoverPath"];
    $bookPath = $_FILES["bookPath"];
    $bookSamplePath = $_FILES["bookSamplePath"];

    $dirPublisher = "publishers/$publisherName/";

    $fileBookCoverPath = $dirPublisher . "book_cover/" . $bookCoverPath["name"];
    $fileBookPath = $dirPublisher . "book/" . $bookPath["name"];
    $fileBookSamplePath = $dirPublisher . "book_sample/" . $bookSamplePath["name"];
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($fileBookCoverPath)) {
        echo "Sorry, The file " . htmlspecialchars($bookCoverPath["name"]) . " already exists." . "<br>";
        $uploadOk = 0;
    }

    if (file_exists($fileBookPath)) {
        echo "Sorry, The file " . htmlspecialchars($bookPath["name"]) . " already exists." . "<br>";
        $uploadOk = 0;
    }

    if (file_exists($fileBookSamplePath)) {
        echo "Sorry, The file " . htmlspecialchars($bookSamplePath["name"]) . " already exists." . "<br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded." . "<br>";
        header('refresh:10;add_sell_book.php');
        exit;
    } else {
        if (!move_uploaded_file($bookCoverPath["tmp_name"], $fileBookCoverPath)) {
            echo "The file ". htmlspecialchars($bookCoverPath["name"]) . " hasn't been uploaded." . "<br>";
            echo "Sorry, there was an error uploading your file." . "<br>";
            header('refresh:10;add_sell_book.php');
            exit;
        }

        if (!move_uploaded_file($bookPath["tmp_name"], $fileBookPath)) {
            echo "The file ". htmlspecialchars($bookPath["name"]) . " hasn't been uploaded." . "<br>";
            echo "Sorry, there was an error uploading your file." . "<br>";
            header('refresh:10;add_sell_book.php');
            exit;
        }

        if (!move_uploaded_file($bookSamplePath["tmp_name"], $fileBookSamplePath)) {
            echo "The file ". htmlspecialchars($bookSamplePath["name"]) . " hasn't been uploaded." . "<br>";
            echo "Sorry, there was an error uploading your file." . "<br>";
            header('refresh:10;add_sell_book.php');
            exit;
        }

        $bookCoverPathSql = $publisherName . "/" . "book_cover/" . $bookCoverPath["name"];
        $bookPathSql = $publisherName . "/" . "book/" . $bookPath["name"];
        $bookSamplePathSql = $publisherName . "/" . "book_sample/" . $bookSamplePath["name"];

        $sql = "INSERT INTO book VALUES ('', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $bookName);
        $stmt->bindParam(2, $authorName);
        $stmt->bindParam(3, $painterName);
        $stmt->bindParam(4, $publisherName);
        $stmt->bindParam(5, $bookDetail);
        $stmt->bindParam(6, $series);
        $stmt->bindParam(7, $category);
        $stmt->bindParam(8, $price);
        $stmt->bindParam(9, $bookCoverPrice);
        $stmt->bindParam(10, $page);
        $stmt->bindParam(11, $releaseDate);
        $stmt->bindParam(12, $rating);
        $stmt->bindParam(13, $numberOfRaters);
        $stmt->bindParam(14, $bookCoverPathSql);
        $stmt->bindParam(15, $bookPathSql);
        $stmt->bindParam(16, $bookSamplePathSql);
        
        if($stmt->execute()){
            echo "<script>window.location.href='http://localhost/Project_Books/show_sell_book.php';</script>";
        }
        else {
            echo "<script>
                alert('เกิดข้อผิดพลาด ไม่สามารถเพิ่มหนังสือได้');
                window.location.href='http://localhost/Project_Books/show_sell_book.php';
            </script>";
        }
    }
?>