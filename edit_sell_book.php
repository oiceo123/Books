<?php
require "connect.php";
session_start();

$stmt = $conn->prepare("SELECT * FROM book WHERE BookId = ?");
$stmt->bindParam(1, $_GET["BookId"]);
$stmt->execute();
$row = $stmt->fetch();
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
    <link rel="stylesheet" href="./edit_sell_book.css">
    <title>Edit Sell Book</title>
    <script>
        function selectCategory() {
            let x = document.getElementById("category");
            let y = document.getElementById("rowOtherCategory");
            let z = document.getElementById("otherCategory");
            if (x.value == "other") {
                y.className = "row d-block mb-3";
                z.setAttribute("required", "");
            } else {
                z.removeAttribute("required");
                y.className = "row d-none mb-3";
            }
        }

        function checkBookName() {
            let x = document.getElementById("bookName");
            let bookNameFromDatabase = "<?= $row["BookName"] ?>";

            if (x.value == "") {
                x.className = "form-control";
                return;
            }

            if (x.value == bookNameFromDatabase) {
                x.className = "form-control";
                return;
            }

            xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = showBookNameStatus;

            let bookName = x.value;
            let url = "check_book_name.php?bookName=" + bookName;
            xmlHttp.open("GET", url);
            xmlHttp.send();
        }

        function showBookNameStatus() {
            let x = document.getElementById("bookName");
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                if (xmlHttp.responseText == "okay") {
                    x.className = "form-control border-success border-2";
                    statusBookName = true;
                } else {
                    x.className = "form-control border-danger border-2";
                    statusBookName = false;
                }
            }
        }

        function checkUniqueInput(e) {
            if (statusBookName == false) {
                e.preventDefault();
                document.getElementById("bookName").focus();
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

    <div class="container pb-4" style="margin-top: 141.5px; max-width: 500px;">
        <!-- Header -->
        <div class="row text-center">
            <div class="col">
                <h3>หนังสือที่คุณต้องการแก้ไข</h3>
            </div>
        </div>
        <div class="row text-center mb-4">
            <div class="col">
                <span class="text-danger">หากช่องกรอกข้อมูลมี * แสดงว่าจำเป็นต้องกรอก</span>
            </div>
        </div>
        <!-- Image -->
        <div class="row text-center mb-5">
            <div class="col">
                <img src="./publishers/<?= $row["BookCoverPath"] ?>" alt="" width="312px" height="441px" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 27px 0px; max-width: 100%;">
            </div>
        </div>
        <!-- Form -->
        <form action="update_sell_book.php" method="post" enctype="multipart/form-data" onsubmit="checkUniqueInput(event)">
            <!-- Book Id -->
            <div class="row mb-3" hidden>
                <div class="col">
                    <input type="text" class="form-control" id="bookId" name="bookId" value="<?= $_GET["BookId"] ?>">
                </div>
            </div>
            <!-- Book Name -->
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">ชื่อหนังสือ <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="bookName" name="bookName" value="<?= $row["BookName"] ?>" placeholder="กรุณากรอกชื่อหนังสือ" onblur="checkBookName()" required>
                </div>
            </div>
            <!-- Author Name -->
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">ชื่อผู้แต่ง</label>
                    <input type="text" class="form-control" id="authorName" name="authorName" value="<?= (!empty($row["AuthorName"])) ? ($row["AuthorName"]) : ''; ?>" placeholder="กรุณากรอกชื่อผู้แต่ง">
                </div>
            </div>
            <!-- Painter Name -->
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">ชื่อผู้วาด</label>
                    <input type="text" class="form-control" id="painterName" name="painterName" value="<?= (!empty($row["PainterName"])) ? ($row["PainterName"]) : ''; ?>" placeholder="กรุณากรอกชื่อผู้วาด">
                </div>
            </div>
            <!-- Book Detail -->
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleFormControlTextarea1" class="form-label fw-bold">รายละเอียดหนังสือ</label>
                    <textarea class="form-control" id="bookDetail" name="bookDetail" rows="3" placeholder="กรุณากรอกรายละเอียดหนังสือ"><?= (!empty($row["BookDetails"])) ? ($row["BookDetails"]) : ''; ?></textarea>
                </div>
            </div>
            <!-- Series -->
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">ชื่อซีรี่ย์</label>
                    <input type="text" class="form-control" id="series" name="series" value="<?= (!empty($row["Series"])) ? ($row["Series"]) : ''; ?>" placeholder="กรุณากรอกชื่อซีรี่ย์">
                </div>
            </div>
            <!-- Category -->
            <?php
            $stmt2 = $conn->prepare("SELECT DISTINCT Category FROM book WHERE PublisherName = ? AND Category <> ?");
            $stmt2->bindParam(1, $_SESSION["publisherName"]);
            $stmt2->bindParam(2, $row["Category"]);
            $stmt2->execute();
            ?>
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">หมวดหมู่ <span class="text-danger">*</span></label>
                    <select class="form-select" id="category" name="category" onchange="selectCategory()" aria-label="Default select example" required>
                        <option value="" hidden></option>
                        <option value="<?= $row["Category"] ?>" selected><?= $row["Category"] ?></option>
                        <?php while ($row2 = $stmt2->fetch()) { ?>
                            <option value="<?= $row2["Category"] ?>"><?= $row2["Category"] ?></option>
                        <?php } ?>
                        <option value="other">อื่นๆ</option>
                    </select>
                </div>
            </div>
            <!-- Other Category -->
            <div id="rowOtherCategory" class="row d-none mb-3">
                <div class="col">
                    <input type="text" class="form-control" id="otherCategory" name="otherCategory" placeholder="กรุณากรอกหมวดหมู่ที่ต้องการ">
                </div>
            </div>
            <!-- Price -->
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">ราคา <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="price" name="price" value="<?= $row["Price"] ?>" pattern="[0-9]{1,4}\.[0-9]{2}|[0-9]{1,4}" title="ต้องกรอกเป็นตัวเลขเท่านั้น และ กรอกได้ตั้งแต่ 0-9999.99" placeholder="กรุณากรอกราคา ( หากฟรีให้กรอก 0 )" required>
                </div>
            </div>
            <!-- Book Cover Price -->
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">ราคาปก</label>
                    <input type="text" class="form-control" id="bookCoverPrice" name="bookCoverPrice" value="<?= (!empty($row["BookCoverPrice"])) ? ($row["BookCoverPrice"]) : ''; ?>" pattern="[1-9][0-9]{0,3}\.[0-9]{2}|[1-9][0-9]{0,3}" title="ต้องกรอกเป็นตัวเลขเท่านั้น และ กรอกได้ตั้งแต่ 1-9999.99 หากไม่มีไม่ต้องกรอก" placeholder="กรุณากรอกราคาบนปกหนังสือ">
                </div>
            </div>
            <!-- Page -->
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">จำนวนหน้า <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="page" name="page" value="<?= $row["Page"] ?>" pattern="[1-9][0-9]{0,10}" title="ต้องกรอกเป็นตัวเลขเท่านั้น ไม่ต่ำกว่า 1 และ กรอกได้ไม่เกิน 11 หลัก" placeholder="กรุณากรอกจำนวนหน้าของหน้งสือ" required>
                </div>
            </div>
            <!-- Book Cover Path -->
            <div class="row mb-3">
                <div class="col">
                    <label for="formFile" class="form-label fw-bold">รูปภาพหน้าปก</label>
                    <input class="form-control" type="file" id="bookCoverPath" name="bookCoverPath" accept="image/png, image/jpeg">
                </div>
            </div>
            <!-- Book Path -->
            <div class="row mb-3">
                <div class="col">
                    <label for="formFile" class="form-label fw-bold">ไฟล์หนังสือ (ไฟล์ pdf เท่านั้น)</label>
                    <input class="form-control" type="file" id="bookPath" name="bookPath" accept=".pdf">
                </div>
            </div>
            <!-- Book Sample Path -->
            <div class="row mb-4">
                <div class="col">
                    <label for="formFile" class="form-label fw-bold">ไฟล์ตัวอย่างหนังสือ (ไฟล์ pdf เท่านั้น)</label>
                    <input class="form-control" type="file" id="bookSamplePath" name="bookSamplePath" accept=".pdf">
                </div>
            </div>
            <!-- ปุ่มเพิ่มหนังสือ -->
            <div class="row justify-content-center">
                <div class="col-6">
                    <button class="btn btn-outline-success rounded-pill w-100 fw-bold hsubmit" type="submit">แก้ไขรายละเอียด</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>