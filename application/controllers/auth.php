<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index(){

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',[
            'required' => 'Email harus diisi!',
        ]);
        $this->form_validation->set_rules('password','Password', 'trim|required',[
            'required' => 'Password harus diisi!',
        ]);

        if($this->form_validation->run() == false){
            $data['title'] = 'Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('login');
            $this->load->view('templates/auth_footer');
        }

        else{
            $this->_login();
        }
       
    }

    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
    
       
    
        // Mengambil data user dari database
        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
        
      
        if($user){
            if($user['is_active'] == 1){
                // // Debugging: Menampilkan hasil password verification
                // echo "<h3>Debugging Password Verification</h3>";
                // $is_password_correct = password_verify($password, $user['password']);
                // var_dump($is_password_correct);
                // if($is_password_correct) {
                //     $data = [
                //         'email' => $user['email'],
                //         'id_role' => $user['id_role'],
                //     ];
                //     $this->session->set_userdata($data);
                //     echo "Redirecting...";
                //     if($user['id_role'] == 1) {
                //         redirect('admin');
                //     } else {
                //         redirect('user');
                //     }
                if(password_verify($password, $user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'id_role' => $user['id_role'],
                    ];
                    $this->session->set_userdata($data);
                    if($user['id_role'] == 1){
                        redirect('admin');
                    } else {
                        redirect('user/user');
                    }
                } else {
                    echo "Password salah!";
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('auth');
                }
            } else {
                echo "Email belum diaktivasi!";
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum diaktivasi!</div>');
                redirect('auth');
            }
        } else {
            echo "Email belum terdaftar!";
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
            redirect('auth');
        }
    }
    

    public function registration(){

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
            'required' => 'Nama lengkap harus diisi!',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]',[
            'required' => 'Nama lengkap harus diisi!',
            'is_unique' => 'Email sudah terdaftar!',
            'valid_email' => 'Email tidak valid!',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
            'required' => 'Password harus diisi!',
            'min_length' => 'Password minimal 3 karakter',
            'matches' => 'Password tidak sama!',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
       
        if($this->form_validation->run() == false){
            $data['title']= 'Registrasi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('registration');
            $this->load->view('templates/auth_footer');
        }
        else{
            
            $data=[
                'id_role' => 2,
                'nama' => htmlspecialchars($this->input->post('nama',true)), 
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),  
                'email' =>  htmlspecialchars($this->input->post('email', true)),    
                'is_active' =>1,  
                'date_created' => time()
            ];

            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat anda telah berhasil mendaftar!
          </div>');
            redirect('auth');
        }

        
    }

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_role');
        redirect('auth');
    }

    
}