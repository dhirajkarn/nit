<?php

class Teacher extends CI_Model {

	// Teacher's general Information

	function get_all_teachers() {
		$this->db->select()->from('emp_info');
        $query = $this->db->get();
        return $query->result_array();
	}

	function get_teacher_by_id($emp_id) {
		$this->db->select()->from('emp_info')->where('id', $emp_id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function save_teacher($data) {
		$this->db->insert('emp_info', $data);
		return $this->db->insert_id();
	}

	function update_teacher($emp_id, $data) {
		$this->db->where('id', $emp_id);
		$this->db->update('emp_info', $data);
	}

	function delete_teacher($emp_id) {
		$this->db->where('id', $emp_id);
		$this->db->delete('emp_info');
	}

	// Teacher's Pay Details

	function get_teacher_pay($emp_id) {
		$this->db->select()->from('emp_pay')->where('emp_id', $emp_id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function get_teacher_pay_by_month($emp_id, $sel_month) {
		$sql = "SELECT ppb, agp, bp, da, hra, ta, spl_allowance, total_amount, pf, gsli_one, it, hrd, rec_pf, ec, gsli_two, p_tax, total_deduction, net_amount, DATE_FORMAT(date, '%M, %Y') as date, DATE_FORMAT(date, '%d/%c/%Y') as dt FROM emp_pay WHERE emp_id={$emp_id} AND DATE_FORMAT(date, '%M %Y') = '{$sel_month}'";
		$query = $this->db->query($sql);
		return $query->first_row('array');
	}

	function save_teacher_pay($data) {
		$this->db->insert('emp_pay', $data);
		return $this->db->insert_id();
	}

	function update_teacher_pay($emp_id, $data) {
		$this->db->where('id', $emp_id);
		$this->db->update('emp_pay', $data);
	}

	function delete_teacher_pay($emp_id) {
		$this->db->where('id', $emp_id);
		$this->db->delete('emp_pay');
	}

	function get_all_months() {
		$sql = "SELECT DISTINCT DATE_FORMAT(date, '%M %Y') as date FROM emp_pay GROUP BY date ORDER BY date ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_employee_id_by_month($sel_month) {
		$sql = "SELECT emp_id, DATE_FORMAT(date, '%d/%c/%Y') as date FROM emp_pay WHERE DATE_FORMAT(date, '%M %Y') = '{$sel_month}'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

}