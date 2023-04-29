<?php
require "connect.php";
session_start();

if (!empty($_SESSION["userId"])) {
    $stmt = $conn->prepare("SELECT BookId FROM orders WHERE UserId = ?");
    $stmt->bindParam(1, $_SESSION["userId"]);
    $stmt->execute();
    $bookOfUser = array();
    while ($temp = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($bookOfUser, $temp["BookId"]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./detail.css">
    <title>Book Name</title>
</head>

<body>
    <!-- Navbar -->
    <div class="fixed-top">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg py-3" style="background-color: rgb(253, 253, 253);">
            <div class="container-fluid ms-sm-3 me-sm-3">
                <!-- Logo -->
                <a class="navbar-brand" style="height: 45.5px;" href="./">E-BOOK&#9733PLUS-ULTRA</a>
                <!-- Navbar toggler (ขีด 3 ขีด) ( แสดงตอนจอขนาดต่ำกว่า lg (992px) ) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar Container -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Nav List (xs-lg) -->
                    <ul class="navbar-nav d-flex d-lg-none">
                        <!-- Login -->
                        <li class="nav-item border-bottom mt-4">
                            <a class="nav-link" href="./login.php">
                                <i class="bi bi-person-circle" style="font-size: 25px;"></i>
                                <span class="ms-2" style="font-size: 20px;">Log In</span>
                            </a>
                        </li>
                        <!-- Cart -->
                        <li class="nav-item border-bottom mt-3">
                            <!-- Link to cart page -->
                            <a class="nav-link position-relative" href="./cart.php">
                                <!-- Cart Icon -->
                                <i class="bi bi-cart" style="font-size: 25px;">
                                    <!-- Badges -->
                                    <span class="position-absolute badge rounded-pill bg-danger" style="font-size: 10px; left: 16px; top: 4px;">
                                        1
                                    </span>
                                </i>
                                <!-- Cart Text -->
                                <span class="ms-2" style="font-size: 20px;">Cart</span>
                            </a>
                        </li>
                        <!-- Search -->
                        <li class="nav-item mt-5 mb-4">
                            <form action="search.php">
                                <div class="input-group">
                                    <input type="text" name="BookName" class="form-control" style="height: 40px;" placeholder="ค้นหาชื่อหนังสือ">
                                    <button class="btn border search" type="submit" id="button-addon2">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                        <!-- Dropdown light mode or dark mode ยังไม่รู้จะจัดวางยังไงดี -->
                        <!-- <li class="nav-item">
                            <div class="dropdown">
                                Selected mode
                                <button class="btn dropdown-toggle p-0" style="font-size: 25px;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-brightness-high"></i>
                                    <span class="ms-1">Theme</span>
                                </button>
                                Dropdown Menu (Light / Dark)
                                <ul class="dropdown-menu dropdown-menu-end mt-2">
                                    <li class="dropdown-item"><i class="bi bi-brightness-high"></i> Light</li>
                                    <li class="dropdown-item"><i class="bi bi-moon-stars-fill"></i> Dark</li>
                                </ul>
                            </div>
                        </li> -->
                    </ul>
                    <!-- Nav List (lg-xxl) -->
                    <ul class="navbar-nav d-none d-lg-flex">
                        <!-- Search -->
                        <li class="nav-item me-3 align-self-end">
                            <form action="search.php">
                                <div class="input-group" style="width: 280px;">
                                    <input type="text" name="BookName" class="form-control" style="height: 40px;" placeholder="ค้นหาชื่อหนังสือ">
                                    <button class="btn border search" type="submit" id="button-addon2">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                        <!-- Cart -->
                        <li class="nav-item me-3">
                            <!-- Link to cart page -->
                            <a class="nav-link pb-0 position-relative" href="./cart.php">
                                <!-- Cart Icon -->
                                <i class="bi bi-cart" style="font-size: 25px;">
                                    <!-- Badges -->
                                    <span class="position-absolute badge rounded-pill bg-danger" style="font-size: 10px; left: 22px;">
                                        1
                                    </span>
                                </i>
                            </a>
                        </li>
                        <!-- Login -->
                        <li class="nav-item me-3">
                            <a class="nav-link pb-0" href="./login.php">
                                <i class="bi bi-person-circle" style="font-size: 25px;"></i>
                            </a>
                        </li>
                        <!-- Dropdown light mode or dark mode -->
                        <li class="nav-item">
                            <div class="dropdown">
                                <!-- Selected mode -->
                                <button class="btn dropdown-toggle border-start pb-0 ps-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-brightness-high" style="font-size: 25px;"></i>
                                </button>
                                <!-- Dropdown Menu (Light / Dark) -->
                                <ul class="dropdown-menu dropdown-menu-end mt-2">
                                    <li class="dropdown-item"><i class="bi bi-brightness-high"></i> Light</li>
                                    <li class="dropdown-item"><i class="bi bi-moon-stars-fill"></i> Dark</li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Bottom Nav -->
        <ul class="nav nav-underline justify-content-sm-center justify-content-start flex-nowrap overflow-x-auto hide-scollbar" style="background-color: rgb(250, 249, 250); white-space: nowrap;">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">หน้าแรก</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">ขายดี</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">มาใหม่</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">โปรโมชั่น</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">ฟรีกระจาย</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">แนะนำ</a>
            </li>
        </ul>
    </div>

    <!-- กำหนดคำสั่ง SQL ให้ดึงสินค้าตามรหัสสินค้า -->
    <?php
    $stmt = $conn->prepare("SELECT * FROM book WHERE BookId = ?");
    $stmt->bindParam(1, $_GET["BookId"]);
    $stmt->execute();
    $row = $stmt->fetch();
    ?>

    <!-- Content -->
    <div class="container py-4" style="margin-top: 117.5px;">
        <!-- Header -->
        <div class="row text-center mb-4">
            <div class="col">
                <h2><?= $row["BookName"] ?></h2>
            </div>
        </div>
        <!-- Book Image And Book Detail -->
        <div class="row mx-auto mb-5" style="max-width: 688px;">
            <!-- Book Image -->
            <div class="col-12 col-md-6 px-0 mb-5 mb-md-0 text-center text-md-start">
                <img src="./publishers/<?= $row["BookCoverPath"] ?>" alt="" width="312px" height="441px" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 27px 0px; max-width: 100%;">
            </div>
            <!-- Book Detail -->
            <div class="col-12 col-md-6 px-0 ps-md-12-px">
                <!-- รายละเอียด ด้านบน -->
                <div class="bg-body-tertiary rounded-3 p-4 mb-4">
                    <!-- ผู้แต่ง -->
                    <?php if ($row["AuthorName"] != NULL) { ?>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="me-2" style="min-width: 38px;">ผู้แต่ง</span>
                            <a href="search.php?AuthorName=<?= $row["AuthorName"] ?>" class="link-success link-underline-opacity-0 text-break"><?= $row["AuthorName"] ?></a>
                        </div>
                    <?php } ?>
                    <!-- ผู้วาด -->
                    <?php if ($row["PainterName"] != NULL) { ?>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="me-2" style="min-width: 36px;">ผู้วาด</span>
                            <a href="search.php?PainterName=<?= $row["PainterName"] ?>" class="link-success link-underline-opacity-0 text-break"><?= $row["PainterName"] ?></a>
                        </div>
                    <?php } ?>
                    <!-- หมวดหมู่ -->
                    <div class="d-flex justify-content-between mb-3">
                        <span class="me-2" style="min-width: 59px;">หมวดหมู่</span>
                        <a href="search.php?Category=<?= $row["Category"] ?>" class="link-success link-underline-opacity-0 text-break"><?= $row["Category"] ?></a>
                    </div>
                    <!-- สำนักพิมพ์ -->
                    <div class="d-flex justify-content-between mb-3">
                        <span class="me-2" style="min-width: 70px;">สำนักพิมพ์</span>
                        <a href="search.php?PublisherName=<?= $row["PublisherName"] ?>" class="link-success link-underline-opacity-0 text-break"><?= $row["PublisherName"] ?></a>
                    </div>
                    <!-- คะแนน -->
                    <div class="text-center" style="color: orange;">
                        <span class="me-2 fs-4"><?= $row["Rating"] ?></span><span>เต็ม 5</span>
                    </div>
                    <!-- ดาว -->
                    <div class="text-center mb-1">
                        <?php
                        if ($row["Rating"] == 0) {
                            echo '<span style="color: orange;"><i class="bi bi-star fs-4"></i><i class="bi bi-star fs-4"></i><i class="bi bi-star fs-4"></i><i class="bi bi-star fs-4"></i><i class="bi bi-star fs-4"></i></span>';
                        } else if ($row["Rating"] <= 0.5) {
                            echo '<span style="color: orange;"><i class="bi bi-star-half fs-4"></i><i class="bi bi-star fs-4"></i><i class="bi bi-star fs-4"></i><i class="bi bi-star fs-4"></i><i class="bi bi-star fs-4"></i></span>';
                        } else if ($row["Rating"] <= 1) {
                            echo '<span style="color: orange;"><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star fs-4"></i><i class="bi bi-star fs-4"></i><i class="bi bi-star fs-4"></i><i class="bi bi-star fs-4"></i></span>';
                        } else if ($row["Rating"] <= 1.5) {
                            echo '<span style="color: orange;"><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-half fs-4"></i><i class="bi bi-star fs-4"></i><i class="bi bi-star fs-4"></i><i class="bi bi-star fs-4"></i></span>';
                        } else if ($row["Rating"] <= 2) {
                            echo '<span style="color: orange;"><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star fs-4"></i><i class="bi bi-star fs-4"></i><i class="bi bi-star fs-4"></i></span>';
                        } else if ($row["Rating"] <= 2.5) {
                            echo '<span style="color: orange;"><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-half fs-4"></i><i class="bi bi-star fs-4"></i><i class="bi bi-star fs-4"></i></span>';
                        } else if ($row["Rating"] <= 3) {
                            echo '<span style="color: orange;"><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star fs-4"></i><i class="bi bi-star fs-4"></i></span>';
                        } else if ($row["Rating"] <= 3.5) {
                            echo '<span style="color: orange;"><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-half fs-4"></i><i class="bi bi-star fs-4"></i></span>';
                        } else if ($row["Rating"] <= 4) {
                            echo '<span style="color: orange;"><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star fs-4"></i></span>';
                        } else if ($row["Rating"] <= 4.5) {
                            echo '<span style="color: orange;"><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-half fs-4"></i></span>';
                        } else {
                            echo '<span style="color: orange;"><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i></span>';
                        }
                        ?>
                    </div>
                    <!-- ผู้ให้คะแนน -->
                    <div class="text-center">
                        <span class="text-body-tertiary">ผู้ให้คะแนน <?= $row["NumberOfRaters"] ?> คน</span>
                    </div>
                </div>
                <!-- ปุ่มทดลองอ่าน และ ปุ่มซื้อ -->
                <div class="d-flex mb-5">
                    <a href="./publishers/<?= $row["BookSamplePath"] ?>" class="d-flex btn border-success rounded-pill me-2 justify-content-center align-items-center" style="width: 41%; height: 48px;" role="button">ทดลองอ่าน</a>
                    <?php if (!empty($_SESSION["username"])) { ?>
                        <?php if (!in_array($row["BookId"], $bookOfUser)) { ?>
                            <a href="cart.php?action=add&BookId=<?= $row["BookId"] ?>&BookName=<?= $row["BookName"] ?>&Price=<?= $row["Price"] ?>&BookCoverPath=<?= $row["BookCoverPath"] ?>" class="d-flex btn btn-success rounded-pill justify-content-center align-items-center" style="width: 59%; height: 48px;" role="button">ซื้อ <?= $row["Price"] ?> บาท</a>
                        <?php } else { ?>
                            <a href="./publishers/<?= $row["BookPath"] ?>" class="d-flex btn btn-success rounded-pill justify-content-center align-items-center" style="width: 59%; height: 48px;" role="button">เปิด</a>
                        <?php } ?>
                    <?php } else { ?>
                        <a href="cart.php" class="d-flex btn btn-success rounded-pill justify-content-center align-items-center" style="width: 59%; height: 48px;" role="button">ซื้อ <?= $row["Price"] ?> บาท</a>
                    <?php } ?>
                </div>
                <!-- ซีรีส์ -->
                <?php if ($row["Series"] != NULL) { ?>
                    <div class="d-flex justify-content-between border-bottom pt-2 pb-1">
                        <span class="text-body-tertiary me-2" style="min-width: 28px;">ซีรีส์</span>
                        <a href="search.php?Series=<?= $row["Series"] ?>" class="link-dark link-underline-opacity-0 text-break"><?= $row["Series"] ?></a>
                    </div>
                <?php } ?>
                <!-- ประเภทไฟล์ -->
                <div class="d-flex justify-content-between border-bottom pt-2 pb-1">
                    <span class="text-body-tertiary me-2" style="min-width: 81px;">ประเภทไฟล์</span>
                    <span class="text-break">pdf</span>
                </div>
                <!-- วันที่วางขาย -->
                <?php function DateThai($strDate)
                {
                    $strYear = date("Y", strtotime($strDate)) + 543;
                    $strMonth = date("n", strtotime($strDate));
                    $strDay = date("j", strtotime($strDate));
                    $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
                    $strMonthThai = $strMonthCut[$strMonth];
                    return "$strDay $strMonthThai $strYear";
                } ?>
                <div class="d-flex justify-content-between border-bottom pt-2 pb-1">
                    <span class="text-body-tertiary me-2" style="min-width: 81px;">วันที่วางขาย</span>
                    <span class="text-break"><?= DateThai($row["ReleaseDate"]) ?></span>
                </div>
                <!-- จำนวนหน้า -->
                <div class="d-flex justify-content-between border-bottom pt-2 pb-1">
                    <span class="text-body-tertiary me-2" style="min-width: 73px;">จำนวนหน้า</span>
                    <span class="text-break"><?= $row["Page"] ?> หน้า</span>
                </div>
                <!-- ราคาปก -->
                <?php if ($row["BookCoverPrice"] != NULL) { ?>
                    <div class="d-flex justify-content-between border-bottom pt-2 pb-1">
                        <span class="text-body-tertiary me-2" style="min-width: 52px;">ราคาปก</span>
                        <span class="text-break"><?= $row["BookCoverPrice"] ?> บาท</span>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- Book Recommendation Article -->
        <?php if ($row["BookDetails"] != NULL) { ?>
            <div class="row mx-auto" style="max-width: 800px;">
                <div class="col p-0">
                    <span class="text-break"><?= $row["BookDetails"] ?></span>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>