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
    <nav class="navbar navbar-expand-lg fixed-top py-3" style="background-color: rgb(253, 253, 253);">
        <div class="container-fluid ms-3 me-3">
            <!-- Logo -->
            <a class="navbar-brand" href="./">E-BOOK&#9733PLUS-ULTRA</a>
            <!-- Navbar toggler (ขีด 3 ขีด) (แสดงตอนจอขนาดเล็ก) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Container -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Nav List -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <!-- Search -->
                    <li class="nav-item me-3 align-self-end">
                        <div class="input-group" style="width: 280px;">
                            <input type="text" class="form-control" style="height: 40px;" placeholder="Search">
                            <button class="btn border search" type="button" id="button-addon2">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
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

    <!-- Content -->
    <div class="container pb-4" style="margin-top: 78px;">
        <div class="row text-center mb-4">
            <div class="col">
                <h2>Book Name</h2>
            </div>
        </div>
        <div class="row mx-auto mb-5" style="max-width: 688px;">
            <div class="col-6 px-0">
                <img src="./img/a.png" alt="" width="312px" height="441px" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 27px 0px;">
            </div>
            <div class="col-6 py-0 pe-0" style="padding-left: 22px;">
                <div class="bg-body-tertiary rounded-3 p-4 mb-4">
                    <div class="d-flex justify-content-between mb-3">
                        <span class="me-2" style="min-width: 38px;">ผู้แต่ง</span>
                        <a href="#" class="text-break">TEST DEMO</a>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="me-2" style="min-width: 36px;">ผู้วาด</span>
                        <a href="#" class="text-break">TEST DEMO</a>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="me-2" style="min-width: 59px;">หมวดหมู่</span>
                        <a href="#" class="text-break">TEST DEMO</a>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="me-2" style="min-width: 70px;">สำนักพิมพ์</span>
                        <a href="#" class="text-break">TEST DEMO</a>
                    </div>

                    <div class="text-center" style="color: orange;">
                        <span class="me-2 fs-4">4.94</span><span>เต็ม 5</span>
                    </div>
                    <div class="text-center mb-1">
                        <span style="color: orange;"><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i><i class="bi bi-star-fill fs-4"></i></span>
                    </div>
                    <div class="text-center">
                        <span class="text-body-tertiary">ผู้ให้คะแนน 1 คน</span>
                    </div>
                </div>
                <div class="d-flex mb-5">
                    <a href="#" class="btn btn-lg border-success rounded-pill me-2" style="min-width: 129px; width: 41%;" role="button">ทดลองอ่าน</a>
                    <a href="./cart.php" class="btn btn-lg btn-success rounded-pill" style="width: 59%;">ซื้อ 149 บาท</a>
                </div>
                <div class="d-flex justify-content-between border-bottom pt-2 pb-1">
                    <span class="text-body-tertiary me-2" style="min-width: 28px;">ซีรีส์</span>
                    <span class="text-break">5555</span>
                </div>
                <div class="d-flex justify-content-between border-bottom pt-2 pb-1">
                    <span class="text-body-tertiary me-2" style="min-width: 81px;">ประเภทไฟล์</span>
                    <span class="text-break">5555</span>
                </div>
                <div class="d-flex justify-content-between border-bottom pt-2 pb-1">
                    <span class="text-body-tertiary me-2" style="min-width: 81px;">วันที่วางขาย</span>
                    <span class="text-break">5555</span>
                </div>
                <div class="d-flex justify-content-between border-bottom pt-2 pb-1">
                    <span class="text-body-tertiary me-2" style="min-width: 73px;">จำนวนหน้า</span>
                    <span class="text-break">5555</span>
                </div>
                <div class="d-flex justify-content-between border-bottom pt-2 pb-1">
                    <span class="text-body-tertiary me-2" style="min-width: 52px;">ราคาปก</span>
                    <span class="text-break">5555</span>
                </div>
            </div>
        </div>
        <div class="row mx-auto" style="max-width: 800px;">
            <div class="col p-0">
                <span class="text-break">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt saepe nobis quod repellat placeat dolorem reiciendis alias ab. Quod, error et rerum magni soluta ipsam voluptatibus maiores ut qui eum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis vel facilis nostrum velit dolores aperiam repellendus officia totam perspiciatis? In aliquid mollitia fugiat modi corrupti? Perspiciatis numquam nihil velit sint.</span>
            </div>
        </div>
    </div>
</body>

</html>