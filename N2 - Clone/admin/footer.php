<!-- Footer -->


    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">X</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteC(event) {
            event.preventDefault();

            const deleteLink = event.currentTarget; // sử dụng this để lấy phần tử được kích hoạt
            const path = deleteLink.getAttribute('href');

            Swal.fire({
                title: "Bạn có chắc muốn xóa?",
                text: "Bạn sẽ không thể khôi phục điều này!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Hủy bỏ",
                confirmButtonText: "Xóa"
            }).then((result) => {
                if (result.value) {
                    document.location.href = path;
                }
            });
        }


        $('#description').summernote({
            placeholder: 'Mô tả sản phẩm',
            tabsize: 2,
            height: 150
        });

        function validateDiscount(input) {
            if (input.value < 0) {
                input.value = 0;
            }

            if (input.value > 100) {
                input.value = 100; 
            }
        }

        function validatePrice(input) {
            if (input.value < 0) {
                input.value = 0;
            }
        }
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    