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
    		<h4 class="text-center"><?php echo ucfirst($emp_type) ?> (<?php echo strtoupper($emp_cat) ?>) Salary Advice For the Month <?php echo $sel_month ?></h4>
    	</div>
    </div>
    <div class="row-fluid">
    	<div>
    		<a class="btn btn-info" href="<?php echo base_url() ?>teaching/salary_advice"><i class="icon-arrow-left icon-white"></i> Back</a>
    		<a class="btn btn-info pull-right" href="">Print</a>
    	</div>
    </div><br>
    <div class="row-fluid">
    	<div class="span6">
			<table class="table table-hover table-bordered">
		        <thead>
		          <th>Sl. No.</th>
		          <th>Name</th>
		          <th>A/c No.</th>
		          <th>Amount</th>
		          <th>Remarks</th>
		        </thead>
		        <tbody>
		          <?php $i = 0; foreach($emp as $row) { 
		          	$i++;
		          	$net_amount_total += $row['net_amount'];
		           ?>
		          <tr>
		            <td><strong><?php echo $i; ?></strong></td>
		            <td><a href="<?php echo base_url() ?>/teaching/pay_summary/<?php echo $row['id'] ?>/<?php echo $sel_month ?>"><?php echo $row['name'] ?></a></td>
		            <td><?php echo $row['account_no'] ?></td>
		            <td><?php echo $row['net_amount'] ?></td>
		            <td>&nbsp;</td>
		          </tr>
		          <?php } ?>
		          <tr class="success">
		          	<th colspan="3" style="text-align:center;">Total</th>
		          	<th colspan="2"><?php echo $net_amount_total ?></th>
		          </tr>
		        </tbody>
		    </table>
	    </div>
    </div>
</div>
</body>
</html>