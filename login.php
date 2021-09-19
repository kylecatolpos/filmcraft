<!-- Comment for the header file -->
<?php include("header.php"); ?>
<!-- -->

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0" style="background-color:#395232">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-white mb-4">
                                            <img src="resources/img/filmcraft.png" width="189" style="margin: 50px 0"></h1>
                                    </div>
                                    <form class="user" action="function/login.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address" name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>

                                        <button type="submit" name="actionLogin" class="btn btn-primary btn-user btn-block">Login</button>
                                      
                                       </form>
                                      <hr style="border: 1px solid white">
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php" style="color:white">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php" style="color:white">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Footer Script -->
<?php include("footer.php"); ?>
<!-- -->
