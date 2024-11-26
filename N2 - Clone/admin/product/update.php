<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cập nhật sản phẩm</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <div class="mb-3">
                                <form action="./index.php?act=handleUpdateSP" name="categories" method="POST" enctype="multipart/form-data">
                                    <div class="layout-grid">
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">Tên sản phẩm</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2"
                                                name="name" placeholder="Tên sản phẩm" value="<?=$result['product_name']?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Giá sản phẩm</label>
                                            <input oninput="validatePrice(this)" type="number" class="form-control"
                                                id="price" name="price" placeholder="Giá sản phẩm" value="<?=$result['price']?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="discount" class="form-label">Phần trăm giảm giá</label>
                                            <input oninput="validateDiscount(this)" type="number" class="form-control"
                                                id="discount" name="discount" placeholder="Phần trăm giảm giá" value="<?=$result['discount']?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Ảnh sản phẩm</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                            <img style="width:50px;" src=".<?=$result['product_image']?>" alt="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="category_name" class="form-label">Tên loại hàng</label>
                                            <select name="category_id" id="category_name" class="form-control" required>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * FROM categories");
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                    if ($row['id'] == $result['category_id']) {
                                                    ?>
                                                    <option selected value="<?=$row['id']?>"><?=$row['category_name']?></option>
                                                    <?php }else { ?>
                                                    <option value="<?= $row['id'] ?>">
                                                        <?= $row['category_name'] ?>
                                                    </option>
                                                <?php } }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Mô tả sản phẩm</label>
                                        <textarea name="description" id="description" cols="30" rows="10"
                                            required><?=$result['description']?></textarea>
                                    </div>
                                    <br>
                                    <div>
                                        <input type="hidden" name="id" value="<?=$result['id']?>">
                                        <button name="submit" type="submit" class="btn btn-primary">Cập nhật</button>
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