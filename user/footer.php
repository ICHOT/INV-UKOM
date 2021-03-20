<!-- Footer -->
<!-- <footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; ICHOT 2021</span>
    </div>
  </div>
</footer> -->
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Siap Untuk Keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Pilih "Logout" Untuk Keluar.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</div>
</div><!-- /#right-panel -->
<!-- Right Panel -->
<script src="../assets/js/vendor/jquery2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd
/popper.min.js"></script>
<script src="../assets/js/plugins.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/lib/chartjs/Chart.bundle.js"></script>
<script src="../assets/js/dashboard.js"></script>
<script src="../assets/js/widgets.js"></script>
<script src="../assets/js/lib/vectormap/jquery.vmap.js"></script>
<script src="../assets/js/lib/vectormap/jquery.vmap.min.js"></script>
<script src="../assets/js/lib/vectormap/jquery.vmap.sampledata.js"></script>
<script src="../assets/js/lib/vectormap/country/jquery.vmap.world.js"></script>
<script src="../assets/js/lib/datatable/datatables.min.js"></script>
<script src="../assets/js/lib/datatable/dataTables.bootstrap.min.js"></script>
<script src="../assets/js/lib/datatable/dataTables.buttons.min.js"></script>
<script src="../assets/js/lib/datatable/buttons.bootstrap.min.js"></script>
<script src="../assets/js/lib/datatable/jszip.min.js"></script>
<script src="../assets/js/lib/datatable/pdfmake.min.js"></script>
<script src="../assets/js/lib/datatable/vfs_fonts.js"></script>
<script src="../assets/js/lib/datatable/buttons.html5.min.js"></script>
<script src="../assets/js/lib/datatable/buttons.print.min.js"></script>
<script src="../assets/js/lib/datatable/buttons.colVis.min.js"></script>
<script src="../assets/js/lib/data-table/datatablesinit.js"></script>

<!-- SB ADMIN 2 -->

<!-- Bootstrap core JavaScript-->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../assets/js/sb-admin-2.min.js"></script>
<!-- SW2 -->
<!-- <script src="../assets/sw2.js"></script> -->
<script>
  (function($) {
    "use strict";
    jQuery('#vmap').vectorMap({
      map: 'world_en',
      backgroundColor: null,
      color: '#ffffff',
      hoverOpacity: 0.7,
      selectedColor: '#1de9b6',
      enableZoom: true,
      showTooltip: true,
      values: sample_data,
      scaleColors: ['#1de9b6', '#03a9f5'],
      normalizeFunction: 'polynomial'
    });
  })(jQuery);
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#bootstrap-data-table-export').DataTable();
  });
</script>
</body>

</html>