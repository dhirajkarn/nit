<?php $this->load->view('header'); ?>
      <div class="span10">
        <div class="row-fluid">
          <div class="hero-unit" style="padding:20px;">
            <h3>Employee List</h3>
          </div>
          <?php if($this->session->flashdata('message')) { ?>
            <div class="alert alert-info">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <span class="text-center"><?php echo $this->session->flashdata('message'); ?></span>
            </div>
          <?php } ?>
        </div>
        <!-- Accordion starts -->
        <div class="accordion" id="accordion2">
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                <strong>Teachers List</strong>
              </a>
            </div>
            <div id="collapseOne" class="accordion-body collapse">
              <div class="accordion-inner">
                <table class="table table-condensed table-hover">
                  <thead>
                    <th>Sl. No.</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Account Number</th>
                    <th>&nbsp;</th>
                  </thead>
                  <tbody>
                    <?php $i = 0; foreach($teachers as $row) { $i++; ?>
                    <tr>
                      <td><strong><?php echo $i; ?></strong></td>
                      <td><a href="<?php echo base_url(); ?>teaching/employee_details/<?php echo $row['emp_type'] ?>/<?php echo $row['id'] ?>" data-toggle="tooltip" title="Click here for details"><?php echo $row['name']; ?></a></td>
                      <td><?php echo $row['designation']; ?></td>
                      <td><?php echo $row['department']; ?></td>
                      <td><?php echo $row['account_no']; ?></td>
                      <!-- action btn starts -->
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-info">Action</button>
                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                              <span class="caret info"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <!-- dropdown menu links -->
                              <li><a href="<?php echo base_url(); ?>teaching/add_teacher_pay/<?php echo $row['emp_type'] ?>/<?php echo $row['id'] ?>"><i class="icon-plus"></i> Add Pay</a></li>
                              <li><a href="<?php echo base_url(); ?>teaching/edit_employee/<?php echo $row['emp_type'] ?>/<?php echo $row['id'] ?>"><i class="icon-pencil"></i> Edit Information</a></li>
                              <li><a href="<?php echo base_url(); ?>teaching/delete_employee/<?php echo $row['id'] ?>"><i class="icon-trash"></i> Delete Employee</a></li>
                            </ul>
                          </div>
                        </td>
                      <!-- ends -->
                    </tr>
                    <?php } ?>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                <strong>Non-teachers List</strong>
              </a>
            </div>
            <div id="collapseTwo" class="accordion-body collapse">
              <div class="accordion-inner">
                <table class="table table-condensed table-hover">
                  <thead>
                    <th>Sl. No.</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Account Number</th>
                    <th>&nbsp;</th>
                  </thead>
                  <tbody>
                    <?php $i = 0; foreach($non_teachers as $row) { $i++; ?>
                    <tr>
                      <td><strong><?php echo $i; ?></strong></td>
                      <td><a href="<?php echo base_url(); ?>teaching/employee_details/<?php echo $row['emp_type'] ?>/<?php echo $row['id'] ?>" data-toggle="tooltip" title="Click here for details"><?php echo $row['name']; ?></a></td>
                      <td><?php echo $row['designation']; ?></td>
                      <td><?php echo $row['department']; ?></td>
                      <td><?php echo $row['account_no']; ?></td>
                      <!-- action btn starts -->
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-info">Action</button>
                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <!-- dropdown menu links -->
                              <li><a href="<?php echo base_url(); ?>teaching/add_teacher_pay/<?php echo $row['emp_type'] ?>/<?php echo $row['id'] ?>"><i class="icon-plus"></i> Add Pay</a></li>
                              <li><a href="<?php echo base_url(); ?>teaching/edit_employee/<?php echo $row['emp_type'] ?>/<?php echo $row['id'] ?>"><i class="icon-pencil"></i> Edit Information</a></li>
                              <li><a href="<?php echo base_url(); ?>teaching/delete_employee/<?php echo $row['id'] ?>"><i class="icon-trash"></i> Delete Employee</a></li>
                            </ul>
                          </div>
                        </td>
                      <!-- ends -->
                    </tr>
                    <?php } ?>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Accordian ends -->
      </div>
      <script>
        $(document).ready(function() {
          $('.table td a').tooltip();
        })
      </script>
<?php $this->load->view('footer'); ?>