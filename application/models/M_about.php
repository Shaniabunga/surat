<?php


class M_about extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// Menampilkan semua data yang berada di table about
	public function tampil_about(){
		$result=array();
		$this->db->select('*');
		$this->db->from('tbl_about');
		return $this->db->get()->result_array();
	}

	// Mengambil data pada table about berdasarkan id_about yang dipilih dari views
	public function edit_data($id_about) 
	{
		$this->db->from('tbl_about');
		$this->db->where('id_about',$id_about);
		return $this->db->get()->row_array();
	}

	// Konfirmasi ubah data pada table about berdasarkan id_about yang dipilih dari views
	public function ubah_data($data,$id_about){
		$this->db->where('id_about',$id_about);
		$this->db->update ('tbl_about',$data);
	}

}