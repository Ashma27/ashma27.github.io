<!-- jQuery -->
<script src="<?php echo base_url('public/js/jquery.min.js'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url('public/js/metisMenu.min.js'); ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('public/js/sb-admin-2.js'); ?>"></script>
<!--
<script src="<?php echo base_url('public/js/jquery.dataTables.min.js'); ?>"></script>

<script src="<?php echo base_url('public/js/dataTables.bootstrap.min.js'); ?>"></script>-->

<script>
    $(window).ready(function(){
        $(".loader").fadeOut("slow");
    });
</script>
<?php if (!empty($script)) {
    ?>
    <script>
        $('#dataTables-example').DataTable({
            responsive: true
        });
    </script>
    <?php }
?>

<?php
if (!empty($top_selling_script)) {
    ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <?php
}
?>    
<script src="<?php echo base_url('public/js/summernote.js'); ?>"></script> 

<!--<script src="<?php echo base_url('public/ckeditor/ckeditor.js'); ?>" ></script> -->
<script src="<?php echo base_url('public/js/abkasa-custom.js'); ?>"></script>    
<script src="<?php echo base_url('public/js/abkasa.js'); ?>"></script>

<!--<script> CKEDITOR.replace( 'description' );</script>-->

</body>

</html>