<?php
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Bootstrap 5 Login Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <img src="img/person-circle.svg" alt="logo" width="100">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                            <form action="login.php" method="post" class="needs-validation">
                                <!--Campo de email-->
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                    <div class="invalid-feedback">
                                        Email is invalid.
                                    </div>
                                </div>
                                <!--Campo de senha-->
                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="password">Password</label>
                                        <a href="forgot.html" class="float-end">Forgot Password?</a>
                                    </div>
                                    <input type="password" name="senha" id="" class="form-control">
                                    <div class="invalid-feedback">
                                        Password is required.
                                    </div>
                                </div>
                                <!--Campo lembre-me e campo login-->
                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" id="" class="form-check-input">
                                        <label for="remember" class="form-check-label">Remember</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary ms-auto">Login</button>
                                </div>
                            </form>
                        </div>

                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                Don't have an account? <a href="register.php" class="text-dark">Creat one.</a>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5 text-muted">
                        Copyright &copy 2025-2025 &mdash; Manoel Mano
                    </div>
                </div>
            </div>
        </div>    
    </section>

</body>
</html>