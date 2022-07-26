<?php
    session_start();
    include('config.php');
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo '<p class="error">Username password combination is wrong!</p>';
        } else {
            if (password_verify($password, $result['password'])) {
                $_SESSION['user_id'] = $result['id'];
                echo '<p class="success">Congratulations, you are logged in!</p>';
            } else {
                echo '<p class="error">Username password combination is wrong!</p>';
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style-Loginpage.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login_page</title>
</head>
<body>
    <section class="h-100 gradient-form">
    <div class="container py-5 h-100">
        <div class= "row d-flex justify-content-center align-item-center h-100">
            <div class= "col-xl-10">
            <div class="card rounded-3 text-black mb-5">
                <div class ="row g-0">
                    <div class="col-lg-6">
                       <div class="card-body p-md-5 mx-md-4">
                        <div class="text-center">
                            <img class="rounded-circle" src="./Images/logo.JFIF" alt="">
                            <h1 class="mt-1 mb-5 pb-1">Al-Noor Fabrics</h1>

                        </div>
                        <form method="post" action="" name="signin-form">
                            <p>Please Login Your account</p>
                         
                            <div class="form-outline mb-4">
                                <label class="form-label" for="">User Name</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter your username" required/>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password" required/>
                            </div>

                            <div class="mb-3 form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Check me out</label>
                             <label><a class="d-felx for m-5" href="#">Forgot password</a></label> 
                            </div>
                        
                            <div class="d-black align-items-center justify-content-center pb-4">
                                 <p class="mb-3 me-2">Don't have an account?</p>
                                 <button type="submit" name="login" value="register" class="btn btn-outline-dark w-100 bg-dark text-white"> Sign in </button>
                          <button type="button" class="btn btn-outline-danger w-100 mt-2"> Sign in yoyr Google </button>
                        </div>
                        <div class="mb-4">
                            <p>Don't have no account? <a class="" href="">Sign up for free</a></p>
                        </div>
                        </form>

                       </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                      <h4 class="mb-4">We are more than just a company</h4>
                      <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                  </div>

                </div>
                </div>
            </div>

        </div>

    </div>
    </section>
</body>
</html>