<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Cart</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top pt-3 pb-3">
        <div class="container-fluid ms-5 me-5">
            <a class="navbar-brand" href="#">E-BOOK&#9733PLUS-ULTRA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item fs-5 me-2">
                        <a class="nav-link" aria-current="page" href="./">Bookstore</a>
                    </li>
                    <li class="nav-item fs-5 me-2">
                        <a class="nav-link" href="./signup.php">Sign Up</a>
                    </li>
                    <li class="nav-item fs-5 me-2">
                        <a class="nav-link" href="./login.php">Log In</a>
                    </li>
                    <li class="nav-item fs-5 me-2">
                        <a class="nav-link active" href="./cart.php">Cart</a>
                    </li>
                    <li class="nav-item fs-5 me-2">
                        <a class="nav-link" href="#">Dark Mode</a>
                    </li>
                    <li class="nav-item fs-5 me-2">
                        <a class="nav-link" href="#">Light Mode</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Content -->
    <div class="container" style="margin-top: 90px; max-width: 700px;">
        <!-- Head -->
        <div class="row border-bottom text-center">
            <div class="col">
                <h2>Cart</h2>
                <p class="text-secondary">
                    เลือกหนังสือที่ต้องการชำระเงิน
                </p>
            </div>
        </div>
        <!-- Book Items -->
        <div class="row border-bottom mb-3">
            <div class="col">
                <div class="d-flex align-items-center py-3">
                    <!-- Checkbox -->
                    <div class="form-check me-2">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                    </div>
                    <!-- Image -->
                    <img src="./img/a.png" alt="" width="57px" height="60px" class="border me-3">
                    <!-- Book name and Price -->
                    <div class="align-self-start">
                        <!-- Book name -->
                        <div class="fs-5 fw-bold">
                            A Book
                        </div>
                        <!-- Book price -->
                        <div class="text-body-tertiary" style="font-size: 0.9rem;">
                            ฿69
                        </div>
                    </div>
                    <!-- Delete Button -->
                    <button class="btn btn-outline-danger ms-auto px-4 py-1">ลบ</button>
                </div>
            </div>
        </div>
        <!-- Select All -->
        <div class="row mb-5">
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                        เลือกทั้งหมด
                    </label>
                </div>
            </div>
        </div>
        <!-- Link to book store -->
        <div class="row mb-4 text-center">
            <div class="col">
                <a href="./" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">เลือกซื้อหนังสือเล่มอื่นต่อ</a>
            </div>
        </div>
        <!-- Total amount to be paid -->
        <div class="row p-4 bg-body-tertiary justify-content-center">
            <!-- Total amount -->
            <div class="col-12 mb-3 text-center">
                <h4>ยอดชำระ <span class="fw-bold">฿69</span></h4>
            </div>
            <!-- Link to payment page -->
            <div class="col-6">
                <a href="#" class="d-flex btn btn-success rounded-pill justify-content-center align-items-center p-2" role="button">ไปหน้าชำระเงิน</a>
            </div>
        </div>
    </div>
</body>

</html>