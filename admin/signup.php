<?php include './database/insert_user.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Sign up</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                
                <!-- Nested Row within Card Body -->
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <p class="text-danger"><?php echo $error ?? ""; ?></p>
                            <p class="text-success"><?php echo $succ ?? ""; ?></p>
                            <form class="user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" value="<?php echo $name ?? ""; ?>" name="name" id="name"
                                            placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" value="<?php echo $email ?? ""; ?>" name="email" id="email"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" value="<?php echo $phone ?? ""; ?>" name="phone" id="phone"
                                        placeholder="Enter Phone">
                                </div>
                                <div class="form-group">
                                    <textarea name="address" id="address" class="form-control form-control-user" cols="30" rows="3"><?php echo $address ?? ""; ?></textarea>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                        name="pass" id="pass" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                        name="cpass" id="cpass" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" name="submit">Submit</button>
                                <hr>
                            </form>
                            <hr>
                            <!-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> -->
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>