<?php
	require "./config/connectDB.php";
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/login_overlay.css" rel='stylesheet' type='text/css' />
	<link href="css/style6.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/shop.css" type="text/css" />
	<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/header.css">
	<title>TSL Shop</title>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js"></script>
    <style>
        article h2 {
            text-align: center;
        }

        .main-form {
            width: 800px;
            margin: auto;
            padding: 70px 0;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
    </style>
</head>
<body>
<?php 
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $sql = "UPDATE users SET name = '$name', phone = $phone, address = '$address', email = '$email' WHERE id = $id";
            $result = mysqli_query($conn, $sql); 
            if ($result) {
                echo '<script>
                        Swal.fire({
                            title: "Thành công!",
                            text: "Cập nhật thông tin thành công!",
                            icon: "success",
                            timer: 1000,
                            showConfirmButton: false
                            });
                        </script>';
            }else {
                echo 'Lỗi';
            }
        }
    }
    ?>
    <?php include 'header.php'; ?>
    <article>
        <h2>Thông tin tài khoản</h2>
        <?php
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
        }
        $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
        $phone = $row['phone'] == 0 ? '' : $row['phone'];
        ?>
        <div class="main-form">
            <form action="" method="POST">
                <div class="form-grid">
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Tên người dùng</label>
                        <input value="<?=$row['name']?>" type="text" class="form-control" id="formGroupExampleInput2"
                            name="name" placeholder="Tên người dùng" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input value="<?=$phone?>" type="number" class="form-control" id="phone"
                            name="phone" placeholder="Số điện thoại" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input value="<?=$row['address']?>" type="text" class="form-control" id="address"
                            name="address" placeholder="Địa chỉ của bạn" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input value="<?=$row['email']?>" type="email" class="form-control" id="email"
                            name="email" placeholder="Email của bạn" required>
                    </div>
                </div>
                <div>
                    <button class="btn btn-success" name="submit">Lưu thông tin</button>
                </div>
            </form>
        </div>
    </article>
    <?php include 'footer.php'; ?>
    <script>
        function validateProfile() {
            let password = document.getElementById('password')
            let cfPassword = document.getElementById('cfPassword')
            if (password.value && !cfPassword.value) {
                toastr.error('Vui lòng nhập vào trường xác nhận mật khẩu!')
                cfPassword.focus()
                return false
            }
            if (!password.value && cfPassword.value) {
                toastr.error('Vui lòng nhập vào trường mật khẩu!')
                password.focus()
                return false
            }
            if (password.value && cfPassword.value && password.value !== cfPassword.value) {
                toastr.error('Xác nhận mật khẩu phải trùng với mật khẩu!')
                return false
            }
        }
    </script>
</body>

</html>