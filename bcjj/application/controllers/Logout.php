<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');

        date_default_timezone_set("Asia/Manila");
        $this->date = date("F d, Y");
        $this->time = date("g:i A");
    }

    public function index()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}