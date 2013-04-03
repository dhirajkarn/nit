<?php $this->load->view('header'); ?>
      <div class="span10">
        <div class="row-fluid">
          <div class="hero-unit" style="padding:20px;">
            <h3>Employee's Pay Details</h3>
          </div>
        </div>
        <div class="row-fluid">
          <form class="form-horizontal pull-right">
            <div class="control-group">
              <label class="control-label" for="selMonth">Select Month</label>
              <div class="controls">
                <select name="sel_month" id="sel_month">
                <option value="">--Select Month--</option>
                  <?php foreach($month_list as $row) { ?>
                  <option value="<?php echo $row['date']; ?>"><?php echo $row['date']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </form>
        </div>
        <p id="loading" style="font-weight: normal; display: none; text-align: center;"><img src="<?php echo base_url(); ?>assets/img/progress.gif" alt=""></p>
        <div class="row-fluid">
          <div id="result" style="display: none;"></div>
        </div>
      </div>
      <script type="text/javascript">
             $(document).ready(function() {
                 $('#sel_month').change(function() {
                    $('#loading').show();
                     if($(this).val() != "") {
                            $.get(
                            'http://localhost:8080/nit/ajax/get_employees_by_month',
                            {
                                sel_month: $(this).val()
                            },
                            function(data) {
                                $('#loading').hide();
                                $('#result').html(data).slideDown('slow');
                            }
                            );
                        }
                 });
             });
         </script>
<?php $this->load->view('footer'); ?>