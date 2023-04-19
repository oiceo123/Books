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
    <script>
        function showPassword() {
            let x = document.getElementById("Password");
            let y = document.getElementById("eye")
            if (x.type == "password") {
                x.type = "text";
                y.className = "bi bi-eye";
            } else {
                x.type = "password"
                y.className = "bi bi-eye-slash";
            }
        }
    </script>
</head>

<body>
    <!-- Logo -->
    <div class="text-center py-4 mb-4 border-bottom">
        <a href="./" class="head">
            <h3 class="d-inline-block">E-BOOK&#9733PLUS-ULTRA</h3>
        </a>
    </div>
    <div class="container">
        <form action="check_login.php" method="post">
            <div class="row justify-content-center">
                <!-- Username Input -->
                <div class="col-12 p-0 mb-3" style="max-width: 450px;">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Username</label>
                    <input type="text" class="form-control" name="Username" style="height: 48px;" placeholder="Username" required>
                </div>
                <div class="w-100"></div>
                <!-- Password Input -->
                <div class="col-12 p-0 mb-3" style="max-width: 450px;">
                    <label for="inputPassword5" class="form-label fw-bold">Password</label>
                    <div class="input-group">
                        <input type="password" id="Password" name="Password" class="form-control" style="height: 48px;" aria-labelledby="passwordHelpBlock" placeholder="Password" required>
                        <span onclick="showPassword()" class="input-group-text"><i id="eye" class="bi bi-eye-slash"></i></span>
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
                            <button type="submit" class="btn btn-success rounded-pill p-2">Log In</button>
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
        </form>
    </div>
</body>

</html>