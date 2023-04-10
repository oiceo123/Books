<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./signup.css">
    <title>Sign up</title>
</head>

<body>
    <!-- Logo -->
    <div class="text-center pt-4">
        <h3 class="mb-4">E-BOOK&#9733PLUS-ULTRA</h3>
    </div>
    <div class="container pb-4" style="max-width: 450px;">
        <!-- Head -->
        <div class="row text-center pb-3 mb-4 border-bottom gy-4">
            <div class="col">
                <h3>Sign up for free to start reading</h3>
            </div>
        </div>
        <!-- Username Input -->
        <div class="row mb-3">
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label fw-bold">What's your username?</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your username.">
            </div>
        </div>
        <!-- Password Input -->
        <div class="row mb-3">
            <div class="col">
                <label for="inputPassword5" class="form-label fw-bold">Create a password</label>
                <div class="input-group">
                    <input type="password" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock" placeholder="Create a password.">
                    <span class="input-group-text"><i class="bi bi-eye-slash"></i></span>
                </div>
            </div>
        </div>
        <!-- Confirm Password Input -->
        <div class="row mb-3">
            <div class="col">
                <label for="inputPassword5" class="form-label fw-bold">Confirm your password</label>
                <input type="password" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock" placeholder="Enter your password again.">
            </div>
        </div>
        <!-- Email Input -->
        <div class="row mb-3">
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label fw-bold">What's your email?</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter your email.">
            </div>
        </div>
        <!-- Display Name Input -->
        <div class="row mb-3">
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label fw-bold">What's your display name?</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your display name.">
            </div>
        </div>
        <!-- Select Gender -->
        <div class="row mb-4">
            <div class="col">
                <label for="exampleFormSelectInput1" class="form-label fw-bold">What is your gender?</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected disabled>Select your gender.</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">LGBTQ</option>
                </select>
            </div>
        </div>
        <!-- Checkbox marketing messages -->
        <div class="row mb-4">
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        I would prefer not to receive marketing messages from E-BOOK&#9733PLUS-ULTRA
                    </label>
                </div>
            </div>
        </div>
        <!-- Sign up -->
        <div class="row justify-content-center mb-4">
            <div class="col-5">
                <a href="#" class="d-flex btn btn-success rounded-pill justify-content-center align-items-center" style="height: 48px;" role="button">Sign up</a>
            </div>
        </div>
        <!-- Log In -->
        <div class="row text-center">
            <div class="col">
                Have an account? <a href="./login.php" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Log in.</a>
            </div>
        </div>
    </div>
</body>

</html>