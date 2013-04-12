<?php

class Teaching extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('teacher');
	}

    function test() {
        $cur_m = $this->teacher->get_current_month();
        echo $cur_m['dt'];
    }

	function index() {
		$data['teachers'] = $this->teacher->get_all_teachers();
        $data['non_teachers'] = $this->teacher->get_all_non_teachers();

        $total_teachers = 77;
        $total_non_teachers = 97;
        $teachers_entered = count($data['teachers']);
        $non_teachers_entered = count($data['non_teachers']);
        $data['total_teachers_entered'] = $teachers_entered;
        $data['total_non_teachers_entered'] = $non_teachers_entered;
        $data['teacher_per'] = $this->teacher->get_percent_of_emp_entered($total_teachers, $teachers_entered);
        $data['non_teacher_per'] = $this->teacher->get_percent_of_emp_entered($total_non_teachers, $non_teachers_entered);

        // Get Current month percent
        
        $cur_month = $this->teacher->get_current_month();
        $data['current_month'] = $cur_month['dt'];
        $data['cur_teacher'] = $this->teacher->get_employee_id_by_month($cur_month['dt'], "teaching");
        $data['cur_non_teacher'] = $this->teacher->get_employee_id_by_month($cur_month['dt'], "non-teaching");
        $cur_teacher_entered = count($data['cur_teacher']);
        $cur_non_teacher_entered = count($data['cur_non_teacher']);        
        $data['cur_teacher_per'] = $this->teacher->get_percent_of_emp_entered_by_type("teaching", 77, $cur_teacher_entered);
        $data['cur_non_teacher_per'] = $this->teacher->get_percent_of_emp_entered_by_type("non-teaching", 97, $cur_non_teacher_entered);
        // Load the view
		$this->load->view('teachers_list', $data);		
	}

	function add_teacher() {
		$data['message'] = "";
		if($_POST) {
			// Perform validation
			$config = array(
                    array(
                        'field' => 'emp_cat',
                        'label' => 'Employee Category',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'trim|required|min_length[3]|is_unique[emp_info.name]'
                    ),
                    array(
                        'field' => 'designation',
                        'label' => 'Designation',
                        'rules' => 'trim|required|min_length[3]'
                    ),
                    array(
                        'field' => 'department',
                        'label' => 'Department',
                        'rules' => 'trim|required|min_length[3]'
                    ),
                    array(
                        'field' => 'staff_id',
                        'label' => 'Staff ID',
                        'rules' => 'trim|required|is_unique[emp_info.staff_id]'
                    ),
                    array(
                        'field' => 'account_no',
                        'label' => 'Account Number',
                        'rules' => 'trim|required|is_unique[emp_info.account_no]'
                    ),
                    array(
                        'field' => 'gpf_account_no',
                        'label' => 'GPF Account Number',
                        'rules' => 'trim|is_unique[emp_info.gpf_account_no]'
                    )
                );
			$this->load->library('form_validation');
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE) {
                $data['message'] = validation_errors();
            } else {
            	$data = array(
                'emp_type' => $_POST['emp_type'],
                'emp_cat' => $_POST['emp_cat'],
				'name' => $_POST['name'],
				'designation' => $_POST['designation'],
				'department' => $_POST['department'],
                'staff_id' => $_POST['staff_id'],
				'account_no' => $_POST['account_no'],
                'gpf_account_no' => $_POST['gpf_account_no']
				);
				$teacher_id = $this->teacher->save_teacher($data);
				$this->session->set_flashdata('message', "<p>Employee's information has been successfully saved!</p>");
                redirect(base_url());
            }
		} 
		$this->load->view('new_teacher', $data);
	}

    function employee_details($emp_type, $emp_id) {
        $emp_type = $this->uri->segment(3);
        $emp_id = $this->uri->segment(4);
        $data['employee'] = $this->teacher->get_teacher_by_id($emp_id);
        $data['emp_months_info'] = $this->teacher->get_all_months_entered($emp_type, $emp_id);
        $this->load->view('employee_details', $data);
    }

    function edit_employee($emp_type, $emp_id) {
        $emp_type = $this->uri->segment(3);
        $emp_id = $this->uri->segment(4);
        $data['message'] = "";
        if($_POST) {
            $data_emp = array(
                'emp_type' => $_POST['emp_type'],
                'name' => $_POST['name'],
                'designation' => $_POST['designation'],
                'department' => $_POST['department'],
                'staff_id' => $_POST['staff_id'],
                'account_no' => $_POST['account_no'],
                'gpf_account_no' => $_POST['gpf_account_no']
                );
            $data_pay = array(
                'emp_type' => $_POST['emp_type']
                );
            $this->teacher->update_employee($emp_id, $data_emp);
            $this->teacher->update_employee_type($emp_id, $data_pay);
            $this->session->set_flashdata('message', "<p>Employee's information has been successfully updated!</p>");
            redirect(base_url());
        }
        $data['cur_emp'] = $this->teacher->get_teacher_by_id($emp_id);
        $this->load->view('edit_employee', $data);
    }

    function delete_employee($emp_id) {
        $emp_id = $this->uri->segment(3);
        $this->teacher->delete_employee($emp_id);
        $this->teacher->delete_employee_pay($emp_id);
        $this->session->set_flashdata('message', '<p>Employee has been successfully deleted!</p>');
        redirect(base_url());
    }

    function add_teacher_pay($emp_type, $emp_id) {
        $emp_type = $this->uri->segment(3);
        $emp_id = $this->uri->segment(4);
        $data['cur_emp_cat'] = $this->teacher->get_emp_cat_by_id($emp_id);
        $data_latest['message'] = "";
        $data['message'] = "";
        if($_POST) {
            $valid = TRUE;
            $date = new DateTime($_POST['date']);
            $month_added = date_format($date, 'F Y');
            $data['check_emp_pay'] = $this->teacher->check_employee_pay_by_id($emp_id);
            $data['employee'] = $this->teacher->get_employee_by_emp_id($emp_id);
            if($data['check_emp_pay'] != NULL) {
                foreach ($data['employee'] as $row) {
                    if($row['month_added'] == $month_added) {
                        $valid = FALSE;
                    }
                }
            }
            if($valid == TRUE) {
                $data = array(
                'emp_id' => $emp_id,
                'emp_type' => $emp_type,
                'emp_cat' => $data['cur_emp_cat']['emp_cat'],
                'date' => $_POST['date'],
                'month_added' => $month_added,
                'ppb' => $_POST['ppb'],
                'agp' => $_POST['agp'],
                'bp' => $_POST['bp'],
                'da' => $_POST['da'],
                'hra' => $_POST['hra'],
                'ta' => $_POST['ta'],
                'washing_allowance' => $_POST['washing_allowance'],
                'other_allowance' => $_POST['other_allowance'],
                'spl_allowance' => $_POST['spl_allowance'],
                'hostel_supdt' => $_POST['hostel_supdt'],
                'family_planning' => $_POST['family_planning'],
                'tel_allowance' => $_POST['tel_allowance'],
                'total_amount' => $_POST['total_amount'],
                'pf' => $_POST['pf'],
                'nps_contribution' => $_POST['nps_contribution'],
                'it' => $_POST['it'],
                'hrd' => $_POST['hrd'],
                'ec' => $_POST['ec'],
                'gsli_deduction' => $_POST['gsli_deduction'],
                'festival_adv_recovery' => $_POST['festival_adv_recovery'],
                'gpf_loan_recovery' => $_POST['gpf_loan_recovery'],
                'bike_com_recovery' => $_POST['bike_com_recovery'],
                'loan_recovery' => $_POST['loan_recovery'],
                'lic_2_deduction' => $_POST['lic_2_deduction'],
                'flood_donation' => $_POST['flood_donation'],
                'pro_tax_deduction' => $_POST['pro_tax_deduction'],
                'other_deduction' => $_POST['other_deduction'],
                'total_deduction' => $_POST['total_deduction'],
                'net_amount' => $_POST['net_amount']
                );
                $teacher_id = $this->teacher->save_teacher_pay($data);
                if($teacher_id) {
                    $data['cur_teacher'] = $this->teacher->get_teacher_by_id($emp_id);
                    $this->session->set_flashdata('message', "<p><span class=\"label label-success\">Success</span>&emsp; <em>{$data['cur_teacher']['name']}'s</em> pay details for the month <strong>{$month_added}</strong> have been successfully saved!</p>");
                    redirect(base_url());
                }
            } else {
                $data['message'] = "<p><span class=\"label label-warning\">Warning</span>&emsp; Duplicate Entry for the month <strong>{$month_added}</strong> !</p>";
                $data_latest['message'] = "<p><span class=\"label label-warning\">Warning</span>&emsp; Duplicate Entry for the month <strong>{$month_added}</strong> !</p>";
            }
            
        }
        $data_latest['cur_emp_pay'] = $this->teacher->get_employee_latest_pay($emp_id);
        if($data_latest['cur_emp_pay'] != NULL) {
            $data_latest['cur_teacher'] = $this->teacher->get_teacher_by_id($emp_id);
            $this->load->view('add_teacher_pay', $data_latest);
        } else {
            $data['cur_teacher'] = $this->teacher->get_teacher_by_id($emp_id);
            $data['cur_emp_pay'] = NULL;
            $this->load->view('add_teacher_pay', $data);
        }

        
    }

    function edit_employee_pay($emp_id, $month_added) {
        $emp_id = $this->uri->segment(3);
        $month_added = urldecode($this->uri->segment(4));
        $data['cur_emp_cat'] = $this->teacher->get_emp_cat_by_id($emp_id);
        $data['cur_teacher'] = $this->teacher->get_teacher_by_id($emp_id);
        $data['cur_emp_pay'] = $this->teacher->get_employee_pay_by_month($emp_id, $month_added);
        $data['message'] = "";
        if($_POST) {
            $valid = TRUE;
            $date = new DateTime($_POST['date']);
            $month_entered = date_format($date, 'F Y');
            if($month_entered != $month_added) {
                $valid = FALSE;
            }
            if($valid == TRUE) {
                $data = array(
                    'emp_cat' => $data['cur_emp_cat']['emp_cat'],
                    'date' => $_POST['date'],
                    'ppb' => $_POST['ppb'],
                    'agp' => $_POST['agp'],
                    'bp' => $_POST['bp'],
                    'da' => $_POST['da'],
                    'hra' => $_POST['hra'],
                    'ta' => $_POST['ta'],
                    'washing_allowance' => $_POST['washing_allowance'],
                    'other_allowance' => $_POST['other_allowance'],
                    'spl_allowance' => $_POST['spl_allowance'],
                    'hostel_supdt' => $_POST['hostel_supdt'],
                    'family_planning' => $_POST['family_planning'],
                    'tel_allowance' => $_POST['tel_allowance'],
                    'total_amount' => $_POST['total_amount'],
                    'pf' => $_POST['pf'],
                    'nps_contribution' => $_POST['nps_contribution'],
                    'it' => $_POST['it'],
                    'hrd' => $_POST['hrd'],
                    'ec' => $_POST['ec'],
                    'gsli_deduction' => $_POST['gsli_deduction'],
                    'festival_adv_recovery' => $_POST['festival_adv_recovery'],
                    'gpf_loan_recovery' => $_POST['gpf_loan_recovery'],
                    'bike_com_recovery' => $_POST['bike_com_recovery'],
                    'loan_recovery' => $_POST['loan_recovery'],
                    'lic_2_deduction' => $_POST['lic_2_deduction'],
                    'flood_donation' => $_POST['flood_donation'],
                    'pro_tax_deduction' => $_POST['pro_tax_deduction'],
                    'other_deduction' => $_POST['other_deduction'],
                    'total_deduction' => $_POST['total_deduction'],
                    'net_amount' => $_POST['net_amount']
                    );
                $this->teacher->update_employee_pay($emp_id, $month_added, $data);
                $data['cur_teacher'] = $this->teacher->get_teacher_by_id($emp_id);
                $this->session->set_flashdata('message', "<p><span class=\"label label-success\">Success</span>&emsp;<strong>{$data['cur_teacher']['name']}</strong>'s pay details for the month <strong>{$month_added}</strong> have been successfully updated!</p>");
                redirect(base_url()."teaching/pay_summary/{$emp_id}/{$month_added}");
            } else {
                $data['message'] = "<p><span class=\"label label-warning\">Warning</span>&emsp; Entry should be within <strong>{$month_added}</strong> only!</p>";
            }
        }

        $this->load->view('edit_employee_pay', $data);
    }

    function delete_emp_pay_by_month($emp_id, $month_added) {
        $emp_id = $this->uri->segment(3);
        $month_added = urldecode($this->uri->segment(4));
        $this->teacher->delete_emp_pay_by_month($emp_id, $month_added);
        $this->session->set_flashdata('message', "<p>Employee's data for the month <strong>{$month_added}</strong> is successfully deleted!</p>");
        redirect(base_url());
    }

    function pay_details() {
        $data['message'] = "";
        if($_POST) {
            $valid = TRUE;
            $sel_month = $_POST['sel_month'];
            $emp_type = $_POST['emp_type'];
            if(($emp_type == "") || ($sel_month == "")) {
                $data['message'] = "<p>Please Select both fields!</p>";
                $valid = FALSE;
            }
            if($valid == TRUE) {
                //Get percent
                $data['emp'] = $this->teacher->get_employee_id_by_month($sel_month, $emp_type);
                if($data['emp'] == NULL) {
                    $data['message'] = "<h4>No records found for {$sel_month}</h4>";
                }
                $emp_entered = count($data['emp']);
                if($emp_type == "teaching") {
                    $total_emp = 77;
                } else {
                    $total_emp = 97;
                }
                $data['emp_percent'] = $this->teacher->get_percent_of_emp_entered($total_emp, $emp_entered);
                $i = 0;
                foreach($data['emp'] as $emps) {
                    $data['cur_emp'][$i] = $this->teacher->get_teacher_by_id($emps['emp_id']);
                    $data['cur_emp'][$i]['date_added'] = $emps['date'];
                    $i++;
                    //print_r($data['date_added']);
                }
                $data['month_list'] = $this->teacher->get_all_months();
                $data['sel_month'] = $sel_month;
                $this->load->view('pay_details', $data);
            } else {
                $data['emp'] = NULL;
                $data['month_list'] = $this->teacher->get_all_months();
                $data['sel_month'] = $sel_month;
                $this->load->view('pay_details', $data);
            }
        } else {
            $data['emp'] = NULL;
            $data['month_list'] = $this->teacher->get_all_months();
            $this->load->view('pay_details', $data);
        }
        
    }

    function salary_bill() {
            $data['message'] = "";
            $data['month_list'] = $this->teacher->get_all_months();
            $this->load->view('salary_bill', $data);
    }

    function get_salary_bill() {
        $valid = TRUE;
        $data['sel_month'] = $_POST['sel_month'];
        $data['emp_type'] = $_POST['emp_type'];
        $data['emp_cat'] = $_POST['emp_cat'];
        if(($data['emp_type'] == "") || ($data['sel_month'] == "") || ($data['emp_cat'] == "")) {
            $this->session->set_flashdata('message', "<p>Please select all the fields!</p>") ;
            $valid = FALSE;
            redirect(base_url().'teaching/salary_bill');
        }
        if($valid == TRUE) {
            // Pay
            $data['ppb_total'] = 0;
            $data['agp_total'] = 0;
            $data['bp_total'] = 0;
            $data['da_total'] = 0;
            $data['hra_total'] = 0;
            $data['ta_total'] = 0;
            $data['spl_allowance_total'] = 0;
            $data['tel_allowance_total'] = 0;
            $data['total_amount_total'] = 0;

            // Deductions
            $data['pf_total'] = 0;
            $data['it_total'] = 0;
            $data['hrd_total'] = 0;
            $data['ec_total'] = 0;
            $data['gsli_deduction_total'] = 0;
            $data['total_deduction_total'] = 0;

            // Total amount
            $data['net_amount_total'] = 0;
            $data['emp'] = $this->teacher->get_employee_summary($data['emp_type'], $data['emp_cat'], $data['sel_month']);
            if($data['emp'] == NULL) {
                $this->session->set_flashdata('message', "<p>No records to show!</p>") ;
                $valid = FALSE;
                redirect(base_url().'teaching/salary_bill');
            }
            $this->load->view('salary_bill_by_month', $data);
        }
    }

    function pay_summary() {
        $emp_id = $this->uri->segment(3);
        $sel_month = urldecode($this->uri->segment(4));
        $data['teacher'] = $this->teacher->get_teacher_by_id($emp_id);
        $data['teacher_pay'] = $this->teacher->get_teacher_pay_by_month($emp_id, $sel_month);
        $this->load->view('pay_summary', $data);
    }
}