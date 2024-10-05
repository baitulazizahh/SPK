<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_periode');
        $this->load->library('form_validation');
    }

    public function index() {
        $title['title'] = 'Periode';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();
        $data['periode'] = $this->M_periode->get_all_periode();
        $data['jumlah_periode'] = count($data['periode']);

		$this->load->view('templates/header',$title);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar',$user);
		$this->load->view('periode', $data);
       
    }

    public function tambah() {
        $this->form_validation->set_rules('periode', 'Periode', 'required');
        $this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = [
                'periode' => $this->input->post('periode'),
                'tgl_mulai' => $this->input->post('tgl_mulai'),
                'tgl_akhir' => $this->input->post('tgl_akhir')
            ];
            $this->M_periode->insert_periode($data);
            redirect('periode/index');
        }
    }

    public function hapus($id_periode) {
        $this->M_periode->delete_periode($id_periode);
        redirect('periode/index');
    }

    public function update(){
		// Ambil data dari input POST
        $id_periode = $this->input->post('id_periode');
		$periode = $this->input->post('periode');
		$tgl_mulai = $this->input->post('tgl_mulai');
		$tgl_akhir = $this->input->post('tgl_akhir');
		   
		// Persiapkan data untuk diupdate
		$data = array(
			'periode' => $periode,
			'tgl_mulai' => $tgl_mulai,
			'tgl_akhir' => $tgl_akhir,
		);
		
		// Kondisi untuk menentukan data yang akan diupdate
		$where = array('id_periode' => $id_periode);
		
		// Panggil metode update_data di model
		$this->M_periode->update_periode($where, $data, 'tb_periode');
		
		// Redirect ke halaman alternatif/index
		redirect('periode/index');
		
    }
}
?>
