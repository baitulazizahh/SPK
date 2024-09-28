<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('m_home');
		$this->load->model('m_periode');
		
    }
	 
	public function index()
	{
		// $this->load->model('m_home');
		// $data['nilai'] = $this->m_penilaian->tampil_data()->result();
		$title['title']= 'Admin';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();
		$data['periode'] = $this->m_periode->get_periode_terbaru_by_id();

		// Mengambil total user
		$data['total_users'] = $this->m_home->total_user();
		$data['total_kriteria'] = $this->m_home->total_kriteria();
		$data['total_permohonan'] = $this->m_home->total_permohonan();
		$data['total_penilaian'] = $this->m_home->total_penilaian();


		$this->load->view('templates/header',$title);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar',$user);
		$this->load->view('home', $data);
		// $this->load->view('templates/footer');
		
	}
}