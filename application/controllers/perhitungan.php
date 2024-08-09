<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan extends CI_Controller {

	public function __construct() {
        parent::__construct();
       $this->load->model('m_perhitungan');
		
    }
	public function index()
	{
		
		$title['title']= 'Perhitungan';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();

		$data['nilai'] = $this->m_perhitungan->tampil_data();
		$this->load->view('templates/header',$title);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $user);
		$this->load->view('perhitungan', $data);
		
	}

	

  

}