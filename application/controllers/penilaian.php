<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('m_penilaian');
		$this->load->model('m_alternatif');
		$this->load->model('m_subkriteria');
		$this->load->model('m_data');
    }

	public function index()
	{
		
		$title['title']= 'Penilaian';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();
      
		$data['kriteria'] 	= $this->m_data->tampil_data(); 
		$data['subkriteria']= $this->m_subkriteria->get_all_subkriteria_grouped();
        $data['penilaian'] = $this->m_penilaian->get_penilaian_with_nama();
		$this->load->view('templates/header',$title);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $user);
		$this->load->view('penilaiann', $data);
		
	}

	

	public function hapus($id_permohonan){
        $where =  array ('id_permohonan'=> $id_permohonan);
        $this->m_penilaian->hapus_data($where,'tb_penilaian');
        redirect('penilaian/index');

    }



	
		
}
	

	
	
	


