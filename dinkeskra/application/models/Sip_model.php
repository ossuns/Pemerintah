<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sip_model extends CI_Model
{
    // var $table = 'sip';
    var $column_order = array(null, 'nama','masa_berlaku','sarkes'); 
    var $column_search = array('nama','masa_berlaku','sarkes');
    // var $order = array('id' => 'asc');

    public $table = 'sip';
    public $id = 'id_sip';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    public function kadaluarsa($id)
    {
        $this->load->helper('date');
        $this->load->model('Nakes_model');
        $masa_berlaku = $this->Nakes_model->get_by_id1($id)['masa_berlaku'];

        if (($masa_berlaku >= date("Y-m-d") && diff_date(date("Y-m-d"), $masa_berlaku)>180) OR
            ($masa_berlaku >= date("Y-m-d") && diff_date(date("Y-m-d"), $masa_berlaku)<=180 )) {
            return false;
        }else{
            return true;
        }
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
        $this->db->where('sip.id_sip', $id);
        $this->db->join('nakes', 'nakes.id_nakes=sip.id_nakes');
        $this->db->join('jenis_sarkes', 'jenis_sarkes.id_jenis_sarkes=sip.id_jenis_sarkes');
        $this->db->join('sarkes', 'sarkes.id_sarkes=sip.id_sarkes');
        $this->db->select('sip.id_sip');
        $this->db->select('sip.id_nakes');
        $this->db->select('sip.id_jenis_sarkes');
        $this->db->select('sip.id_sarkes');
        $this->db->select('sip.*');
        $this->db->select('jenis_sarkes.*');
        $this->db->select('sarkes.*');
        $this->db->select('nakes.*');
        return $this->db->get($this->table)->row();
    }

    function get_by_id1($id)
    {
        $this->db->where('sip.id_sip', $id);
        $this->db->join('nakes', 'nakes.id_nakes=sip.id_nakes');
        $this->db->join('jenis_sarkes', 'jenis_sarkes.id_jenis_sarkes=sip.id_jenis_sarkes');
        $this->db->join('sarkes', 'sarkes.id_sarkes=sip.id_sarkes');
        $this->db->join('kelurahan', 'kelurahan.id_kelurahan=sarkes.id_kelurahan');
        $this->db->join('jenis_nakes', 'jenis_nakes.id_jenis_nakes=nakes.id_jenis_nakes');
        $this->db->select('sip.id_sip');
        $this->db->select('sip.id_nakes');
        $this->db->select('sip.id_jenis_sarkes');
        $this->db->select('sip.id_sarkes');
        $this->db->select('sip.*');
        $this->db->select('nakes.*');
        $this->db->select('jenis_sarkes.*');
        $this->db->select('sarkes.*');
        $this->db->select('jenis_nakes.*');
        $this->db->select('kelurahan.*');
        return $this->db->get($this->table)->result_array();
    }

    function get_sip_by_nakes($id) {
        $this->db->select('sip.*, nakes.*, jenis_sarkes.*, kelurahan.*, jenis_nakes.*, sarkes.*');
        $this->db->from('sip');
        $this->db->join('nakes', 'nakes.id_nakes=sip.id_nakes');
        $this->db->join('jenis_sarkes', 'jenis_sarkes.id_jenis_sarkes=sip.id_jenis_sarkes');
        $this->db->join('sarkes', 'sarkes.id_sarkes=sip.id_sarkes');
        $this->db->join('kelurahan', 'kelurahan.id_kelurahan=sarkes.id_kelurahan');
        $this->db->join('jenis_nakes', 'jenis_nakes.id_jenis_nakes=nakes.id_jenis_nakes');
        $this->db->where('sip.id_nakes', $id);
        return $this->db->get()->result_array();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_sip', $q);
    $this->db->or_like('id_nakes', $q);
    $this->db->or_like('id_jenis_sarkes', $q);
    $this->db->or_like('id_sarkes', $q);
    $this->db->or_like('no_sip', $q);
    $this->db->or_like('tanggal_masuk', $q);
    $this->db->or_like('tanggal_selesai', $q);
    $this->db->or_like('tanggal_terbit', $q);
    $this->db->or_like('tanggal_berlaku', $q);
    // $this->db->or_like('tanggal_kadaluarsa', $q);
    $this->db->or_like('status_sip', $q);
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_sip', $q);
    $this->db->or_like('sip.id_nakes', $q);
    $this->db->or_like('sip.id_jenis_sarkes', $q);
    $this->db->or_like('sip.id_sarkes', $q);
    $this->db->or_like('no_sip', $q);
    $this->db->or_like('tanggal_masuk', $q);
    $this->db->or_like('tanggal_selesai', $q);
    $this->db->or_like('tanggal_terbit', $q);
    $this->db->or_like('tanggal_berlaku', $q);
    // $this->db->or_like('tanggal_kadaluarsa', $q);
    $this->db->or_like('status_sip', $q);
    $this->db->limit($limit, $start);
        $this->db->join('nakes', 'nakes.id_nakes=sip.id_nakes');
        $this->db->join('jenis_sarkes', 'jenis_sarkes.id_jenis_sarkes=sip.id_jenis_sarkes');
        $this->db->join('sarkes', 'sarkes.id_sarkes=sip.id_sarkes');
        return $this->db->get($this->table)->result();
    }

     function get_limit_data2($id, $limit, $start = 0, $q = NULL) {
        $this->db->where('sip.id_nakes', $id);
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_sip', $q);
    // $this->db->or_like('sip.id_nakes', $q);
    // $this->db->or_like('sip.id_jenis_sarkes', $q);
    // $this->db->or_like('sip.id_sarkes', $q);
    // $this->db->or_like('no_sip', $q);
    // $this->db->or_like('tanggal_masuk', $q);
    // $this->db->or_like('tanggal_selesai', $q);
    // $this->db->or_like('tanggal_terbit', $q);
    // $this->db->or_like('tanggal_berlaku', $q);
    // $this->db->or_like('tanggal_kadaluarsa', $q);
    $this->db->limit($limit, $start);
        $this->db->join('nakes', 'nakes.id_nakes=sip.id_nakes');
        $this->db->join('jenis_sarkes', 'jenis_sarkes.id_jenis_sarkes=sip.id_jenis_sarkes');
        $this->db->join('sarkes', 'sarkes.id_sarkes=sip.id_sarkes');
        return $this->db->get($this->table)->result();
    }

    function get_limit_data3($id) {
        $this->db->where('sip.id_nakes', $id);
        $this->db->order_by($this->id, $this->order);
      //  $this->db->like('id_sip', $q);
    // $this->db->or_like('sip.id_nakes', $q);
    // $this->db->or_like('sip.id_jenis_sarkes', $q);
    // $this->db->or_like('sip.id_sarkes', $q);
    // $this->db->or_like('no_sip', $q);
    // $this->db->or_like('tanggal_masuk', $q);
    // $this->db->or_like('tanggal_selesai', $q);
    // $this->db->or_like('tanggal_terbit', $q);
    // $this->db->or_like('tanggal_berlaku', $q);
    // $this->db->or_like('tanggal_kadaluarsa', $q);
   // $this->db->limit($limit, $start);
        $this->db->join('nakes', 'nakes.id_nakes=sip.id_nakes');
        $this->db->join('jenis_sarkes', 'jenis_sarkes.id_jenis_sarkes=sip.id_jenis_sarkes');
        $this->db->join('sarkes', 'sarkes.id_sarkes=sip.id_sarkes');
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

    function aktifasi($id,$tgl)
    {
        $this->db->set('status_sip','Aktif');
        $this->db->set('tanggal_terbit', $tgl);
        $this->db->where($this->id, $id);
        $query=$this->db->update('sip');
        return $query;
    }

    public function SelectData($table, $where = array())
    {
        if(count($where)>0)
        {
            return $this->db->select('*')->from($table)->like($where)->get()->result_array();
        }
        return $this->db->get($table)->result_array();
    }

    function data_sarkes($id_jenis_sarkes)
    {
        $this->db->where('id_jenis_sarkes', $id_jenis_sarkes);
        $this->db->order_by('sarkes', 'ASC');
        $query = $this->db->get('sarkes');
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->id_sarkes.'">'.$row->sarkes.'</option>';
        }
        return $output;
    }

    private function _data_filter()
    {
        //add custom filter here
        $this->db->join('nakes', 'nakes.id_nakes=sip.id_nakes');
        $this->db->join('jenis_sarkes', 'jenis_sarkes.id_jenis_sarkes=sip.id_jenis_sarkes');
        $this->db->join('sarkes', 'sarkes.id_sarkes=sip.id_sarkes');
        if($this->input->post('nama'))
        {
            $this->db->where('nama', $this->input->post('nama'));
        }
        if($this->input->post('masa_berlaku'))
        {
            $this->db->like('masa_berlaku', $this->input->post('masa_berlaku'));
        }
        if($this->input->post('sarkes'))
        {
            $this->db->like('sarkes', $this->input->post('sarkes'));
        }
 
        $this->db->from($this->table);
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }


        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_data_filter();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    public function count_filtered()
    {
        $this->_data_filter();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}

/* End of file Sip_model.php */
/* Location: ./application/models/Sip_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-25 03:25:58 */
/* http://harviacode.com */