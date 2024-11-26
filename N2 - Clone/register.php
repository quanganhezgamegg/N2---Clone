<?php 
    require ('./config/connectDB.php');
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit'])) {
            $name = $_POST['user_name'];
            $email = $_POST['email'];
            $psw = trim($_POST['psw']);
            $confirmPsw = trim($_POST['confirm_psw']);
            $queryEmail = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

            if (empty($name)){
                $errorName = 'Tên không được bỏ trống';
            }
            if (empty($email)) {
                $errorEmail = "Email không được bỏ trống.";
            }else if (mysqli_num_rows($queryEmail)) {
                $errorEmail = "Tài khoản này đã có người đăng ký";
            }
            
            if (empty($psw)) {
                $errorPsw = "Mật khẩu không được bỏ trống";
            } else if (strlen($psw) < 6) {
                $errorPsw = "Kí tự phải hơn 6";
            }
            if (empty($confirmPsw)) {
                $errorConfirm = "Xác nhận mật khẩu không được bỏ trống";
            }
            
            if ($confirmPsw != $psw) {
                $errorConfirm = "Mật khẩu nhập lại không đúng";
            }

            if (empty($errorName) && empty($errorEmail) && empty($errorPsw) && empty($errorConfirm)) {
                $sql = "INSERT INTO users (name, email, password, role, created_at) VALUES ('$name','$email','$psw',2, NOW())";
                $insert = mysqli_query($conn, $sql);
                if ($insert) {
                    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
                    $row = mysqli_fetch_assoc($query);
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['role'] = $row['role'];
                    header ('Location: index.php');
                }
            }
            
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .form-group span {
            color: red;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">TẠO TÀI KHOẢN</h1>
                            </div>
                            <form class="user" method="POST">
                                <div class="form-group row">
                                </div>
                                <div class="form-group">
                                    <input name="user_name" type="text" class="form-control form-control-user" id="exampleFirstName"
                                        placeholder="Tên đăng nhập">
                                    <span><?php if(isset($errorName)) echo $errorName ?></span>
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Nhập email">
                                        <span><?php if (isset($errorEmail)) echo $errorEmail ?></span>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="psw" type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Mật khẩu">
                                        <span><?php if(isset($errorPsw)) echo $errorPsw ?></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="confirm_psw" type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Nhập lại mật khẩu">
                                        <span><?php if (isset($errorConfirm)) echo $errorConfirm ?></span>
                                    </div>
                                </div>
                                <button name="submit" class="btn btn-primary btn-user btn-block">
                                    Đăng ký tài khoản
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Quên mật khẩu?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Đã có tài khoản? Đăng nhập!</a>
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
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>