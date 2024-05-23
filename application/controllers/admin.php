<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->model('m_data');
		$data['kriteria'] = $this->m_data->tampil_data()->result();

		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('kriteria', $data);
	}

	public function tambah_aksi(){
		$id_kriteria		= $this->input->post('id_kriteria');
		$nama_kriteria		= $this->input->post('nama_kriteria');
		$jenis_kriteria		= $this->input->post('jenis_kriteria');
		$bobot				= $this->input->post('bobot');

		$data 	= array(
			'id_kriteria'	=> $id_kriteria,
			'nama_kriteria'	=> $nama_kriteria,
			'jenis_kriteria'=> $jenis_kriteria,
			'bobot'			=> $bobot,
		);

		$this->m_data->input_data($data,'tb_kriteria');
		redirect('admin/index');
	}

	// public function hapus(){
    //     $this->m_data->hapus_data($this->input->post());
    //     redirect(base_url().'admin/index');

    // }
	public function hapus($id){
        $where =  array ('id'=> $id);
        $this->m_data->hapus_data($where,'tb_kriteria');
        redirect('admin/index');

    }

	public function update(){
        $id         	= $this->input->post('id');
        $id_kriteria    = $this->input->post('id_kriteria');
        $nama_kriteria  = $this->input->post('nama_kriteria');
        $jenis_kriteria = $this->input->post('jenis_kriteria');
        $bobot    		= $this->input->post('bobot');
        
        $data = array(
			'id'				=>$id,
			'id_kriteria'		=>$id_kriteria,
            'nama_kriteria'     =>$nama_kriteria,
            'jenis_kriteria'    =>$jenis_kriteria,
            'bobot' 			=>$bobot
        );

        $where = array(
            'id'=>$id
        );

		$this->m_data->update_data($where, $data, 'tb_kriteria');
        redirect('admin/index');

		// $this->db->where('id', $id);
        // $this->m_data->update_data($where, $data, 'tb_kriteria');
        // redirect('admin/index');
    }

    

}
