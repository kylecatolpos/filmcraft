<!-- Comment for the header file -->
<?php include("header.php"); ?>
<!-- -->

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0" style="background-color:#395232">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-white mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="function/register.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" name="fname" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" name="lname" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" >
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block" name="actionRegister">
                                    Register Account
                                </button>
                        </form>
                        
                            <hr style="border:1px solid white">
                            <div class="text-center">
                                <a class="small" href="forgot-password.php" style="color:white">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php" style="color:white">Already have an account? Login!</a>
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
