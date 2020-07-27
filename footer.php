<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020 <a href="https://sites.google.com/view/pronto-soluciones">Pronto
            Soluciones</a>.</strong> All rights
    reserved.
</footer>

<script>
    $(function(){
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>

<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo SERVER ?>js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo SERVER ?>js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo SERVER ?>js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo SERVER ?>js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo SERVER ?>js/demo.js"></script>
<script>
    $(document).ready(function() {
        $('.sidebar-menu').tree()
    })
</script>

</body>

</html>