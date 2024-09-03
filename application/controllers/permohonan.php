<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('m_pengguna');
		$this->load->model('m_permohonan');
		$this->load->model('m_subkriteria');
		$this->load->model('m_data');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper(['url', 'form']);
    }

	public function index()
	{
		$data['title']= 'User';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();

		$id_user = $this->session->userdata('id_user');
		$data['kriteria'] 	= $this->m_data->tampil_data(); 
		$data['subkriteria']= $this->m_subkriteria->get_all_subkriteria_grouped();
		$data['permohonan'] = $this->m_permohonan->tampil_data();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar',$user);
		$this->load->view('permohonan', $data);
		// $this->load->view('templates/footer');
	}

		
}



