<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model
{
    public $table = "users";
    public $select_column = array("id_user","username","password","email","full_name","phone","role");
    
    
    function dataLogin($username)
    {
        $this->db->where('username',$username);
        return $this->db->get($this->table);
    }
}