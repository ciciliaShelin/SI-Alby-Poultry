
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Website Alby Poultry <?= date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

  </div> <!-- .site-wrap -->

  <script src="<?=base_url('assets/asset/');?>js/jquery-3.3.1.min.js"></script>
  <script src="<?=base_url('assets/asset/');?>js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?=base_url('assets/asset/');?>js/jquery-ui.js"></script>
  <script src="<?=base_url('assets/asset/');?>js/popper.min.js"></script>
  <script src="<?=base_url('assets/asset/');?>js/bootstrap.min.js"></script>
  <script src="<?=base_url('assets/asset/');?>js/owl.carousel.min.js"></script>
  <script src="<?=base_url('assets/asset/');?>js/jquery.stellar.min.js"></script>
  <script src="<?=base_url('assets/asset/');?>js/jquery.countdown.min.js"></script>
  <script src="<?=base_url('assets/asset/');?>js/bootstrap-datepicker.min.js"></script>
  <script src="<?=base_url('assets/asset/');?>js/jquery.easing.1.3.js"></script>
  <script src="<?=base_url('assets/asset/');?>js/aos.js"></script>
  <script src="<?=base_url('assets/asset/');?>js/jquery.fancybox.min.js"></script>
  <script src="<?=base_url('assets/asset/');?>js/jquery.sticky.js"></script>

  
  <script src="<?=base_url('assets/asset/');?>js/main.js"></script>
    
  </body>
</html>