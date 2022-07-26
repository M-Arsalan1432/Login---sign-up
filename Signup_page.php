<?php
    session_start();
    include('config.php');
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error">The email address is already registered!</p>';
        }
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO users(username,password,email) VALUES (:username,:password_hash,:email)");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $result = $query->execute();
            if ($result) {
                echo '<p class="success">Your registration was successful!</p>';
            } else {
                echo '<p class="error">Something went wrong!</p>';
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
    <title>Signup_page</title>
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
                        <form method="post" action="" name="signup-form">
                            <p>Please Sign Up Your account</p>
                         
                            <div class="form-outline mb-4">
                                <label class="form-label" for="">User Name</label>
                                <input type="text" name="username" pattern="[a-zA-Z0-9]+" class="form-control" placeholder="Enter your username" required/>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="">Email</label>
                                <input type="Email" name="email" class="form-control" placeholder="Enter your email" required/>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password" required/>
                            </div>
                        
                            <div class="d-black align-items-center justify-content-center pb-4">
                                
                          <button type="submit" name="register" value="register" class="btn btn-outline-dark w-100 bg-dark text-white"> Sign up </button>
                          
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