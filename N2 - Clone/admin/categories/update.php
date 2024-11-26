<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <div class="mb-3">
                                <form name="categories" method="POST" action="./index.php?act=handleUpdateDM">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">Tên loại hàng
                                            </label>
                                            <input value="<?=$result['category_name']?>" type="text" class="form-control" id="formGroupExampleInput2"
                                                name="name" placeholder="Tên loại hàng">
                                        </div>
                                        <br>
                                        <div>
                                            <input type="hidden" name="id" value="<?=$result['id']?>">
                                            <button name="submit" type="submit" class="btn btn-primary">Cập nhật</button>
                                            <a href="./index.php?act=listDM" class="btn btn-warning">Quay về</a>
                                        </div>
                                </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>