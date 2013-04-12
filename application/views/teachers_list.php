<?php $this->load->view('header'); ?>
      <div class="span10">
        <div class="row-fluid">

          <div class="span9" style="border-right:1px solid #ccc;">
              <h2 class="text-info">NIT PATNA</h2><br>
              <p class="lead text-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, consequatur aliquid nulla optio  quo culpa.</p>
          </div>
          <div class="span3 pull-right">
            <h5 class="text-info"><?php echo $current_month ?> Launch</h5>
            <span class="muted">Teachers<small> ( <?php echo count($cur_teacher) ?> / 77 )</small></span>
            <div class="progress progress-success">
              <div class="bar" style="width : <?php echo $cur_teacher_per ?>;"></div>
            </div>
            <span class="muted">Non-teachers<small> ( <?php echo count($cur_non_teacher) ?> / 97 )</small></span>
            <div class="progress">
              <div class="bar" style="width : <?php echo $cur_non_teacher_per ?>;"></div>
            </div>
          </div>
        </div><br>
        <div class="row-fluid">
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
                <strong>Teachers List</strong><small> ( <?php echo $total_teachers_entered ?> / 77 )</small>&emsp;<small><em class="toggle_text">(click to expand)</em></small>
                <div class="progress progress-success">
                  <div class="bar" style="width : <?php echo $teacher_per ?>;"></div>
                </div>
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
                      <td>
                          <a href="<?php echo base_url(); ?>teaching/employee_details/<?php echo $row['emp_type'] ?>/<?php echo $row['id'] ?>" data-toggle="tooltip" title="Click here for details">
                            <?php echo $row['name']; ?>
                          </a>
                          <?php
                            if($row['emp_cat'] == 'gpf') {
                          ?>
                          <sup><span class="label label-important">gpf</span></sup>
                          <?php } ?>
                        
                    </td>
                      <td><?php echo $row['designation']; ?></td>
                      <td><?php echo $row['department']; ?></td>
                      <td><?php echo $row['account_no']; ?></td>
                      <!-- action btn starts -->
                        <td>
                          <div class="btn-group">
                            <a href="#" class="btn btn-info btn-small dropdown-toggle" data-toggle="dropdown">Options</a>
                            <a href="#" class="btn btn-info btn-small dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                            </a>
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
                <strong>Non-teachers List</strong><small> ( <?php echo $total_non_teachers_entered ?> / 97 )</small>&emsp;<small><em class="toggle_text">(click to collapse)</em></small>
                <div class="progress">
                  <div class="bar" style="width : <?php echo $non_teacher_per ?>;"></div>
                </div>
              </a>
            </div>
            <div id="collapseTwo" class="accordion-body collapse in">
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
                      <td><a href="<?php echo base_url(); ?>teaching/employee_details/<?php echo $row['emp_type'] ?>/<?php echo $row['id'] ?>" data-toggle="tooltip" title="Click here for details">
                          <?php echo $row['name']; ?>
                        </a>
                          <?php
                            if($row['emp_cat'] == 'gpf') {
                          ?>
                          <sup><span class="label label-important">gpf</span></sup>
                          <?php } ?>
                      </td>
                      <td><?php echo $row['designation']; ?></td>
                      <td><?php echo $row['department']; ?></td>
                      <td><?php echo $row['account_no']; ?></td>
                      <!-- action btn starts -->
                        <td>
                          <div class="btn-group">
                            <a href="#" class="btn btn-info btn-small dropdown-toggle" data-toggle="dropdown">Options</a>
                            <a href="#" class="btn btn-info btn-small dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                            </a>
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
          $('.accordion-toggle').click(function() {
            if($(this).find('.toggle_text').text() == '(click to expand)') {
              $(this).find('.toggle_text').text('(click to collapse)');
            } else {
              $(this).find('.toggle_text').text('(click to expand)');
            }
          })
        })
      </script>
<?php $this->load->view('footer'); ?>