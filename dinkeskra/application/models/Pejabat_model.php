<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pejabat_model extends CI_Model
{

    public $table = 'pejabat';
    public $id = 'id_pejabat';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pejabat', $q);
	$this->db->or_like('nama_pejabat', $q);
	$this->db->or_like('pangkat', $q);
	$this->db->or_like('jabatan', $q);
	$this->db->or_like('nip', $q);
    $this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pejabat', $q);
	$this->db->or_like('nama_pejabat', $q);
	$this->db->or_like('pangkat', $q);
	$this->db->or_like('jabatan', $q);
	$this->db->or_like('nip', $q);
    $this->db->or_like('status', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }


    function get_filtered_data() {
    $this->db->order_by($this->id, $this->order);
    if($this->session->userdata("limit") != ""){
        $this->db->or_like('nama_pejabat', $this->session->userdata("limit"));
        $this->db->or_like('pangkat', $this->session->userdata("limit"));
        $this->db->or_like('jabatan', $this->session->userdata("limit"));
        $this->db->or_like('nip', $this->session->userdata("limit"));
        $this->db->or_like('status', $this->session->userdata("limit"));
    }

     return $this->db->get($this->table)->result();
    }

    function pejabat_aktif() {
        $this->db->where('status', 'aktif');
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function update_status()
    {
         $this->db->update($this->table, ["status"=>"non aktif"]);
    }

}