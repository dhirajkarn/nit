<?php $this->load->view('header'); ?>

<div class="span10">
	<div class="hero-unit" style="padding:20px;">
	    <h3><small>Pay Summary For </small><?php echo $teacher['name']; ?><small> For the Month </small><?php echo $teacher_pay['date']; ?></h3>
	</div>
    <div class="row-fluid">
        <div class="span6">
        <dl class="dl-horizontal">
            <dt>Designation :</dt>
            <dd><?php echo $teacher['designation']; ?></dd>
            <dt>Department :</dt> 
            <dd><?php echo $teacher['department']; ?></dd>
            <dt>Account Number : </dt>
            <dd><?php echo $teacher['account_no']; ?></dd>   
            <dt>Date Added : </dt>
            <dd><?php echo $teacher_pay['dt']; ?></dd>
        </dl>
        </div>
        <ul class="nav nav-pills pull-right">
          <li class="active">
            <a href="#">Print</a>
          </li>
          <li class="active"><a href="#">Edit</a></li>
          <li class="active"><a href="#">Delete</a></li>
        </ul>
    </div>
    <br>
    
	<div class="row-fluid">
		<table class="table table-condensed table-hover">
    	<tr>
    		<th>Sl. No.</th>
        	<th>ADMISSIBLE SALARY</th>
            <th>Rs.</th>
            <th>P.</th>
        </tr>
        <tr>
        	<td>1.</td>
            <td>Pay in Pay Band</td>
            <td><?php echo $teacher_pay['ppb']; ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>2.</td>
            <td>Academic Grade Pay</td>
            <td><?php echo $teacher_pay['agp']; ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>3.</td>
            <td>Basic Pay (Pay plus AGP)</td>
            <td><?php echo $teacher_pay['bp']; ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>4.</td>
            <td>Dearness Allowance (D.A.)</td>
            <td><?php echo $teacher_pay['da']; ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>5.</td>
            <td>House Rent Allowance (HRA)</td>
            <td><?php echo $teacher_pay['hra']; ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>6.</td>
            <td>Transport Allowance (T.A.)(Rs.1600+DA thereon)</td>
            <td><?php echo $teacher_pay['ta']; ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>7.</td>
            <td>Special Allowance (Family Planning Allowance)</td>
            <td><?php echo $teacher_pay['spl_allowance']; ?></td>
            <td>00</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <th>Total Admissible Salary</th>
            <td><b><?php echo $teacher_pay['total_amount']; ?></b></td>
            <td><b>00</b></td>
        </tr>
        <tr style="background-color: #f5f5f5;">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <th>Sl. No.</th>
        	<th>Deductions</th>
            <th>Rs.</th>
            <th>P.</th>
        </tr>
        <tr>
        	<td>1.</td>
            <td>P.F. Deduction/NPS Contribution, 10%</td>
            <td><?php echo $teacher_pay['pf']; ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>2.</td>
            <td>Income Tax</td>
            <td><?php echo $teacher_pay['it']; ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>3.</td>
            <td>House Rent (standard rent)</td>
            <td><?php echo $teacher_pay['hrd']; ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>4.</td>
            <td>Electricity Charge (2% of basic pay)</td>
            <td><?php echo $teacher_pay['ec']; ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>5.</td>
            <td>GPF Loan Recovery</td>
            <td><?php echo intval($teacher_pay['pf']) + intval($teacher_pay['rec_pf']); ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>6.</td>
            <td>GSLI Deduction</td>
            <td><?php echo intval($teacher_pay['gsli_one']) + intval($teacher_pay['gsli_two']); ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>7.</td>
            <td>Other Deduction</td>
            <td><?php echo $teacher_pay['p_tax']; ?></td>
            <td>00</td>
        </tr>
		<tr>
            <td>&nbsp;</td>
            <th>Total Deduction</th>
            <td><b><?php echo $teacher_pay['total_deduction']; ?></b></td>
            <td><b>00</b></td>
        </tr>
        <tr style="background-color: #f5f5f5;">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <th>NET PAYABLE AMOUNT</th>
            <td><b><?php echo $teacher_pay['net_amount']; ?></b></td>
            <td><b>00</b></td>
        </tr>
    </table>
	</div>
</div>

<?php $this->load->view('footer'); ?>