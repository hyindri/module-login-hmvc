<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth/Model_user');
        if($this->session->userdata('login_status')!=TRUE)
		{	
			$this->session->set_flashdata('msg', 'Mohon Login Dahulu');
			redirect(site_url('auth'));
		}

    }

    function index()
    {
        view('index');
    }
}