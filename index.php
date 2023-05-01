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
<html lang="en" data-bs-theme="light">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./index.css" />
  <title>E-BOOK</title>
</head>

<body>
  <!-- Navbar ต้นแบบ -->
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

  <!-- Carousel -->
  <div id="carouselExampleAutoplaying" class="carousel slide mb-5" data-bs-ride="carousel" style="margin-top: 117.5px;">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://cdn.pixabay.com/photo/2021/02/08/15/02/mountains-5995081__340.jpg" class="d-block w-100" />
      </div>
      <div class="carousel-item">
        <img src="https://cdn.pixabay.com/photo/2020/06/15/01/06/sunset-5299957__340.jpg" class="d-block w-100" />
      </div>
      <div class="carousel-item">
        <img src="https://cdn.pixabay.com/photo/2021/01/18/17/46/sunset-5928907__340.jpg" class="d-block w-100" />
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Content -->
  <div class="container pb-5">
    <!-- ส่วนหัวข้อ -->
    <div class="row border-bottom mxw-row mb-3 mx-auto">
      <div class="col h4">หนังสือขายดี</div>
      <div class="col text-end pt-1 h5">
        <a href="" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">ดูทั้งหมด
        </a>
      </div>
    </div>
    <!-- ส่วน Card -->
    <div class="row row-cols-1 row-col-spacial row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4 mxw-row mx-auto">
      <?php
      $stmt = $conn->prepare("SELECT * FROM book");
      $stmt->execute();
      while ($row = $stmt->fetch()) {
      ?>
        <div class="col">
          <div class="card w-100 h-100" style="min-width: 194px;">
            <a href="./detail.php?BookId=<?= $row["BookId"] ?>" class="link-dark link-offset-2 link-underline link-underline-opacity-0">
              <div class="text-center">
                <img src="./publishers/<?= $row["BookCoverPath"] ?>" class="card-img-top" style="aspect-ratio: 1 / 1.25" alt="..." />
              </div>
              <div class="card-body border-top ps-2 pe-1 pt-2 pb-1">
                <span class="card-title fw-bold"><?= $row["BookName"] ?></span>
                <div class="d-flex justify-content-between mt-2">
                  <div class="me-1">
                    <?php
                    if ($row["Rating"] == 0) {
                      echo '<span style="color: orange;"><i class="bi bi-star fs-6"></i><i class="bi bi-star fs-6"></i><i class="bi bi-star fs-6"></i><i class="bi bi-star fs-6"></i><i class="bi bi-star fs-6"></i></span>';
                    } else if ($row["Rating"] <= 0.5) {
                      echo '<span style="color: orange;"><i class="bi bi-star-half fs-6"></i><i class="bi bi-star fs-6"></i><i class="bi bi-star fs-6"></i><i class="bi bi-star fs-6"></i><i class="bi bi-star fs-6"></i></span>';
                    } else if ($row["Rating"] <= 1) {
                      echo '<span style="color: orange;"><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star fs-6"></i><i class="bi bi-star fs-6"></i><i class="bi bi-star fs-6"></i><i class="bi bi-star fs-6"></i></span>';
                    } else if ($row["Rating"] <= 1.5) {
                      echo '<span style="color: orange;"><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-half fs-6"></i><i class="bi bi-star fs-6"></i><i class="bi bi-star fs-6"></i><i class="bi bi-star fs-6"></i></span>';
                    } else if ($row["Rating"] <= 2) {
                      echo '<span style="color: orange;"><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star fs-6"></i><i class="bi bi-star fs-6"></i><i class="bi bi-star fs-6"></i></span>';
                    } else if ($row["Rating"] <= 2.5) {
                      echo '<span style="color: orange;"><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-half fs-6"></i><i class="bi bi-star fs-6"></i><i class="bi bi-star fs-6"></i></span>';
                    } else if ($row["Rating"] <= 3) {
                      echo '<span style="color: orange;"><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star fs-6"></i><i class="bi bi-star fs-6"></i></span>';
                    } else if ($row["Rating"] <= 3.5) {
                      echo '<span style="color: orange;"><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-half fs-6"></i><i class="bi bi-star fs-6"></i></span>';
                    } else if ($row["Rating"] <= 4) {
                      echo '<span style="color: orange;"><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star fs-6"></i></span>';
                    } else if ($row["Rating"] <= 4.5) {
                      echo '<span style="color: orange;"><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-half fs-6"></i></span>';
                    } else {
                      echo '<span style="color: orange;"><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-fill fs-6"></i><i class="bi bi-star-fill fs-6"></i></span>';
                    }
                    ?>
                    <div class="text-secondary" style="font-size: 0.7rem;">ผู้ให้คะแนน <?= $row["NumberOfRaters"] ?> คน</div>
                  </div>
                  <?php if (!empty($_SESSION["username"])) { ?>
                    <?php if (!in_array($row["BookId"], $bookOfUser)) { ?>
                      <a href="cart.php?action=add&BookId=<?= $row["BookId"] ?>&BookName=<?= $row["BookName"] ?>&Price=<?= $row["Price"] ?>&BookCoverPath=<?= $row["BookCoverPath"] ?>" class="d-flex btn btn-outline-success justify-content-center align-items-center" role="button">฿<?= $row["Price"] ?></a>
                    <?php } else { ?>
                      <a href="./publishers/<?= $row["BookPath"] ?>" class="d-flex btn btn-outline-success justify-content-center align-items-center" style="width: 81.23px;" role="button">เปิด</a>
                    <?php } ?>
                  <?php } else { ?>
                    <a href="cart.php" class="d-flex btn btn-outline-success justify-content-center align-items-center" role="button">฿<?= $row["Price"] ?></a>
                  <?php } ?>
                </div>
              </div>
            </a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <script>
    (() => {
      'use strict'

      const storedTheme = localStorage.getItem('theme')

      const getPreferredTheme = () => {
        if (storedTheme) {
          return storedTheme
        }

        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
      }

      const setTheme = function(theme) {
        if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
          document.documentElement.setAttribute('data-bs-theme', 'dark')
        } else {
          document.documentElement.setAttribute('data-bs-theme', theme)
        }
      }

      setTheme(getPreferredTheme())

      const showActiveTheme = (theme, focus = false) => {
        const themeSwitcher = document.querySelector('#bd-theme')

        if (!themeSwitcher) {
          return
        }

        const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)

        document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
          element.classList.remove('active')
          element.setAttribute('aria-pressed', 'false')
        })

        btnToActive.classList.add('active')
        btnToActive.setAttribute('aria-pressed', 'true')

        if (focus) {
          themeSwitcher.focus()
        }
      }

      window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
        if (storedTheme !== 'light' || storedTheme !== 'dark') {
          setTheme(getPreferredTheme())
        }
      })

      window.addEventListener('DOMContentLoaded', () => {
        showActiveTheme(getPreferredTheme())

        document.querySelectorAll('[data-bs-theme-value]')
          .forEach(toggle => {
            toggle.addEventListener('click', () => {
              const theme = toggle.getAttribute('data-bs-theme-value')
              localStorage.setItem('theme', theme)
              setTheme(theme)
              showActiveTheme(theme, true)
            })
          })
      })
    })()
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>