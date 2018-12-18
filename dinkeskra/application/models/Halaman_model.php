<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Halaman_model extends CI_Model {

		public function __construct() {
			parent::__construct();
		}
		
		function get_all_data() {
			return $this->db->select('*')->from('nakes')->count_all_results();
		}		

		function get_data_by_aktif($status) {
			return $this->db->select('status_sip')->from('sip')->where('status_sip', $status)->count_all_results();
		}

		// function get_data_masaberlaku(){
		// 	$this->db->select("count('masa_berlaku') as jmlh_kadaluarsa");
		// 	return $this->db->get($this->table)->row();
		// }

		public function masa_berlaku() {
			$this->db->select();
			$this->db->from('sip');
			$this->db->join('nakes', 'nakes.id_nakes = sip.id_nakes');
			$this->db->where('masa_berlaku < DATE(NOW())');
			$query = $this->db->get();
			return $query->num_rows();
		}

		public function count_dokter($id_jenis_nakes) {
			$this->db->select('COUNT(*) AS total');
			$this->db->from('nakes');
			$this->db->group_by('id_jenis_nakes');
			$this->db->where('id_jenis_nakes', $id_jenis_nakes);
			$query = $this->db->get();
			return $query->row()->total;
		}
	}