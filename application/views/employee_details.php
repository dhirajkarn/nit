<?php $this->load->view('header'); ?>
      <div class="span10">
        <div class="row-fluid">
          <div class="hero-unit" style="padding:20px;">
            <h3><?php echo $employee['name'] ?> <small>details : </small></h3>
          </div>
          <?php if($this->session->flashdata('message')) { ?>
            <div class="alert alert-info">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <span class="text-center"><?php echo $this->session->flashdata('message'); ?></span>
            </div>
          <?php } ?>
        </div>

        <div class="row-fluid">
          <div class="span6">
            <dl class="dl-horizontal">
                <dt>Staff ID :</dt>
                <dd><?php echo $employee['staff_id']; ?></dd>
                <dt>Designation :</dt>
                <dd><?php echo $employee['designation']; ?></dd>
                <dt>Department :</dt> 
                <dd><?php echo $employee['department']; ?></dd>
                <dt>Account Number : </dt>
                <dd><?php echo $employee['account_no']; ?></dd>   
            </dl>
          </div>
        </div>
        <hr>
        <div class="row-fluid">
          <div class="span6">
          <h4 class="text-info">Pay Details</h4>
          <?php if($info) { echo $info; } ?>
            <?php foreach($emp_months_info as $row) { ?>
              <div class="input-append">
                <a class="btn" style="width: 200px;" href="<?php echo base_url() ?>teaching/pay_summary/<?php echo $row['emp_id'] ?>/<?php echo $row['month_added'] ?>"><?php echo $row['month_added'] ?></a>
                <a class="btn btn-info" href="<?php echo base_url() ?>teaching/edit_employee_pay/<?php echo $row['emp_id'] ?>/<?php echo $row['month_added'] ?>">Edit</a>
                <a class="btn btn-danger" href="<?php echo base_url() ?>teaching/delete_emp_pay_by_month/<?php echo $row['emp_id'] ?>/<?php echo $row['month_added'] ?>">Delete</a>
              </div>
              <br>
            <?php } ?>
            <a class="btn btn-primary" href="<?php echo base_url(); ?>teaching/add_teacher_pay/<?php echo $employee['emp_type'] ?>/<?php echo $employee['id'] ?>">Add Pay</a>
            <a class="btn btn-primary" href="<?php echo base_url(); ?>teaching/add_previous_pay/<?php echo $employee['emp_type'] ?>/<?php echo $employee['id'] ?>">Add as Previous Month</a>
          </div>
          <div class="span4">
          <h4 class="text-info">Salary Statement</h4>
            <form action="<?php echo base_url(); ?>/teaching/get_salary_statement/<?php echo $employee['id'] ?>" method="post" class="form-inline">
              <div class="input-prepend input-append">
                <span class="add-on">From</span>
                <input class="span4 required" id="start_date" type="text" name="start_date" placeholder="StartDate">
                <span class="add-on">To</span>
                <input class="span4 required" id="end_date" type="text" name="end_date" placeholder="EndDate">
                <input type="submit" name="submit" id="submit" value="Go" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
      <script>
        $(document).ready(function() {
          $('#start_date, #end_date').datepicker({dateFormat : 'yy-mm-dd',
             showAnim : 'fade' });
        })
      </script>
<?php $this->load->view('footer'); ?>