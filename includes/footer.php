<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <?php
      function copyright($name, $startYear = null){
        $thisYear = date('Y');
        if(is_null($thisYear) || $thisYear == $startYear){
          return "&copy; Copyright" . " " . date('Y') ."<a href=''>". " ". $name ."</a>.</strong> All rights reserved.";
        }
        return "&copy; Copyright" . " " . $startYear ." - " . date('Y') ."<a href=''>". " ". $name ."</a>.</strong> All rights reserved.";
      }
    ?>
    <strong><?php echo copyright("PHP And MySQLi", 2024); ?></strong>
  </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
