<!-- jQuery -->
<!-- <script src="<?php echo VENDER; ?>/jquery/jquery.min.js"></script> -->
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo VENDER; ?>/bootstrap/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo VENDER; ?>/metisMenu/metisMenu.min.js"></script>
<!-- DataTables JavaScript -->
<script src="<?php echo VENDER; ?>/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo VENDER; ?>/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo VENDER; ?>/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
</body>

</html>