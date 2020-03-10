<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{   
    public $data = [];
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_user');
    }

    function index()
    {
        if($this->session->userdata('login_status') != TRUE)
        {
            view('index');            
        }        
        elseif($this->session->userdata('login_status') == TRUE)
        {
            redirect(site_url('admin'));
        }
    }

    function login()
    {
        if($this->session->userdata('login_status') == TRUE)
        {
            redirect(site_url('admin'));
        }

        $db = $this->Model_user->dataLogin($this->input->post('username'));

        if($db->num_rows()>0)
        {
            $row = $db->row();
            $hash = $row->password;
            if(password_verify($this->input->post('password'),$hash))
            {
                $sesi = array(
                    'id_user' => $row->id_user,
                    'full_name' => $row->full_name,
                    'username' => $row->username,
                    'email' => $row->email,
                    'phone' => $row->phone,
                    'password' => $row->password,
                    'login_status' => TRUE

                );
            $this->session->set_userdata($sesi);
            redirect(site_url('admin'),'refresh');
            }            
            else
            {
                view('index');
            }    
          
        }else
        {
            view('index');
        }
        
    }

    function logout()
    {
        $sesi_selesai = array(
            'full_name' => 'full_name',
            'username' => 'username',
            'email' => 'email',
            'phone' => 'phone',
            'password' => 'password',
            'login_status' => 'login_status'
        );

        $this->session->unset_userdata($sesi_selesai);
        redirect(site_url('welcome'),'refresh');
    }
}