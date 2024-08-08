<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('m_penilaian');
		//$this->load->model('m_penilaian');
		// $this->load->model('m_alternatif');
		// $this->load->model('m_subkriteria');
		// $this->load->model('m_data');
    }
	public function index()
	{
		// $this->load->model('m_perhitungan');
		// $data['alternatif'] = $this->m_perhitungan->tampil_data()->result();
		$title['title']= 'Perhitungan';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header',$title);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $user);
		$this->load->view('perhitungan');
		// $this->load->view('templates/footer');
		
	}

	public function tampil_data() {
	
		$this->load->model('m_penilaian');
		$data['nilai'] = $this->m_penilaian->get_penilaian(); 
		var_dump($data['nilai']); // debugging
		$this->load->view('perhitungan', $data);
	}
	


  

}