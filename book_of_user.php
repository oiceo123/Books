<?php
require "connect.php";
session_start();

/* ทำตรงนี้ต่อ */
/* ทดลองใช้วิธี join ระหว่างตาราง orders กับ book ดู แล้วค่อย where ตาม user id ที่หลัง ฝึกดู */
$userId = $_SESSION["userId"];
$sql = "SELECT o.UserId, o.BookId, b.BookName, b.BookCoverPath, b.BookPath FROM orders AS o INNER JOIN book AS b ON o.BookId = b.BookId WHERE o.UserId = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $userId);
if (!$stmt->execute()) {
    echo "เกิดข้อผิดพลาด กรุณาลองเข้าใหม่อีกครั้ง";
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
    <link rel="stylesheet" href="book_of_user.css">
    <title>Books Of User</title>
</head>

<body>
    <!-- Navbar Copy -->
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
                        <!-- Login ผ่าน -->
                        <li class="nav-item border-bottom mt-4">
                            <?php if (empty($_SESSION["username"])) { ?>
                                <a class="nav-link" href="./login.php">
                                    <i class="bi bi-person-circle" style="font-size: 25px;"></i>
                                    <span class="ms-2" style="font-size: 20px;">Log In</span>
                                </a>
                            <?php } else { ?>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle px-0 w-100 d-flex justify-content-between align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span><i class="bi bi-person-circle me-1" style="font-size: 25px;"></i><span class="ms-2" style="font-size: 20px;"><?= $_SESSION["displayName"] ?></span></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end mt-2">
                                        <li><a class="dropdown-item text-secondary" href="./book_of_user.php"><i class="bi bi-book me-2" style="font-size: 18px;"></i>หนังสือของฉัน</a></li>
                                        <?php if (empty($_SESSION["publisherName"])) { ?>
                                            <li><a class="dropdown-item text-secondary" href="./signup_publisher.php"><i class="bi bi-person-add me-2" style="font-size: 18px;"></i>สมัครขายหนังสือ</a></li>
                                        <?php } else { ?>
                                            <li><a class="dropdown-item text-secondary" href="./show_sell_book.php"><i class="bi bi-file-earmark-plus me-2" style="font-size: 18px;"></i>ขายหนังสือ</a></li>
                                        <?php } ?>
                                        <li><a class="dropdown-item border-top mt-3 link-danger" href="./logout.php"><i class="bi bi-box-arrow-in-right me-2" style="font-size: 18px;"></i>ออกจากระบบ</a></li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </li>
                        <!-- Cart ผ่าน -->
                        <li class="nav-item border-bottom mt-3">
                            <!-- Link to cart page -->
                            <a class="nav-link position-relative" href="./cart.php">
                                <!-- Cart Icon -->
                                <i class="bi bi-cart" style="font-size: 25px;">
                                    <!-- Badges -->
                                    <?php if (!empty($_SESSION["cart"])) { ?>
                                        <span class="position-absolute badge rounded-pill bg-danger" style="font-size: 10px; left: 16px; top: 4px;">
                                            <?= count($_SESSION["cart"]) ?>
                                        </span>
                                    <?php } ?>
                                </i>
                                <!-- Cart Text -->
                                <span class="ms-2" style="font-size: 20px;">Cart</span>
                            </a>
                        </li>
                        <!-- Search ผ่าน -->
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
                                    <?php if (!empty($_SESSION["cart"])) { ?>
                                        <span class="position-absolute badge rounded-pill bg-danger" style="font-size: 10px; left: 22px;">
                                            <?= count($_SESSION["cart"]) ?>
                                        </span>
                                    <?php } ?>
                                </i>
                            </a>
                        </li>
                        <!-- Login -->
                        <li class="nav-item me-3">
                            <?php if (empty($_SESSION["username"])) { ?>
                                <a class="nav-link pb-0" href="./login.php">
                                    <i class="bi bi-person-circle" style="font-size: 25px;"></i>
                                </a>
                            <?php } else { ?>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle pb-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person-circle" style="font-size: 25px;"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end mt-2" style="width: 300px;">
                                        <li class="dropdown-item d-flex border-bottom pt-2 pb-3">
                                            <img src="https://cdn.pixabay.com/photo/2016/11/14/17/39/person-1824147_960_720.png" alt="" class="border rounded-circle" width="50px" height="50px">
                                            <span class="ms-3"><?= $_SESSION["displayName"] ?></span>
                                        </li>
                                        <li class="mt-2"><a class="dropdown-item text-secondary" href="./book_of_user.php"><i class="bi bi-book me-2" style="font-size: 18px;"></i>หนังสือของฉัน</a></li>
                                        <?php if (empty($_SESSION["publisherName"])) { ?>
                                            <li><a class="dropdown-item text-secondary" href="./signup_publisher.php"><i class="bi bi-person-add me-2" style="font-size: 18px;"></i>สมัครขายหนังสือ</a></li>
                                        <?php } else { ?>
                                            <li><a class="dropdown-item text-secondary" href="./show_sell_book.php"><i class="bi bi-file-earmark-plus me-2" style="font-size: 18px;"></i>ขายหนังสือ</a></li>
                                        <?php } ?>
                                        <li><a class="dropdown-item link-danger" href="./logout.php"><i class="bi bi-box-arrow-in-right me-2" style="font-size: 18px;"></i>ออกจากระบบ</a></li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </li>
                        <!-- Dropdown light mode or dark mode -->
                        <li class="nav-item">
                            <div class="dropdown">
                                <!-- Selected mode -->
                                <button class="btn dropdown-toggle border-start pb-0 ps-4" id="bd-theme" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-brightness-high" style="font-size: 25px;"></i>
                                </button>
                                <!-- Dropdown Menu (Light / Dark) -->
                                <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="bd-theme-text">
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light" aria-pressed="true">
                                            <i class="bi bi-brightness-high"></i> Light
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                                            <i class="bi bi-moon-stars-fill"></i> Dark
                                        </button>
                                    </li>
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

    <div class="container pb-4" style="margin-top: 141.5px">
        <!-- ส่วนหัวข้อ -->
        <div class="row border-bottom mxw-row-mobile mxw-row-desktop mb-4 mx-auto">
            <div class="col h3">หนังสือของฉัน</div>
        </div>
        <!-- ส่วน Card -->
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 mxw-row-mobile mxw-row-desktop mx-auto">
            <?php
            while ($row = $stmt->fetch()) {
            ?>
                <div class="col">
                    <a href="publishers/<?= $row["BookPath"] ?>" class="link-dark link-offset-2 link-underline link-underline-opacity-0">
                        <div class="card w-100 h-100">
                            <div class="text-center">
                                <img src="./publishers/<?= $row["BookCoverPath"] ?>" class="card-img-top" style="aspect-ratio: 1 / 1.25" alt="..." />
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>