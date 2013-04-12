<?php $this->load->view('header'); ?>
      <div class="span10">
        <div class="row-fluid">
          <div class="hero-unit" style="padding:20px;">
            <h3>Salary Bill</h3>
          </div>
        </div>
        <div class="row-fluid">
          <?php if($this->session->flashdata('message')) { ?>
            <div class="alert alert-info">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <span class="text-center"><?php echo $this->session->flashdata('message'); ?></span>
            </div>
          <?php } ?>
        </div>
        <div class="row-fluid">
            <form class="form-inline" action="<?php echo base_url() ?>/teaching/get_salary_bill" method="post">
                <select name="emp_type" id="emp_type">
                  <option value="">--Select Employee Type--</option>
                  <option value="teaching">Teaching</option>
                  <option value="non-teaching">Non-teaching</option>
                </select>
                <select name="emp_cat" id="emp_cat">
                  <option value="">--Select Employee Category--</option>
                  <option value="nps">NPS</option>
                  <option value="gpf">GPF</option>
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
        <hr>
      </div>
      
<?php $this->load->view('footer'); ?>