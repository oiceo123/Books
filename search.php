<?php require "connect.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./search.css" />
    <title>E-BOOK</title>
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

    <?php
    if (!empty($_GET["BookName"])) {
        $stmt = $conn->prepare("SELECT * FROM book WHERE BookName LIKE ?");
        $value = '%' . $_GET["BookName"] . '%';
        $stmt->bindParam(1, $value);
    } else if (!empty($_GET["AuthorName"])) {
        $stmt = $conn->prepare("SELECT * FROM book WHERE AuthorName LIKE ?");
        $stmt->bindParam(1, $_GET["AuthorName"]);
    } else if (!empty($_GET["PainterName"])) {
        $stmt = $conn->prepare("SELECT * FROM book WHERE PainterName LIKE ?");
        $stmt->bindParam(1, $_GET["PainterName"]);
    } else if (!empty($_GET["PublisherName"])) {
        $stmt = $conn->prepare("SELECT * FROM book WHERE PublisherName LIKE ?");
        $stmt->bindParam(1, $_GET["PublisherName"]);
    } else if (!empty($_GET["Series"])) {
        $stmt = $conn->prepare("SELECT * FROM book WHERE Series LIKE ?");
        $stmt->bindParam(1, $_GET["Series"]);
    } else if (!empty($_GET["Category"])) {
        $stmt = $conn->prepare("SELECT * FROM book WHERE Category LIKE ?");
        $stmt->bindParam(1, $_GET["Category"]);
    } else {
        echo '<h2 class="text-center" style="margin-top: 150px;">ไม่พบหนังสือที่ค้นหา</h2>';
        exit;
    }

    $stmt->execute();
    if ($stmt->rowCount() == 0) {
        echo '<h2 class="text-center" style="margin-top: 150px;">ไม่พบหนังสือที่ค้นหา</h2>';
        exit;
    }
    ?>
    <div class="container pb-5" style="margin-top: 150px;">
        <div class="row text-center mb-4">
            <h3>หนังสือที่พบจำนวน <?= $stmt->rowCount() ?> เล่ม</h3>
        </div>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 mxw-row-mobile mxw-row-desktop mx-auto">
            <?php while ($row = $stmt->fetch()) { ?>
                <div class="col">
                    <div class="card w-100 h-100">
                        <a href="./detail.php?BookId=<?= $row["BookId"] ?>" target="_blank" class="link-dark link-offset-2 link-underline link-underline-opacity-0">
                            <div class="text-center">
                                <img src="./publishers/<?= $row["BookCoverPath"] ?>" class="card-img-top" style="aspect-ratio: 1 / 1.25" alt="..." />
                            </div>
                            <div class="card-body border-top px-2 pt-2">
                                <span class="card-title fw-bold"><?= $row["BookName"] ?></span>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>