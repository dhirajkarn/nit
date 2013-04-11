<?php $this->load->view('header'); ?>
      <div class="span10">
        <div class="row-fluid">
          <div class="hero-unit" style="padding:20px;">
            <h3>Employee's Pay Details</h3>
          </div>
        </div>
        <div class="row-fluid">
          <?php if($message) { ?>
            <div class="alert alert-info">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <span class="text-center"><?php echo $message; ?></span>
            </div>
          <?php } ?>
        </div>
        <div class="row-fluid">
          <div class="span6">
            <form class="form-inline" action="<?php echo base_url() ?>/teaching/pay_details" method="post">
                <select name="emp_type" id="emp_type">
                  <option value="">--Select Employee Type--</option>
                  <option value="teaching">Teaching</option>
                  <option value="non-teaching">Non-teaching</option>
                </select>
                <select name="sel_month" id="sel_month">
                <option value="">--Select Month--</option>
                  <?php foreach($month_list as $row) { ?>
                  <option value="<?php echo $row['dt']; ?>"><?php echo $row['dt']; ?></option>
                  <?php } ?>
                </select>
              <input type="submit" name="submit" id="submit" value="Go" class="btn btn-primary">
            </form>
          </div>
          <div class="span3 pull-right">
            <?php if($emp) { ?>
                <label class="inline"><strong><?php echo $sel_month ?> Launch</strong></label>
                <div class="progress progress-warning">
                  <div class="bar" style="width : <?php echo $emp_percent ?>;"></div>
                </div>
            <?php } ?>           
          </div>
        </div>
        <hr>
        <?php if($emp) { ?>
        <div class="row-fluid">
          <h3 class="text-center text-info"><small>Employee list for </small><?php echo $sel_month ?></h3>
          <table class="table table-hover">
            <thead>
              <th>Sl. No.</th>
              <th>Name</th>
              <th>Designation</th>
              <th>Department</th>
              <th>Account Number</th>
              <th>Date</th>
            </thead>
            <tbody>
              <?php $i = 0; foreach($cur_emp as $rows) { $i++; ?>
              <tr>
                <td><strong><?php echo $i; ?></strong></td>
                <td><a href="<?php echo base_url() ?>/teaching/pay_summary/<?php echo $rows['id'] ?>/<?php echo $sel_month ?>"><?php echo $rows['name'] ?></a></td>
                <td><?php echo $rows['designation'] ?></td>
                <td><?php echo $rows['department'] ?></td>
                <td><?php echo $rows['account_no'] ?></td>
                <td><?php echo $rows['date_added'] ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <?php } ?>
      </div>
      
<?php $this->load->view('footer'); ?>