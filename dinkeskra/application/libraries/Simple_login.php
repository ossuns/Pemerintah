<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Simple_login {
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	// Fungsi login
	public function login($username, $password) {
		
		$pass = md5($password);
		$query = $this->CI->db->get_where('user',array('username'=>$username,'password' => $pass));
		if($query->num_rows() == 1) {
			$this->CI->session->set_userdata('username_admin', $username);
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			redirect('halaman');
		}else{
			$this->CI->session->set_flashdata('sukses','Oops... Username/password salah');
			redirect('/login/');
		}
		return false;
	}
	// Proteksi halaman
	public function cek_login() {
		if($this->CI->session->userdata('username_admin') === NULL) {
			$this->CI->session->set_flashdata('sukses','Anda belum login');
			redirect('/login/');
		}
	}
	// Fungsi logout
	public function logout() {
		$this->CI->session->unset_userdata('username_admin');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect('/login/');
	}
}
