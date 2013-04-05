<?php $this->load->view('header'); ?>

<div class="span10">
	<div class="hero-unit" style="padding:20px;">
	    <h3><small>Pay Summary For </small><?php echo $teacher['name']; ?><small> For the Month </small><?php echo $teacher_pay['date']; ?></h3>
	</div>
    <div class="row-fluid">
        <div class="span6">
        <dl class="dl-horizontal">
            <dt>Staff ID :</dt>
            <dd><?php echo $teacher['staff_id']; ?></dd>
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
            <li><a href="<?php echo base_url() ?>teaching/pay_details">Back</a></li>
          <li class="active"><a href="#">Print</a></li>
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
            <td>Grade Pay</td>
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
            <td>Washing Allowance</td>
            <td><?php echo $teacher_pay['washing_allowance']; ?></td>
            <td>00</td>
        </tr>
        <tr>
            <td>8.</td>
            <td>Other Allowance</td>
            <td><?php echo $teacher_pay['other_allowance']; ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>9.</td>
            <td>Special Allowance</td>
            <td><?php echo $teacher_pay['spl_allowance']; ?></td>
            <td>00</td>
        </tr>
        <tr>
            <td>10.</td>
            <td>Hostel Chairman/ Supdt./ Asst. Supdt. Allowance</td>
            <td><?php echo $teacher_pay['hostel_supdt']; ?></td>
            <td>00</td>
        </tr>
        <tr>
            <td>11.</td>
            <td>Family Planning</td>
            <td><?php echo $teacher_pay['family_planning']; ?></td>
            <td>00</td>
        </tr>
        <tr>
            <td>12.</td>
            <td>Telephone Allowance</td>
            <td><?php echo $teacher_pay['tel_allowance']; ?></td>
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
        	<th>DEDUCTIONS</th>
            <th>Rs.</th>
            <th>P.</th>
        </tr>
        <tr>
        	<td>1.</td>
            <td>P.F. Deduction</td>
            <td><?php echo $teacher_pay['pf']; ?></td>
            <td>00</td>
        </tr>
        <tr>
            <td>2.</td>
            <td>NPS Contribution</td>
            <td><?php echo $teacher_pay['nps_contribution']; ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>3.</td>
            <td>Income Tax</td>
            <td><?php echo $teacher_pay['it']; ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>4.</td>
            <td>House Rent</td>
            <td><?php echo $teacher_pay['hrd']; ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>5.</td>
            <td>Electricity Charge</td>
            <td><?php echo $teacher_pay['ec']; ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>6.</td>
            <td>GSLI Deduction</td>
            <td><?php echo $teacher_pay['gsli_deduction']; ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>7.</td>
            <td>Festival Advance Recovery</td>
            <td><?php echo $teacher_pay['festival_adv_recovery']; ?></td>
            <td>00</td>
        </tr>
        <tr>
        	<td>8.</td>
            <td>GPF Loan Recovery</td>
            <td><?php echo $teacher_pay['gpf_loan_recovery']; ?></td>
            <td>00</td>
        </tr>
        <tr>
            <td>9.</td>
            <td>Motor Cycle/Computer Recovery</td>
            <td><?php echo $teacher_pay['bike_com_recovery']; ?></td>
            <td>00</td>
        </tr>
        <tr>
            <td>10.</td>
            <td>Loan Recover</td>
            <td><?php echo $teacher_pay['loan_recovery']; ?></td>
            <td>00</td>
        </tr>
        <tr>
            <td>11.</td>
            <td>LIC II Deduction</td>
            <td><?php echo $teacher_pay['lic_2_deduction']; ?></td>
            <td>00</td>
        </tr>
        <tr>
            <td>12.</td>
            <td>Flood Donation</td>
            <td><?php echo $teacher_pay['flood_donation']; ?></td>
            <td>00</td>
        </tr>
        <tr>
            <td>13.</td>
            <td>Professional Tax Deduction</td>
            <td><?php echo $teacher_pay['pro_tax_deduction']; ?></td>
            <td>00</td>
        </tr>
        <tr>
            <td>14.</td>
            <td>Other Deduction</td>
            <td><?php echo $teacher_pay['other_deduction']; ?></td>
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