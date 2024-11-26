<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $discount = $_POST['discount'] == '' ? 0 : $_POST['discount'];
        $category_id = $_POST['category_id'];
        $description = $_POST['description'];

        $target_dir = './upload_img/';
        $target_file = $target_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], '.'.$target_file);
        $sql = "INSERT INTO products (product_name, price, discount, product_image, category_id, description, create_date) 
                VALUES ('$name', '$price', $discount, '$target_file', $category_id, '$description', NOW())";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script>
                        Swal.fire({
                            title: "Thành công!",
                            text: "Thêm sản phẩm thành công!",
                            icon: "success",
                            timer: 1000,
                            showConfirmButton: false
                        });
                    </script>';
        }
    }
}
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <div class="mb-3">
                                <form name="categories" method="POST" enctype="multipart/form-data">
                                    <div class="layout-grid">
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">Tên sản phẩm</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2"
                                                name="name" placeholder="Tên sản phẩm" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Giá sản phẩm</label>
                                            <input oninput="validatePrice(this)" type="number" class="form-control"
                                                id="price" name="price" placeholder="Giá sản phẩm" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="discount" class="form-label">Phần trăm giảm giá</label>
                                            <input oninput="validateDiscount(this)" type="number" class="form-control"
                                                id="discount" name="discount" placeholder="Phần trăm giảm giá">
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Ảnh sản phẩm</label>
                                            <input type="file" class="form-control" id="image" name="image" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="category_name" class="form-label">Tên loại hàng</label>
                                            <select name="category_id" id="category_name" class="form-control" required>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * FROM categories");
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                    ?>
                                                    <option value="<?= $row['id'] ?>">
                                                        <?= $row['category_name'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Mô tả sản phẩm</label>
                                        <textarea name="description" id="description" cols="30" rows="10"
                                            required></textarea>
                                    </div>
                                    <br>
                                    <div>
                                        <button name="submit" type="submit" class="btn btn-primary">Thêm</button>
                                        <a href="./index.php?act=listSP" class="btn btn-warning">Quay về</a>
                                    </div>
                                </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>