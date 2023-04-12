<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./index.css" />
  <title>E-BOOK</title>
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

  <!-- Carousel -->
  <div id="carouselExampleAutoplaying" class="carousel slide mb-5" data-bs-ride="carousel" style="margin-top: 78px;">
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
  <div class="container">
    <!-- ส่วนหัวข้อ -->
    <div class="row border-bottom mxw-row-mobile mxw-row-desktop mb-3 mx-auto">
      <div class="col h4">หนังสือขายดี</div>
      <div class="col text-end pt-1 h5">
        <a href="" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">ดูทั้งหมด
        </a>
      </div>
    </div>
    <!-- ส่วน Card -->
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 mxw-row-mobile mxw-row-desktop mx-auto">
      <div class="col">
        <div class="card w-100 h-100">
          <a href="./detail.php">
            <img src="./img/a.png" class="card-img-top border border-bottom" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
            </div>
        </div>
        </a>
      </div>
      <div class="col">
        <div class="card w-100 h-100">
          <img src="./img/b.png" class="card-img-top border border-bottom" alt="..." />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card w-100 h-100">
          <img src="./img/c.png" class="card-img-top border border-bottom" alt="..." />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card w-100 h-100">
          <img src="./img/d.png" class="card-img-top border border-bottom" alt="..." />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card w-100 h-100">
          <img src="./img/e.png" class="card-img-top border border-bottom" alt="..." />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card w-100 h-100">
          <img src="./img/circle.png" class="card-img-top border border-bottom" alt="..." />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>