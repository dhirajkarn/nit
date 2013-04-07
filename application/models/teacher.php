<?php

class Teacher extends CI_Model {

	// Teacher's general Information

	function get_all_teachers() {
		$this->db->select()->from('emp_info')->where('emp_type', 'teaching');
        $query = $this->db->get();
        return $query->result_array();
	}

	function get_all_non_teachers() {
		$this->db->select()->from('emp_info')->where('emp_type', 'non-teaching');
        $query = $this->db->get();
        return $query->result_array();
	}

	function get_all_months_entered($emp_type, $emp_id) {
		$sql = "SELECT *, month_added FROM emp_pay WHERE emp_type='{$emp_type}' AND emp_id = {$emp_id} ORDER BY date DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_teacher_by_id($emp_id) {
		$this->db->select()->from('emp_info')->where('id', $emp_id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function check_employee_pay_by_id($emp_id) {
		$this->db->select()->from('emp_pay')->where('emp_id', $emp_id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function get_employee_by_month($month_added) {
		$this->db->select()->from('emp_pay')->where('month_added', $month_added);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function get_employee_pay_by_month($emp_id, $month_added) {
		$where = array(
			'emp_id' => $emp_id,
			'month_added' => $month_added
			);
		$this->db->select()->from('emp_pay')->where($where);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function get_employee_by_emp_id($emp_id) {
		$this->db->select()->from('emp_pay')->where('emp_id', $emp_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	function save_teacher($data) {
		$this->db->insert('emp_info', $data);
		return $this->db->insert_id();
	}

	function update_employee($emp_id, $data) {
		$this->db->where('id', $emp_id);
		$this->db->update('emp_info', $data);
	}

	function update_employee_type($emp_id, $data) {
		$this->db->where('emp_id', $emp_id);
		$this->db->update('emp_pay', $data);
	}

	function delete_employee($emp_id) {
		$this->db->where('id', $emp_id);
		$this->db->delete('emp_info');
	}

	function delete_employee_pay($emp_id) {
		$this->db->where('emp_id', $emp_id);
		$this->db->delete('emp_pay');
	}

	function delete_emp_pay_by_month($emp_id, $month_added) {
		$where = array(
			'emp_id' => $emp_id,
			'month_added' => $month_added
			);
		$this->db->where($where);
		$this->db->delete('emp_pay');
	}

	// Teacher's Pay Details

	function get_teacher_pay($emp_id) {
		$this->db->select()->from('emp_pay')->where('emp_id', $emp_id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function get_teacher_pay_by_month($emp_id, $sel_month) {
		$sql = "SELECT *, DATE_FORMAT(date, '%M, %Y') as date, DATE_FORMAT(date, '%d/%c/%Y') as dt FROM emp_pay WHERE emp_id={$emp_id} AND DATE_FORMAT(date, '%M %Y') = '{$sel_month}'";
		$query = $this->db->query($sql);
		return $query->first_row('array');
	}

	function save_teacher_pay($data) {
		$this->db->insert('emp_pay', $data);
		return $this->db->insert_id();
	}

	function update_employee_pay($emp_id, $month_added, $data) {
		$where = array(
			'emp_id' => $emp_id,
			'month_added' => $month_added
			);
		$this->db->where($where);
		$this->db->update('emp_pay', $data);
	}

	function delete_teacher_pay($emp_id) {
		$this->db->where('id', $emp_id);
		$this->db->delete('emp_pay');
	}

	function get_all_months() {
		$sql = "SELECT DISTINCT DATE_FORMAT(date, '%M %Y') as dt FROM emp_pay ORDER BY date DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_employee_id_by_month($sel_month, $emp_type) {
		$sql = "SELECT emp_id, DATE_FORMAT(date, '%d/%c/%Y') as date FROM emp_pay WHERE DATE_FORMAT(date, '%M %Y') = '{$sel_month}' AND emp_type = '{$emp_type}'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

}