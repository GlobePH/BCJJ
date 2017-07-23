<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public $no              =   "NO";
    public $email           =   "EMAIL";
    public $password        =   "PASSWORD";
    public $deletion        =   "DELETION";
    public $smssetup        =   "SMSSETUP";
    public $table           =   "users";

    function __construct()
    {
        parent::__construct();
    }

    function insert($param)
    {
        $this->db->insert($this->table, $param);
    }

    function check_duplicate_email($email) {
        $row = $this->db->where($this->email, $email)
                        ->where($this->deletion, 0)
                        ->get($this->table);

                return $row->num_rows();
    }

    function get_information_no($no) {
        $row = $this->db->where($this->no, $no)
                        ->where($this->deletion, 0)
                        ->get($this->table);

                return $row->row();
    }

    function get_information($email, $password) {
        $row = $this->db->where($this->email, $email)
                        ->where($this->password, md5($password))
                        ->where($this->deletion, 0)
                        ->get($this->table);

                return $row->row();
    }

    function update($no, $params) {
        $this->db->where($this->no, $no)
                 ->update($this->table, $params);
    }

    function get_all_user_setup_yes()
    {
        $row = $this->db->where($this->deletion, 0)
                        ->where($this->smssetup, 'YES')
                        ->get($this->table);

                return $row->result();
    }
}