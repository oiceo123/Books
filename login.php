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
    <div class="text-center py-4 border-bottom">
        <h2 class="">E-BOOK&#9733PLUS-ULTRA</h2>
    </div>
    <div class="container py-4" style="width: 45%;">
        <!-- Email Input -->
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label fw-bold">Email address or username</label>
            <input type="email" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="Email address or username">
        </div>
        <!-- Password Input -->
        <div class="mb-3">
            <label for="inputPassword5" class="form-label fw-bold">Password</label>
            <div class="input-group">
                <input type="password" id="inputPassword5" class="form-control form-control-lg" aria-labelledby="passwordHelpBlock" placeholder="Password">
                <span class="input-group-text"><i class="bi bi-eye-slash"></i></span>
            </div>
            <div id="passwordHelpBlock" class="form-text">
                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
            </div>
        </div>
        <!-- Forgot Link -->
        <p><a href="#" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Forgot your password?</a></p>
        <!-- Remember Checkbox and Log In Button -->
        <div class="d-flex">
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label text-success" for="flexCheckChecked">
                    Remember me
                </label>
            </div>
            <button type="button" class="btn btn-success ms-auto px-5">LOG IN</button>
        </div>
    </div>
</body>

</html>