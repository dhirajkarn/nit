<?php $this->load->view('header'); ?>
      <div class="span10">
        <div class="row-fluid">
          <div class="hero-unit" style="padding:20px;">
            <h3>Teachers List</h3>
          </div>
        </div>
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
                <td><a href="#" data-toggle="tooltip" title="Click Here to get Pay Summary"><?php echo $row['name']; ?></a></td>
                <td><?php echo $row['designation']; ?></td>
                <td><?php echo $row['department']; ?></td>
                <td><?php echo $row['account_no']; ?></td>
                <td><a href="<?php echo base_url(); ?>teaching/add_teacher_pay/<?php echo $row['id'] ?>">Add Pay Details</a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
      </div>
      <script>
        $(document).ready(function() {
          $('.table td a').tooltip();
        })
      </script>
<?php $this->load->view('footer'); ?>