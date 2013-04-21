<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>NIT PATNA | LOCAL</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/nit-patna-logo.jpg" />
<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ui-lightness/jquery-ui-1.10.0.custom.css">
    <style>
      th {
      	width: 150;
      }
    </style>
</head>

<body>
<div class="container-fluid">
    <div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <a class="brand" href="#">NIT PATNA</a>
        <ul class="nav">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li><a href="#">Articles</a></li>
          <li><a href="#">Downloads</a></li>
          <li><a href="#">Blogs</a></li>
          <li><a href="<?php echo base_url(); ?>teaching/pay_details">Pay Details</a></li>
          <ul class="nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Employee
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>teaching/add_teacher">New Employee</a></li>
                <li><a href="#">Download</a></li>
                <li><a href="#">Tutorials</a></li>
                <li><a href="#">Blogs</a></li>
                <li><a href="#">About Us</a></li>
              </ul>
            </li>
          </ul>
        </ul>
        <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>
      </div>
    </div>
    <div class="row-fluid">
    	<div class="well">
    		<h4 class="text-center">Salary Statement For <?php echo $emp['name'] ?> For the Period From <?php echo date_format(date_create($start_date), "F Y") ?> to <?php echo date_format(date_create($end_date), "F Y") ?> </h4>
    	</div>
    </div>
    <div class="row-fluid">
    	<div>
    		<a class="btn btn-info" href="<?php echo base_url() ?>teaching/employee_details/<?php echo $emp['emp_type'] ?>/<?php echo $emp['id'] ?>"><i class="icon-arrow-left icon-white"></i> Back</a>
    		<a class="btn btn-info pull-right" href="">Print</a>
    	</div>
    </div><br>
    <div class="row-fluid">
      <table class="table table-hover table-bordered">
          <thead>
            <th>Month</th>
            <th>Pay in Pay Band</th>
            <th>AGP</th>
            <th>BP</th>
            <th>DA</th>
            <th>HRA</th>
            <th>TA</th>
            <th>Special Allowance</th>
            <th>Telephone Allowance</th>
            <th>Total</th>
      <!-- Deduction -->
            <th>PF</th>
            <th>GSLI Deduction</th>
            <th>IT</th>
            <th>HRD</th>
            <th>EC</th>
            <th>Total Deduction</th>
            <th>Net Amount</th>
          </thead>
          <tbody>
            <?php foreach($salary_range as $row) { 
              $ppb_total += $row['ppb'];
              $agp_total += $row['agp'];
              $bp_total += $row['bp'];
              $da_total += $row['da'];
              $hra_total += $row['hra'];
              $ta_total += $row['ta'];
              $spl_allowance_total += $row['spl_allowance'];
              $tel_allowance_total += $row['tel_allowance'];
              $total_amount_total += $row['total_amount'];

              // Deductions
              $pf_total += $row['pf'];
              $gsli_deduction_total += $row['gsli_deduction'];
              $it_total += $row['it'];
              $hrd_total += $row['hrd'];
              $ec_total += $row['ec'];
              $total_deduction_total += $row['total_deduction'];
              $net_amount_total += $row['net_amount'];
             ?>
            <tr>
              <td width="100"><em><?php echo $row['month_added']; ?></em></td>
              <td><?php echo $row['ppb'] ?></td>
              <td><?php echo $row['agp'] ?></td>
              <td><?php echo $row['bp'] ?></td>
              <td><?php echo $row['da'] ?></td>
              <td><?php echo $row['hra'] ?></td>
              <td><?php echo $row['ta'] ?></td>
              <td><?php echo $row['spl_allowance'] ?></td>
              <td><?php echo $row['tel_allowance'] ?></td>
              <td><?php echo $row['total_amount'] ?></td>
              <!-- Deductions -->
              <td><?php echo $row['pf'] ?></td>
              <td><?php echo $row['gsli_deduction'] ?></td>
              <td><?php echo $row['it'] ?></td>
              <td><?php echo $row['hrd'] ?></td>
              <td><?php echo $row['ec'] ?></td>
              <td><?php echo $row['total_deduction'] ?></td>
              <td><?php echo $row['net_amount'] ?></td>
            </tr>
            <?php } ?>
            <tr class="success">
              <th>Total</th>
              <th><?php echo $ppb_total ?></th>
              <th><?php echo $agp_total ?></th>
              <th><?php echo $bp_total ?></th>
              <th><?php echo $da_total ?></th>
              <th><?php echo $hra_total ?></th>
              <th><?php echo $ta_total ?></th>
              <th><?php echo $spl_allowance_total ?></th>
              <th><?php echo $tel_allowance_total ?></th>
              <th><?php echo $total_amount_total ?></th>
              <!-- Deductions -->
              <th><?php echo $pf_total ?></th>
              <th><?php echo $gsli_deduction_total ?></th>
              <th><?php echo $it_total ?></th>
              <th><?php echo $hrd_total ?></th>
              <th><?php echo $ec_total ?></th>
              <th><?php echo $total_deduction_total ?></th>
              <th><?php echo $net_amount_total ?></th>
            </tr>
          </tbody>
      </table>
    </div>
  </div>
</body>
</html>