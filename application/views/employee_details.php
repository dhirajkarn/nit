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
          <h4><?php echo $employee['name'] ?>'s <small>Pay Details have been saved for the following months : </small></h4>
          <ul class="nav nav-pills nav-stacked">
            <?php foreach($emp_months_info as $row) { ?>
              <li class="active"><a href="<?php echo base_url() ?>teaching/pay_summary/<?php echo $row['emp_id'] ?>/<?php echo $row['date'] ?>"><?php echo $row['date'] ?></a></li>
            <?php } ?>
          </ul>
          <a class="btn btn-info btn-primary" href="<?php echo base_url(); ?>teaching/add_teacher_pay/<?php echo $employee['emp_type'] ?>/<?php echo $employee['id'] ?>">Add Pay</a>
        </div>
        
      </div>
      
<?php $this->load->view('footer'); ?>