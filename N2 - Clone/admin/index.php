<?php 
require "../config/connectDB.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "header.php" ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <!-- content -->
                <?php
                if (isset($_GET['act'])) {
                    $act = $_GET['act'];
                    switch ($act) {
                        // Handle product
                        case 'listSP':
                            $sql = "SELECT P.*, C.*, P.id AS product_id 
                                    FROM products AS P 
                                    INNER JOIN categories AS C 
                                    ON P.category_id = C.id 
                                    WHERE 1";
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if (isset($_POST['submit'])) {
                                    $data = $_POST['search'];
                                    $sql .= " AND P.id LIKE '%$data%' 
                                            OR P.product_name LIKE '%$data%'
                                            OR C.category_name LIKE '%$data%'";
                                }
                            }
                            $result = mysqli_query($conn, $sql);
                            include "./product/list.php";
                            break;
                        case 'addSP':
                            include './product/add.php';
                            break;
                        case 'updateSP':
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                            }
                            $sql = "SELECT * FROM products WHERE id = $id";
                            $query = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_assoc($query);
                            include './product/update.php';
                            break;
                        case 'handleUpdateSP':
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if (isset($_POST['submit'])) {
                                    $id = $_POST['id'];
                                    $name = $_POST['name'];
                                    $price = $_POST['price'];
                                    $discount = $_POST['discount'] == '' ? 0 : $_POST['discount'];
                                    $category_id = $_POST['category_id'];
                                    $description = $_POST['description'];

                                    if (is_uploaded_file($_FILES['image']['tmp_name'])){
                                        $target_dir = './upload_img/';
                                        $target_file = $target_dir . basename($_FILES['image']['name']);
                                        move_uploaded_file($_FILES['image']['tmp_name'], '.'.$target_file);
                                        
                                        $sql = "UPDATE products 
                                        SET id = $id, product_name = '$name', 
                                            price = $price, discount = $discount, 
                                            category_id = $category_id, 
                                            description = '$description',product_image = '$target_file', create_date = NOW() WHERE id = $id";
                                    }else {
                                        $sql = "UPDATE products 
                                        SET id = $id, product_name = '$name', 
                                            price = $price, discount = $discount, 
                                            category_id = $category_id, 
                                            description = '$description', create_date = NOW() WHERE id = $id";
                                    }
                                    mysqli_query($conn, $sql);
                                }
                            }
                            echo '<script>
                                    Swal.fire({
                                        title: "Thành công!",
                                        text: "Cập nhật sản phẩm thành công!",
                                        icon: "success",
                                        timer: 1000,
                                        showConfirmButton: false
                                    });
                                </script>';
                            $sql2 = "SELECT P.*, C.*, P.id AS product_id 
                                    FROM products AS P 
                                    INNER JOIN categories AS C 
                                    ON P.category_id = C.id";
                            $result = mysqli_query($conn, $sql2);
                            include "./product/list.php";
                            break;
                        case 'deleteSP':
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $delete = mysqli_query($conn, "DELETE FROM products WHERE id = $id");
                                if ($delete) {
                                    echo '<script>
                                    Swal.fire({
                                        title: "Thành công!",
                                        text: "Xóa sản phẩm thành công!",
                                        icon: "success",
                                        timer: 1000,
                                        showConfirmButton: false
                                    });
                                    </script>';
                                }
                            }
                            $sql = "SELECT P.*, C.*, P.id AS product_id 
                                    FROM products AS P 
                                    INNER JOIN categories AS C 
                                    ON P.category_id = C.id";
                            $result = mysqli_query($conn, $sql);
                            include "./product/list.php";
                            break;
                              case 'deleteSP':
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $delete = mysqli_query($conn, "DELETE FROM products WHERE id = $id");
                                if ($delete) {
                                    echo '<script>
                                    Swal.fire({
                                        title: "Thành công!",
                                        text: "Xóa sản phẩm thành công!",
                                        icon: "success",
                                        timer: 1000,
                                        showConfirmButton: false
                                    });
                                    </script>';
                                }
                            }
                            $sql = "SELECT P.*, C.*, P.id AS product_id 
                                    FROM products AS P 
                                    INNER JOIN categories AS C 
                                    ON P.category_id = C.id";
                            $result = mysqli_query($conn, $sql);
                            include "./product/list.php";
                            break;
                            // QA làm 
                            case 'deleteUser':
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $delete = mysqli_query($conn, "DELETE FROM users WHERE id = $id");
                                    if ($delete) {
                                        echo '<script>
                                        Swal.fire({
                                            title: "Thành công!",
                                            text: "Xóa sản phẩm thành công!",
                                            icon: "success",
                                            timer: 1000,
                                            showConfirmButton: false
                                        });
                                        </script>';
                                    }
                                }
                                $sql = "SELECT * FROM users;";
                                $result = mysqli_query($conn, $sql);
                                include "./users/list.php";
                                break;
                                //
                        // handle categories
                        case 'listDM':
                            $sql = "SELECT * FROM categories WHERE 1";
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if (isset($_POST['submit'])) {
                                    $data = $_POST['search'];
                                    $sql .= " AND category_name LIKE '%$data%'";
                                }
                            }
                            $result = mysqli_query($conn, $sql);
                            include "./categories/list.php";
                            break;
                        case 'addDM':
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if (isset($_POST['submit'])) {
                                    $name = $_POST['name'];
                                    $sql = "INSERT INTO categories (category_name) VALUES ('$name')";
                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {
                                        echo '<script>
                                            Swal.fire({
                                            title: "Thành công!",
                                            text: "Thêm loại hàng thành công!",
                                            icon: "success",
                                            timer: 1000,
                                            showConfirmButton: false
                                            });
                                        </script>';
                                    }
                                }
                            }
                            include "./categories/add.php";
                            break;
                        case 'updateDM':
                            if ($_GET['id']) {
                                $id = $_GET['id'];
                            }
                            $sql = "SELECT * FROM categories WHERE id = $id";
                            $query = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_assoc($query);
                            include "./categories/update.php";
                            break;
                        case 'handleUpdateDM':
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if (isset($_POST['submit'])) {
                                    $id = $_POST['id'];
                                    $name = $_POST['name'];
                                    $query = mysqli_query($conn,"UPDATE categories SET category_name = '$name' WHERE id = $id");
                                }
                            }
                            echo '<script>
                                    Swal.fire({
                                        title: "Thành công!",
                                        text: "Cập nhật loại hàng thành công!",
                                        icon: "success",
                                        timer: 1000,
                                        showConfirmButton: false
                                    });
                                    </script>';
                            $sql = "SELECT * FROM categories";
                            $result = mysqli_query($conn, $sql);
                            include "./categories/list.php";
                            break;
                        case 'deleteDM':
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $delete = mysqli_query($conn, "DELETE FROM categories WHERE id = $id");
                                if ($delete) {
                                    echo '<script>
                                            Swal.fire({
                                            title: "Thành công!",
                                            text: "Xóa loại hàng thành công!",
                                            icon: "success",
                                            timer: 1000,
                                            showConfirmButton: false
                                            });
                                        </script>';
                                }
                            }
                            $sql = "SELECT * FROM categories";
                            $result = mysqli_query($conn, $sql);
                            include "./categories/list.php";
                            break;
                        // handle users 
                        case 'order':
                            if (isset($_GET['order_id'])){
                                $id = $_GET['order_id'];
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    if (isset($_POST['update'])) {
                                        $status = $_POST['status'];
                                        $query = mysqli_query($conn, "UPDATE orders SET order_status = '$status' WHERE id =$id"); 
                                        if ($query) {
                                            echo '<script>
                                                    Swal.fire({
                                                        title: "Cập nhật thành công!",
                                                        text: "Cập nhật trạng thái thành công!",
                                                        icon: "success",
                                                        timer: 1000
                                                    });
                                                </script>';
                                        }
                                    }
                                }
                            }
                            $result = mysqli_query($conn, "SELECT O.*, U.*, O.id AS order_id  FROM orders AS O INNER JOIN users AS U ON O.user_id = U.id");
                            include "./order/list.php";
                            break;
                        case 'order_detail':
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                            }

                            $sql = "SELECT * FROM order_detail AS O INNER JOIN products AS P ON O.product_id = P.id WHERE order_id = $id";
                            $result = mysqli_query($conn, $sql);
                            include "./order/list-detail.php";
                            break;
                        case 'users':
                            $sql = "SELECT * FROM users WHERE 1";
                            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if (isset($_POST['submit'])) {
                                    $data = $_POST['search'];
                                    $sql .= " AND id LIKE '%$data%' OR name LIKE '%$data%' OR email LIKE '%$data%'";
                                }
                            }
                            $result = mysqli_query($conn, $sql);
                            include "./users/list.php";
                            break;
                        default: 
                            include "./control/index.php";
                    }
                }else {
                    include './control/index.php';
                }
                ?>
                <?php
                include "footer.php"
                ?>
                    
</body>

</html>