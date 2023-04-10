<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./login.css">
    <title>Log In</title>
</head>

<body>
    <!-- Logo -->
    <div class="text-center py-4 mb-4 border-bottom">
        <h3>E-BOOK&#9733PLUS-ULTRA</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <!-- Email Input -->
            <div class="col-12 p-0 mb-3" style="max-width: 450px;">
                <label for="exampleFormControlInput1" class="form-label fw-bold">Email address or username</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" style="height: 48px;" placeholder="Email address or username">
            </div>
            <div class="w-100"></div>
            <!-- Password Input -->
            <div class="col-12 p-0 mb-3" style="max-width: 450px;">
                <label for="inputPassword5" class="form-label fw-bold">Password</label>
                <div class="input-group">
                    <input type="password" id="inputPassword5" class="form-control" style="height: 48px;" aria-labelledby="passwordHelpBlock" placeholder="Password">
                    <span class="input-group-text"><i class="bi bi-eye-slash"></i></span>
                </div>
            </div>
            <div class="w-100"></div>
            <!-- Forgot Link -->
            <div class="col-12 p-0 mb-3" style="max-width: 450px;">
                <p><a href="#" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Forgot your password?</a></p>
            </div>
            <div class="w-100"></div>
            <!-- Remember Checkbox and Log In Button -->
            <div class="col-12 p-0 mb-4" style="max-width: 450px;">
                <div class="d-md-flex">
                    <!-- Remember Checkbox -->
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label text-success" for="flexCheckChecked">
                            Remember me
                        </label>
                    </div>
                    <!-- Log In Button -->
                    <div class="d-grid ms-md-auto col-md-4">
                        <a href="#" class="d-flex btn btn-success rounded-pill justify-content-center align-items-center p-2" role="button">Log In</a>
                    </div>
                </div>
            </div>
            <div class="w-100"></div>
            <!-- Sign Up Button -->
            <div class="col-12 px-0 pt-4 border-top text-center" style="max-width: 450px;">
                <h5>Don't have an account?</h5>
                <div class="d-grid mt-4">
                    <a href="./signup.php" class="d-flex btn btn-outline-secondary rounded-pill justify-content-center align-items-center p-2" role="button">SIGN UP</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>