<?php
class Ajax extends CI_Controller {
	function __construct() {
		parent::__construct();
	}

	function get_employees_by_month() {
		
		$sel_month = $_GET['sel_month'];
		$emp_type = $_GET['emp_type'];
		//$message = "{$emp_type} for {$sel_month}";
		if($emp_type == "") {
			$message = "";
			$message .= "<h4>Please Select Employee Type!";
		} else {
			$this->load->model('teacher');
			$emp_id = $this->teacher->get_employee_id_by_month($sel_month, $emp_type);
			if($emp_id == NULL) {
				$message = "";
				$message .= "<h4>No records found!</h4>";
			} else {
				$sl_no = 0;
				$message = "";
			    $message .= "<h3 class=\"text-center\"><small>Employee list for</small> ".$sel_month."</h3>";
			    $message .= "<table class=\"table table-hover\">";
			    $message .= "<thead><tr>";
			    $message .= "<th>Sl No.</th><th>Name</th><th>Designation</th><th>Department</th><th>Account Number</th><th>Date</th>";
			    $message .= "</tr></thead>";
			    $message .= "<tbody>";
				foreach($emp_id as $rows) {
					$row = $this->teacher->get_teacher_by_id($rows['emp_id']);
					$sl_no++;
					$message .= "<tr>";
		            $message .= "<td>".$sl_no."</td>";
		            $message .= "<td><a href=\"http://localhost:8080/nit/teaching/pay_summary/{$rows['emp_id']}/{$sel_month}\" data-toggle=\"tooltip\" title=\"Click Here to get Pay Summary\">".$row['name']."</a></td>";
		            $message .= "<td>".$row['designation']."</td>";
		            $message .= "<td>".$row['department']."</td>";
		            $message .= "<td>".$row['account_no']."</td>";
					$message .= "<td>".$rows['date']."</td>";
		        	$message .= "</tr>";
				}
				$message .= "</tbody>";
		        $message .= "</table>";
			}
			
		}
        echo $message;
	}
}