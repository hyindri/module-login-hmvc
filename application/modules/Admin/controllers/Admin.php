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
            $sub_array[]    = '<button type="button" class="btn btn-info btn-sm mb-2" data-id="'.$row->id_mahasiswa.'" id="get-ubahModal">Ubah</button> <br> <button type="button" class="btn btn-danger btn-sm" id="get-hapusModal" data-id="'.$row->id_mahasiswa.'">Hapus</button>';
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

    function tambah_data()
	{
        $data = $this->Model_admin->tambahData();        
		echo json_encode(array($data));
    }

    
	function ambil_satu_data()
	{
		$output = array();
		$data = $this->Model_admin->ambilSatuData($this->input->post('id_mahasiswa'));
		foreach($data as $row)
		{
			$output['id'] = $row->id_mahasiswa;
			$output['nim'] = $row->nim;
			$output['nama'] = $row->nama;
			$output['jurusan'] = $row->jurusan;
			$output['fakultas'] = $row->fakultas;
		}
		echo json_encode($output);	
    }

    function ubah_data()
	{
        $data = $this->Model_admin->ubahData();        
		echo json_encode($data);
    }

    function hapus_data()
	{
		$data = $this->Model_admin->hapusData();
		json_encode($data);
	}
}