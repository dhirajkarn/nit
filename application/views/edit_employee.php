<?php $this->load->view('header'); ?>
      <div class="span10">
        <div class="row-fluid">
          <div class="hero-unit" style="padding:30px;">
            <h2>Welcome to NIT PATNA</h2>
            <p>Accounts Management Section</p>
            <p>
              <a class="btn btn-primary btn-large">
                Learn more
              </a>
            </p>
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
            
            <div class="form-actions">
              <input type="submit" name="submit" id="submit" value="Update" class="btn btn-primary btn-large pull-right">
            </div>
          </form> 
      </div>
<?php $this->load->view('footer'); ?>