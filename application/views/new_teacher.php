<?php $this->load->view('header'); ?>
      <div class="span10">
        <div class="row-fluid">
          <div class="well">
            <h3>Add Employee</h3>
          </div>
          <?php if($message) { ?>
            <div class="alert alert-info">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <span class="text-center"><?php echo $message; ?></span>
            </div>
          <?php } ?>
        </div>
          <form class="form-horizontal" action="<?php echo base_url() ?>teaching/add_teacher" method="post">
            <div class="control-group">
              <label class="control-label" for="inputEmail">Employee Type</label>
              <div class="controls">
                <label class="radio inline">
                  <input type="radio" name="emp_type" id="teaching" value="teaching" checked> Teaching
                </label>
                <label class="radio inline">
                  <input type="radio" name="emp_type" id="non-teaching" value="non-teaching"> Non-teaching
                </label>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="selEmployee">Employee Category</label>
              <div class="controls">
                <select name="emp_cat" id="emp_cat">
                <option value="">--Select--</option>
                  <option value="nps">NPS</option>
                  <option value="gpf">GPF</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputEmail">Name</label>
              <div class="controls">
                <input type="text" name="name" id="inputEmail" placeholder="Name" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputEmail">Designation</label>
              <div class="controls">
                <input type="text" name="designation" id="inputEmail" placeholder="Designation" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputEmail">Department</label>
              <div class="controls">
                <input type="text" name="department" id="inputEmail" placeholder="Department" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">Staff ID</label>
              <div class="controls">
                <input type="number" name="staff_id" id="inputPassword" placeholder="Staff ID" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputEmail">Account Number</label>
              <div class="controls">
                <input type="text" name="account_no" id="inputEmail" placeholder="Account Number" required>
              </div>
            </div>
            <div class="control-group" id="gpf_div">
              <label class="control-label" for="gpf_ac_no">GPF Account Number</label>
              <div class="controls">
                <input type="text" name="gpf_account_no" id="gpf_account_no" placeholder="GPF Account Number">
              </div>
            </div>
            
            <div class="form-actions">
              <input type="submit" name="submit" id="submit" value="Save" class="btn btn-primary btn-large pull-right">
            </div>
          </form> 
      </div>
      <script>
        $(document).ready(function() {
          $('#gpf_div').css('display', 'none');
          $('#emp_cat').change(function(){
            if($(this).val() == 'gpf') {
              $('#gpf_div').slideDown();
            } else {
              $('#gpf_div').slideUp();
            }

          })
        })
      </script>
<?php $this->load->view('footer'); ?>