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
    <script>
        let xmlHttp;

        function checkUsername() {
            if (document.getElementById("username").value == "") {
                document.getElementById("username").className = "form-control";
                return;
            }

            xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = showUsernameStatus;

            let username = document.getElementById("username").value;
            let url = "check_username.php?Username=" + username;
            xmlHttp.open("GET", url);
            xmlHttp.send();
        }

        function showUsernameStatus() {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                if (xmlHttp.responseText == "okay") {
                    document.getElementById("username").className = "form-control border-success border-2";
                } else {
                    document.getElementById("username").className = "form-control border-danger border-2";
                }
            }
        }

        function checkPassword() {
            if (document.getElementById("Password").value == "" || document.getElementById("ConfirmPassword").value == "") {
                document.getElementById("Password").className = "form-control";
                document.getElementById("ConfirmPassword").className = "form-control";
                document.getElementById("checkPassword").className = "d-none";
                document.getElementById("checkConfirmPassword").className = "d-none";
                return;
            }
            if (document.getElementById("Password").value != document.getElementById("ConfirmPassword").value) {
                document.getElementById("Password").className = "form-control border-danger border-2";
                document.getElementById("ConfirmPassword").className = "form-control border-danger border-2";
                document.getElementById("checkPassword").className = "d-block text-danger pt-1 ps-2";
                document.getElementById("checkConfirmPassword").className = "d-block text-danger pt-1 ps-2";
            } else {
                document.getElementById("Password").className = "form-control border-success border-2";
                document.getElementById("ConfirmPassword").className = "form-control border-success border-2";
                document.getElementById("checkPassword").className = "d-none";
                document.getElementById("checkConfirmPassword").className = "d-none";
            }
        }

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

        function checkEmail() {
            if (document.getElementById("email").value == "") {
                document.getElementById("email").className = "form-control";
                return;
            }

            xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = showEmailStatus;

            let email = document.getElementById("email").value;
            let url = "check_email.php?Email=" + email;
            xmlHttp.open("GET", url);
            xmlHttp.send();
        }

        function showEmailStatus() {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                if (xmlHttp.responseText == "okay") {
                    document.getElementById("email").className = "form-control border-success border-2";
                } else {
                    document.getElementById("email").className = "form-control border-danger border-2";
                }
            }
        }

        function toggleGreen() {
            if (document.getElementById("displayName").value == "") {
                document.getElementById("displayName").className = "form-control";
            } else {
                document.getElementById("displayName").className = "form-control border-success border-2";
            }
        }
    </script>
</head>

<body>
    <!-- Logo -->
    <div class="text-center pt-4">
        <a href="./" class="link-dark link-underline-opacity-0">
            <h3 class="d-inline-block mb-4">E-BOOK&#9733PLUS-ULTRA</h3>
        </a>
    </div>
    <div class="container pb-4" style="max-width: 450px;">
        <!-- Head -->
        <div class="row text-center pb-3 mb-4 border-bottom gy-4">
            <div class="col">
                <h3>Sign up for free to start reading</h3>
            </div>
        </div>
        <form action="save_username_password.php" method="post">
            <!-- Username Input -->
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">What's your username?</label>
                    <input type="text" name="Username" class="form-control" id="username" placeholder="Enter your username." onblur="checkUsername()" required>
                </div>
            </div>
            <!-- Password Input -->
            <div class="row mb-3">
                <div class="col">
                    <label for="inputPassword5" class="form-label fw-bold">Create a password</label>
                    <div class="input-group">
                        <input type="password" name="Password" id="Password" class="form-control" aria-labelledby="passwordHelpBlock" placeholder="Create a password." onblur="checkPassword()" required>
                        <span onclick="showPassword()" class="input-group-text"><i id="eye" class="bi bi-eye-slash"></i></span>
                    </div>
                    <div id="checkPassword" class="d-none" style="font-size: 0.9rem;">
                        รหัสผ่านไม่ตรงกัน
                    </div>
                </div>
            </div>
            <!-- Confirm Password Input -->
            <div class="row mb-3">
                <div class="col">
                    <label for="inputPassword5" class="form-label fw-bold">Confirm your password</label>
                    <input type="password" name="ConfirmPassword" id="ConfirmPassword" class="form-control" aria-labelledby="passwordHelpBlock" placeholder="Enter your password again." onblur="checkPassword()" required>
                    <div id="checkConfirmPassword" class="d-none" style="font-size: 0.9rem;">
                        รหัสผ่านไม่ตรงกัน
                    </div>
                </div>
            </div>
            <!-- Email Input -->
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">What's your email?</label>
                    <input type="email" id="email" name="Email" class="form-control" placeholder="Enter your email." onblur="checkEmail()" required>
                </div>
            </div>
            <!-- Display Name Input -->
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">What's your display name?</label>
                    <input type="text" id="displayName" name="DisplayName" class="form-control" placeholder="Enter your display name." onblur="toggleGreen()" required>
                </div>
            </div>
            <!-- Select Gender -->
            <div class="row mb-4">
                <div class="col">
                    <label for="exampleFormSelectInput1" class="form-label fw-bold">What is your gender?</label>
                    <select name="Gender" class="form-select" aria-label="Default select example" required>
                        <option value="" hidden>Select your gender.</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="LGBTQ">LGBTQ</option>
                    </select>
                </div>
            </div>
            <!-- Checkbox marketing messages -->
            <div class="row mb-4">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="MarketingCheckbox" value="1" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            I would prefer not to receive marketing messages from E-BOOK&#9733PLUS-ULTRA
                        </label>
                    </div>
                </div>
            </div>
            <!-- Sign up -->
            <div class="row justify-content-center mb-4">
                <div class="col-5">
                    <button type="submit" class="btn btn-success rounded-pill w-100" style="height: 48px;">Sign up</button>
                </div>
            </div>
        </form>
        <!-- Log In -->
        <div class="row text-center">
            <div class="col">
                Have an account? <a href="./login.php" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Log in.</a>
            </div>
        </div>
    </div>
</body>

</html>