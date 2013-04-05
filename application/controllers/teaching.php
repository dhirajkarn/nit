<?php

class Teaching extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('teacher');
	}

	function index() {
		$data['teachers'] = $this->teacher->get_all_teachers();
        $data['non_teachers'] = $this->teacher->get_all_non_teachers();
		$this->load->view('teachers_list', $data);		
	}

	function add_teacher() {
		$data['message'] = "";
		if($_POST) {
			// Perform validation
			$config = array(
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
                        'label' => 'Department',
                        'rules' => 'trim|required|is_unique[emp_info.staff_id]'
                    ),
                    array(
                        'field' => 'account_no',
                        'label' => 'Account Number',
                        'rules' => 'trim|required|is_unique[emp_info.account_no]'
                    )
                );
			$this->load->library('form_validation');
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE) {
                $data['message'] = validation_errors();
            } else {
            	$data = array(
                'emp_type' => $_POST['emp_type'],
				'name' => $_POST['name'],
				'designation' => $_POST['designation'],
				'department' => $_POST['department'],
                'staff_id' => $_POST['staff_id'],
				'account_no' => $_POST['account_no']
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
                'account_no' => $_POST['account_no']
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
        $data['cur_teacher'] = $this->teacher->get_teacher_by_id($emp_id);
        $data['message'] = "";
        if($_POST) {
            $date = new DateTime($_POST['date']);
            $month_added = date_format($date, 'F Y');
            $data = array(
                'emp_id' => $emp_id,
                'emp_type' => $emp_type,
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
                $data['message'] = "<p>Employee pay details have been successfully saved!</p>";
            }
        }
        $this->load->view('add_teacher_pay', $data);
    }

    function pay_details() {
        $data['month_list'] = $this->teacher->get_all_months();
        $this->load->view('pay_details', $data);
    }

    function pay_summary() {
        $emp_id = $this->uri->segment(3);
        $sel_month = urldecode($this->uri->segment(4));
        $data['teacher'] = $this->teacher->get_teacher_by_id($emp_id);
        $data['teacher_pay'] = $this->teacher->get_teacher_pay_by_month($emp_id, $sel_month);
        $this->load->view('pay_summary', $data);
    }
}