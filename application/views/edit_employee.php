<?php $this->load->view('header'); ?>
      <div class="span10">
        <div class="row-fluid">
          <div class="well">
            <h3>Edit Information for : <?php echo $cur_emp['name'] ?></h3>
          </div>
          <?php if($message) { ?>
            <div class="alert alert-info">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <span class="text-center"><?php echo $message; ?></span>
            </div>
          <?php } ?>
        </div>
          <form class="form-horizontal" action="<?php echo base_url() ?>teaching/edit_employee/<?php echo $cur_emp['emp_type'] ?>/<?php echo $cur_emp['id'] ?>" method="post">
            <div class="control-group">
              <label class="control-label" for="inputEmail">Type of Employee</label>
              <div class="controls">
                <label class="radio inline">
                  <input type="radio" name="emp_type" id="teaching" value="teaching" <?php if($cur_emp['emp_type'] == "teaching") {echo "checked";} ?>> Teaching
                </label>
                <label class="radio inline">
                  <input type="radio" name="emp_type" id="non-teaching" value="non-teaching" <?php if($cur_emp['emp_type'] == "non-teaching") {echo "checked";} ?>> Non-teaching
                </label>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="selEmployee">Employee Category</label>
              <div class="controls">
                <select name="emp_cat" id="emp_cat">
                <option value="">--Select--</option>
                  <option value="nps" <?php if($cur_emp['emp_cat'] == "nps") {echo "selected";} ?>>NPS</option>
                  <option value="gpf" <?php if($cur_emp['emp_cat'] == "gpf") {echo "selected";} ?>>GPF</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputEmail">Name</label>
              <div class="controls">
                <input type="text" name="name" id="inputEmail" placeholder="Name" value="<?php echo $cur_emp['name'] ?>" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputEmail">Designation</label>
              <div class="controls">
                <input type="text" name="designation" id="inputEmail" placeholder="Designation" value="<?php echo $cur_emp['designation'] ?>" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputEmail">Department</label>
              <div class="controls">
                <input type="text" name="department" id="inputEmail" placeholder="Department" value="<?php echo $cur_emp['department'] ?>" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">Staff ID</label>
              <div class="controls">
                <input type="number" name="staff_id" id="inputPassword" placeholder="Staff ID" value="<?php echo $cur_emp['staff_id'] ?>" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputEmail">Account Number</label>
              <div class="controls">
                <input type="text" name="account_no" id="inputEmail" placeholder="Account Number" value="<?php echo $cur_emp['account_no'] ?>" required>
              </div>
            </div>
            <div class="control-group" id="gpf_div" style="display: none;">
              <label class="control-label" for="gpf_ac_no">GPF Account Number</label>
              <div class="controls">
                <input type="text" name="gpf_account_no" id="gpf_account_no" placeholder="GPF Account Number" value="<?php echo $cur_emp['gpf_account_no'] ?>">
              </div>
            </div>
            
            <div class="form-actions">
              <input type="submit" name="submit" id="submit" value="Update" class="btn btn-primary btn-large pull-right">
            </div>
          </form> 
      </div>
      <script>
        $(document).ready(function() {
          $('#emp_cat').attr('disabled', 'true');
          $('#emp_cat').each(function() {
            if($(this).val() == "gpf") {
              $('#gpf_div').css('display', '');
            }
          })
        })
      </script>
<?php $this->load->view('footer'); ?>