<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nakes_model extends CI_Model
{

    public $table = 'nakes';
    public $id = 'id_nakes';
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
        $this->db->join('jenis_nakes', 'jenis_nakes.id_jenis_nakes=nakes.id_jenis_nakes');
        $this->db->join('dasar_sip', 'dasar_sip.id_nakes=nakes.id_nakes');
        $this->db->join('jenis_dasar_sip', 'jenis_dasar_sip.id_jenis_dasar_sip=dasar_sip.id_jenis_dasar_sip');
        $this->db->select('nakes.id_nakes');
        $this->db->select('nakes.id_jenis_nakes');
        $this->db->select('dasar_sip.id_jenis_dasar_sip');
        $this->db->select('jenis_nakes');
        $this->db->select('nik');
        $this->db->select('nama');
        $this->db->select('jk');
        $this->db->select('telp');
        $this->db->select('alamat');
        $this->db->select('tmp_lahir');
        $this->db->select('tgl_lahir');
        $this->db->select('jenis_dasar_sip');
        $this->db->select('no_str');
        $this->db->select('nakes.masa_berlaku');
        $this->db->select('jml_sip_aktif');
        $this->db->where('nakes.id_nakes', $id);
        return $this->db->get($this->table)->row();
    }

    function get_by_id1($id)
    {
        $this->db->where('nakes.id_nakes', $id);
        $this->db->join('jenis_nakes', 'jenis_nakes.id_jenis_nakes=nakes.id_jenis_nakes');
        // $this->db->join('dasar_sip', 'dasar_sip.id_nakes=nakes.id_nakes');
        // $this->db->join('jenis_dasar_sip', 'jenis_dasar_sip.id_jenis_dasar_sip=dasar_sip.id_jenis_dasar_sip');
        $this->db->select('nakes.id_nakes');
        $this->db->select('nakes.id_jenis_nakes');
        // $this->db->select('dasar_sip.id_jenis_dasar_sip');
        $this->db->select('jenis_nakes');
        $this->db->select('nik');
        $this->db->select('nama');
        $this->db->select('jk');
        $this->db->select('telp');
        $this->db->select('alamat');
        $this->db->select('tmp_lahir');
        $this->db->select('tgl_lahir');
        $this->db->select('no_str');
        $this->db->select('masa_berlaku');
        $this->db->select('jml_sip_aktif');
        return $this->db->get($this->table)->row_array();
    }

    function get_by_id2($id)
    {
        $this->db->select('nakes.*, jenis_nakes.*');
        // $this->db->from('nakes');
        $this->db->join('jenis_nakes', 'jenis_nakes.id_jenis_nakes=nakes.id_jenis_nakes');
        // $this->db->join('sip', 'sip.id_nakes=nakes.id_nakes');
        $this->db->where('nakes.id_nakes', $id);
        return $this->db->get($this->table)->row();
    }

    // function get_by_id2($id)
    // {
    //     $this->db->select('nakes.*, jenis_nakes.*');
    //     // $this->db->from('nakes');
    //     $this->db->join('enis_nakes', 'jenis_nakes.id_jenis_nakes=nakes.id_jenis_nakes');
    //     $this->db->join('sip', 'sip.id_nakes=nakes.id_nakes');
    //     $this->db->where('sip.id_sip', $id);
    //     return $this->db->get($this->table)->row();
    // }

    function get_by_id_jenis($id)
    {
        $this->db->select('nakes.*, jenis_nakes.jenis_nakes');
        // $this->db->from('nakes');
        $this->db->join('jenis_nakes', 'jenis_nakes.id_jenis_nakes=nakes.id_jenis_nakes');
        $this->db->where('jenis_nakes.id_jenis_nakes', $id);
        return $this->db->get($this->table)->result();
    }

    function get_data_filter($filter)
    {
        $this->db->select('nakes.* , jenis_nakes');
        $this->db->join('jenis_nakes', 'jenis_nakes.id_jenis_nakes=nakes.id_jenis_nakes');
        $this->db->where('jenis_nakes.id_jenis_nakes', $filter);
        return $this->db->get($this->table)->result();
    }
    // function dropdown()
    // {
    //     $this->db->select('jenis_nakes, id_jenis_nakes');
    //     return $this->db->get('jenis_nakes')->result();
    // }
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_nakes', $q);
	$this->db->or_like('id_jenis_nakes', $q);
	$this->db->or_like('nik', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('jk', $q);
	$this->db->or_like('telp', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('tmp_lahir', $q);
	$this->db->or_like('tgl_lahir', $q);
    $this->db->or_like('no_str', $q);
    $this->db->or_like('masa_berlaku', $q);
    $this->db->or_like('jml_sip_aktif', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_nakes', $q);
    	$this->db->or_like('nakes.id_jenis_nakes', $q);
        // $this->db->or_like('nakes.id_dasar_sip', $q);
        // $this->db->or_like('dasar_sip.id_jenis_dasar_sip', $q);
    	$this->db->or_like('nik', $q);
    	$this->db->or_like('nama', $q);
    	$this->db->or_like('jk', $q);
    	$this->db->or_like('telp', $q);
    	$this->db->or_like('alamat', $q);
    	$this->db->or_like('tmp_lahir', $q);
    	$this->db->or_like('tgl_lahir', $q);
        $this->db->or_like('no_str', $q);
        $this->db->or_like('masa_berlaku', $q);
        $this->db->or_like('jml_sip_aktif', $q);
    	$this->db->limit($limit, $start);
        $this->db->join('jenis_nakes', 'jenis_nakes.id_jenis_nakes=nakes.id_jenis_nakes');
        // $this->db->join('dasar_sip', 'dasar_sip.id_nakes=nakes.id_nakes');
        // $this->db->join('jenis_dasar_sip', 'jenis_dasar_sip.id_jenis_dasar_sip=dasar_sip.id_jenis_dasar_sip');
        return $this->db->get($this->table)->result();
    }

    // SELECT COUNT(id_nakes) FROM `nakes` JOIN `jenis_nakes` ON `jenis_nakes`.`id_jenis_nakes`=`nakes`.`id_jenis_nakes`

    function get_by_id_jumlah($id)
    {
        $this->db->select('count(id_nakes) as jumlah');
        $this->db->join('jenis_nakes', 'jenis_nakes.id_jenis_nakes=nakes.id_jenis_nakes');
        return $this->db->get($this->table)->row();
    }

    function get_limit_data1($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_nakes', $q);
        $this->db->or_like('nakes.id_jenis_nakes', $q);
        $this->db->or_like('nakes.id_dasar_sip', $q);
        $this->db->or_like('dasar_sip.id_jenis_dasar_sip', $q);
        $this->db->or_like('nik', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('jk', $q);
        $this->db->or_like('telp', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('tmp_lahir', $q);
        $this->db->or_like('tgl_lahir', $q);
        $this->db->or_like('no_str', $q);
        $this->db->or_like('masa_berlaku', $q);
        $this->db->or_like('jml_sip_aktif', $q);
        $this->db->limit($limit, $start);
        $this->db->join('jenis_nakes', 'jenis_nakes.id_jenis_nakes=nakes.id_jenis_nakes');
        $this->db->join('dasar_sip', 'dasar_sip.id_nakes=nakes.id_nakes');
        $this->db->join('jenis_dasar_sip', 'jenis_dasar_sip.id_jenis_dasar_sip=dasar_sip.id_jenis_dasar_sip');
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

    public function SelectData($table, $where = array())
    {
        if(count($where)>0)
        {
            return $this->db->select('*')->from($table)->like($where)->get()->result_array();
        }
        return $this->db->get($table)->result_array();
    }

    public function get_list_nama()
    {
        $this->db->select('nama');
        $this->db->from($this->table);
        $this->db->order_by('nama','asc');
        $query = $this->db->get();
        $result = $query->result();
 
        $nakes = array();
        foreach ($result as $row) 
        {
            $nakes[] = $row->nama;
        }
        return $nakes;
    }

}

/* End of file Nakes_model.php */
/* Location: ./application/models/Nakes_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-25 04:00:09 */
/* http://harviacode.com */