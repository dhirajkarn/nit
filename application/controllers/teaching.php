<?php

class Teaching extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('teacher');
	}

	function index() {
		$data['teachers'] = $this->teacher->get_all_teachers();
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
				'name' => $_POST['name'],
				'designation' => $_POST['designation'],
				'department' => $_POST['department'],
				'account_no' => $_POST['account_no']
				);
				$teacher_id = $this->teacher->save_teacher($data);
				$data['message'] = "Your information has been successfully saved!";
            }
		} 
		$this->load->view('new_teacher', $data);
	}

    function add_teacher_pay($emp_id) {
        $emp_id = $this->uri->segment(3);
        $data['cur_teacher'] = $this->teacher->get_teacher_by_id($emp_id);
        $data['message'] = "";
        if($_POST) {
            $data = array(
                'emp_id' => $emp_id,
                'date' => $_POST['date'],
                'ppb' => $_POST['ppb'],
                'agp' => $_POST['agp'],
                'bp' => $_POST['bp'],
                'da' => $_POST['da'],
                'hra' => $_POST['hra'],
                'ta' => $_POST['ta'],
                'spl_allowance' => $_POST['spl_allowance'],
                'total_amount' => $_POST['total_amount'],
                'pf' => $_POST['pf'],
                'gsli_one' => $_POST['gsli_one'],
                'it' => $_POST['it'],
                'hrd' => $_POST['hrd'],
                'rec_pf' => $_POST['rec_pf'],
                'ec' => $_POST['ec'],
                'gsli_two' => $_POST['gsli_two'],
                'p_tax' => $_POST['p_tax'],
                'total_deduction' => $_POST['total_deduction'],
                'net_amount' => $_POST['net_amount']
                );
            $teacher_id = $this->teacher->save_teacher_pay($data);
            if($teacher_id) {
                $data['cur_teacher'] = $this->teacher->get_teacher_by_id($emp_id);
                $data['message'] = "Employee pay detais have been successfully saved!";
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