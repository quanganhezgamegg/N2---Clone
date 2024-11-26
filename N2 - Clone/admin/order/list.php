<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Messages -->
        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chi tiết đơn hàng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tổng tiền</th>
                                <th>Người nhận</th>
                                <th>Trạng thái đơn hàng</th>
                                <th>Ngày mua</th>
                                <th>Thao tác</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $totalF = number_format($row['total_amount'], 0, ',', '.');
                                ?>
                                <tr>
                                    <th><?=$row['order_id']?></th>
                                    <td><?=$totalF?><sup>đ</sup></td>
                                    <td><?=$row['name']?></td>
                                    <td><?=$row['order_status']?><sup></sup></td>
                                    <td><?=$row['order_date']?></td>
                                    <td>
                                    <form style="display: flex; flex-direction:column;" action="./index.php?act=order&order_id=<?=$row['order_id']?>" method="POST">
                                        <select class="form-select" name="status" id="">
                                            <?php if ($row['order_status']){ ?>
                                            <option selected value="<?=$row['order_status']?>"><?=$row['order_status']?></option>
                                            <?php } ?>
                                            <option value="Đã xác nhận">Đã xác nhận</option>
                                            <option value="Chuẩn bị đơn hàng">Chuẩn bị đơn hàng</option>
                                            <option value="Đang vận chuyển">Đang vận chuyển</option>
                                            <option value="Đã giao hàng">Đã giao hàng</option>
                                            <option value="Hoàn tất đơn hàng">Hoàn tất đơn hàng</option>
                                            <option value="Hủy đơn hàng">Hủy đơn hàng</option>
                                        </select>
                                        <button name="update" style="margin-top:10px;" class="btn btn-success">Cập nhật</button>
                                    </form>
                                    </td>
                                    <td style="width: 180px;">
                                        <a class="btn btn-warning" href="./index.php?act=order_detail&id=<?=$row['order_id']; ?>">Chi tiết</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>