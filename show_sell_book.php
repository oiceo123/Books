<?php
require "connect.php";
session_start();
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
    <link rel="stylesheet" href="show_sell_book.css">
    <title>Sell Book</title>
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
                            <?php if (empty($_SESSION["username"])) { ?>
                                <a class="nav-link pb-0" href="./login.php">
                                    <i class="bi bi-person-circle" style="font-size: 25px;"></i>
                                </a>
                            <?php } else { ?>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle pb-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person-circle" style="font-size: 25px;"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end mt-2">
                                        <?php if (empty($_SESSION["publisherName"])) { ?>
                                            <li><a class="dropdown-item text-secondary" href="./signup_publisher.php">สมัครขายหนังสือ</a></li>
                                        <?php } else { ?>
                                            <li><a class="dropdown-item text-secondary" href="./show_sell_book.php">ขายหนังสือ</a></li>
                                        <?php } ?>
                                        <li><a class="dropdown-item border-top mt-3 link-danger text-center" href="./logout.php">ออกจากระบบ</a></li>
                                    </ul>
                                </div>
                            <?php } ?>
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

    <div class="container" style="margin-top: 141.5px;">
        <div class="row text-center mb-4">
            <div class="col">
                <h3>รายการหนังสือที่คุณขาย</h3>
            </div>
        </div>
        <div class="row text-end mb-3">
            <div class="col">
                <a href="./add_sell_book.php" class="btn btn-primary" style="font-size: 1.1rem;">เพิ่มหนังสือ</a>
            </div>
        </div>
        <?php
        $stmt = $conn->prepare("SELECT * FROM book WHERE PublisherName = ?");
        $stmt->bindParam(1, $_SESSION["publisherName"]);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
        ?>
            <div class="row border-bottom">
                <div class="col">
                    <div class="d-flex align-items-center py-3">
                        <!-- Image -->
                        <img src="./publishers/<?= $row["BookCoverPath"] ?>" alt="" width="57px" height="60px" class="border me-3">
                        <!-- Book name and Price -->
                        <div class="align-self-start">
                            <!-- Book name -->
                            <div class="fs-5 fw-bold text-break">
                                <?= $row["BookName"] ?>
                            </div>
                            <!-- Book price -->
                            <div class="text-body-tertiary" style="font-size: 0.9rem;">
                                ฿<?= $row["Price"] ?>
                            </div>
                        </div>
                        <!-- Delete Button -->
                        <a href="BookId=<?= $row["BookId"] ?>" class="btn btn-outline-success ms-auto me-2 px-3 px-sm-4 py-1">แก้ไข</a>
                        <a href="BookId=<?= $row["BookId"] ?>" class="btn btn-outline-danger px-3 px-sm-4 py-1">ลบ</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>