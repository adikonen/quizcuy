                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Website ini Dibuat Hanya Untuk Tujuan Belajar Mengembangkan Sebuah Website</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
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
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= url('user/logout')?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="<?= url('js/config.js')?>"></script>t
    <script src="<?= url('js/lib/Search.js')?>"></script>t
    <!-- Bootstrap core JavaScript-->
    <script src=<?= url("vendor/jquery/jquery.min.js");?>></script>
    <script src=<?= url("vendor/bootstrap/js/bootstrap.bundle.min.js");?>></script>
    
    <!-- Core plugin JavaScript-->
    <script src=<?= url("vendor/jquery-easing/jquery.easing.min.js");?>></script>
   
    
    <script src=<?php echo url("vendor/chart.js/Chart.min.js");?>></script>
       
    <script src=<?php echo url("js/demo/chart-area-demo.js");?>></script>
    <script src=<?php echo url("js/demo/chart-pie-demo.js");?>></script>
   
    <script src=<?=url("js/sb-admin-2.min.js")?>></script>
 
    <script src=<?=url("js/admin.js")?>></script>
</body>

</html>