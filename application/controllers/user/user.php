<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->model('m_periode');
		
    }

	public function index()
	{
		$title['title']= 'User';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();
		$data['periode'] = $this->m_periode->get_periode_terbaru_by_id();

		$this->load->view('templates/header',$title);
		$this->load->view('templates/user_sidebar');
		$this->load->view('templates/topbar',$user);
		$this->load->view('user_home', $data);
		// $this->load->view('templates/footer');
		
	}
}