<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function index()
	{
		$data['title']= 'User';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/user_sidebar');
		$this->load->view('templates/topbar',$user);
		$this->load->view('user_profil');
		// $this->load->view('templates/footer');
		
	}
}