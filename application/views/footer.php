</div><!-- end of row-fluid right before main span10 -->
</div>


<script src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/emp_pay.js"></script>
<script>
  $(document).ready(function() {
    $('#date').datepicker({dateFormat : 'yy-mm-dd', minDate : -5, maxDate : '+1m +5d',
       showAnim : 'fade' });
  })
</script>
</body>
</html>