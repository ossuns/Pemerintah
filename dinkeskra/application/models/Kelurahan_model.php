<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelurahan_model extends CI_Model
{

    public $table = 'kelurahan';
    public $id = 'id_kelurahan';
    public $order = 'ASC';

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
        $this->db->where('kelurahan.id_kelurahan', $id);
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan=kelurahan.id_kecamatan');
        $this->db->select('kelurahan.id_kelurahan');
        $this->db->select('kelurahan.id_kecamatan');
        $this->db->select('kecamatan');
        $this->db->select('kelurahan');
        $this->db->select('kodepos');
        return $this->db->get($this->table)->row();
    }

    function getbyid($id)
    {
        $this->db->where('kelurahan.id_kelurahan', $id);
        $this->db->select('kelurahan.id_kelurahan');
        $this->db->select('kelurahan');
        return $this->db->get($this->table)->result();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_kelurahan', $q);
	$this->db->or_like('id_kecamatan', $q);
	$this->db->or_like('kelurahan', $q);
	$this->db->or_like('kodepos', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_kelurahan', $q);
	$this->db->or_like('kelurahan.id_kecamatan', $q);
	$this->db->or_like('kelurahan', $q);
	$this->db->or_like('kodepos', $q);
	$this->db->limit($limit, $start);
    $this->db->join('kecamatan', 'kecamatan.id_kecamatan=kelurahan.id_kecamatan');
        return $this->db->get($this->table)->result();
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

}

/* End of file Kelurahan_model.php */
/* Location: ./application/models/Kelurahan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-25 03:25:58 */
/* http://harviacode.com */