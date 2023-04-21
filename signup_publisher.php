<?php require "connect.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="signup_publisher.css">
    <title>Signup Publisher</title>
    <script>
        let xmlHttp;
        let statusPublisherName = false;
        let statusPhoneNumber = false;

        function checkPublisherName() {
            let x = document.getElementById("PublisherName");
            if (x.value == "") {
                x.className = "form-control";
                return;
            }

            xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = showPublisherNameStatus;

            let publisherName = x.value;
            let url = "check_publisher_name.php?PublisherName=" + publisherName;
            xmlHttp.open("GET", url);
            xmlHttp.send();
        }

        function showPublisherNameStatus() {
            let x = document.getElementById("PublisherName");
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                if (xmlHttp.responseText == "okay") {
                    x.className = "form-control border-success border-2";
                    statusPublisherName = true;
                } else {
                    x.className = "form-control border-danger border-2";
                    statusPublisherName = false;
                }
            }
        }

        function checkPhoneNumber() {
            let x = document.getElementById("phone");
            if (x.value == "") {
                x.className = "form-control";
                return;
            }

            xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = showPhoneNumberStatus;

            let phone = x.value;
            let url = "check_phone_number.php?PublisherTel=" + phone;
            xmlHttp.open("GET", url);
            xmlHttp.send();
        }

        function showPhoneNumberStatus() {
            let x = document.getElementById("phone");
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                if (xmlHttp.responseText == "okay" && x.value.length == 10) {
                    x.className = "form-control border-success border-2";
                    statusPhoneNumber = true;
                } else {
                    x.className = "form-control border-danger border-2";
                    statusPhoneNumber = false;
                }
            }
        }

        function checkUniqueInput(e) {
            if (statusPublisherName == false) {
                e.preventDefault();
                document.getElementById("PublisherName").focus();
                return false;
            } else if (statusPhoneNumber == false) {
                e.preventDefault();
                document.getElementById("phone").focus();
                return false;
            }
        }
    </script>
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
                                            <li><a class="dropdown-item text-secondary" href="./">ขายหนังสือ</a></li>
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

    <div class="container pb-4" style="max-width: 450px; margin-top: 141.5px;">
        <!-- Head -->
        <div class="row text-center mb-4">
            <div class="col">
                <h3>Sign up for free to start selling</h3>
            </div>
        </div>
        <form action="./save_publisher.php" method="post" onsubmit="checkUniqueInput(event)">
            <!-- Publisher Name Input -->
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">What's your publisher name?</label>
                    <input type="text" name="PublisherName" id="PublisherName" class="form-control" placeholder="Enter your publisher name." onblur="checkPublisherName()" required>
                </div>
            </div>
            <!-- FirstName Input -->
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">What's your first name?</label>
                    <input type="text" name="FirstName" class="form-control" placeholder="Enter your first name." required>
                </div>
            </div>
            <!-- LastName Input -->
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">What's your last name?</label>
                    <input type="text" name="Lastname" class="form-control" placeholder="Enter your last name." required>
                </div>
            </div>
            <!-- Publisher Tel Input -->
            <div class="row mb-4">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">What's your publisher phone number?</label>
                    <input type="tel" name="PublisherTel" id="phone" class="form-control" pattern="[0-9]{10}" placeholder="Enter your publisher phone number." onblur="checkPhoneNumber()" required>
                </div>
            </div>
            <!-- Sign up -->
            <div class="row justify-content-center">
                <div class="col-5">
                    <button type="submit" id="signup" class="btn btn-success rounded-pill w-100" style="height: 48px;">Sign up</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>