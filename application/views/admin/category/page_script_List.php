<script src="<?php echo base_url('assests/Admin/');  ?>bower_components/bootstrap-toggle/bootstrap-toggle.min.js"></script>
 


<script>
$('#toggle-event').change(function() {
    $("#toggle-event").toggle(this.checked);
    console.log("ok");
});
</script>


