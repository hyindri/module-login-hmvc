<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model
{
    public $table = "mahasiswa";
    public $select_column = array('id_mahasiswa','nim','nama','jurusan','fakultas');
    public $order_column = array(null,'id_mahasiswa','nim','nama','jurusan','fakultas',null);

    function make_query()
    {
        $this->db->select($this->select_column);
        $this->db->from($this->table);

        if(isset($_POST['search']['value']))
        {
            $this->db->like('nim',$_POST['search']['value']);
            $this->db->or_like('nama',$_POST['search']['value']);
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
        }else{
            $this->db->order_by('id_mahasiswa');
        }
    }

    function make_datatables()
    {
        $this->make_query();
        if($_POST['length'] != -1) 
        {
            $this->db->limit($_POST['length'],$_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_all_data()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function tambahData()
	{
		$data = array(
            'id_mahasiswa' => uniqid(),
			'nim' => $this->input->post('nim'),
			'nama' => $this->input->post('nama'),
            'jurusan' => $this->input->post('jurusan'),
            'fakultas' => $this->input->post('fakultas')
        );
        $this->db->where('nim' ,$data['nim']);
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0){
            return $this->db->insert('');
        }else{
            return $this->db->insert($this->table, $data);
        }
    }

    function ambilSatuData($id_mahasiswa)
    {
        $this->db->where('id_mahasiswa',$id_mahasiswa);
        return $this->db->get($this->table)->result();
    }
    
    function ubahData()
    {
        $id_mahasiswa['id_mahasiswa'] = $this->input->post('id_mahasiswa');
        $data = array(            
			'nim' => $this->input->post('nim'),
			'nama' => $this->input->post('nama'),
            'jurusan' => $this->input->post('jurusan'),
            'fakultas' => $this->input->post('fakultas')
        );
        return $this->db->update($this->table,$data,$id_mahasiswa);
    }

    function hapusData()
    {
        $id['id_mahasiswa'] = $this->input->post('id_mahasiswa');
        return $this->db->delete($this->table,$id);
    }

}