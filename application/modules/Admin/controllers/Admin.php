<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('Auth/Model_user');
        if($this->session->userdata('login_status')!=TRUE)
		{	
			$this->session->set_flashdata('msg', 'Mohon Login Dahulu');
			redirect(site_url('auth'));
        }
        $this->load->model('Model_admin');

    }

    function index()
    {
        view('index');
    }

    function ambil_data()
    {
        $fetch_data = $this->Model_admin->make_datatables();
        $data = array();
        $no = 1;
        foreach($fetch_data as $row)
        {
            $sub_array 		= array();
			$sub_array[] 	= $no++;
			$sub_array[] 	= $row->nim;
			$sub_array[]	= $row->nama;
			$sub_array[] 	= $row->jurusan;
			$sub_array[]	= $row->fakultas;	
            $sub_array[]    = '<button type="button" class="btn btn-info btn-sm mb-2">Ubah</button> <br> <button type="button" class="btn btn-danger btn-sm">Hapus</button>';
            $data[]         = $sub_array;
        }

        $output = array(
			"draw" => intval($_POST['draw']),
			"recordsTotal" => $this->Model_admin->get_all_data(),
			"recordsFiltered" => $this->Model_admin->get_filtered_data(),
			"data" => $data
		);
        echo json_encode($output);
    }
}