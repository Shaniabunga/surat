<?php
Class Fungsi{
    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();
    }

    public function user_login(){
        $this->ci->load->model('M_user');
        $id_users = $this->ci->session->userdata('id_users');
        $user_data = $this->ci->M_user->get_by_id($id_users)->row();
        return $user_data;
    }
}