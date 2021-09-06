<?php


class M_surat extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// Menampilkan semua data pada table surat
	public function tampil_surat(){
		$result=array();
		$this->db->select('*');
		$this->db->from('tbl_surat');
		return $this->db->get()->result_array();
	}

	// Mengambil data pada table surat berdasarkan id_surat yang dipilih untuk ditampilkan di views
    public function lihat_data($id_surat) 
	{
		$this->db->from('tbl_surat');
		$this->db->where('id_surat',$id_surat);
		return $this->db->get()->row_array();
	}

	// Menambahkan data baru pada table surat
    public function tambah_data($data){
		$this->db->insert('tbl_surat',$data);
	}

	// Mengambil data pada table surat berdasarkan id_surat yang dipilih dari views
	public function edit_data($id_surat) 
	{
		$this->db->from('tbl_surat');
		$this->db->where('id_surat',$id_surat);
		return $this->db->get()->row_array();
	}

	// Konfirmasi ubah data pada table surat berdasarkan id_surat yang dipilih dari views
	public function ubah_data($data,$id_surat){
		$this->db->where('id_surat',$id_surat);
		$this->db->update ('tbl_surat',$data);
	}

	// Konfirmasi hapus data pada table surat berdasarkan id_surat yang dipilih dari views
   	public function delete($id)
	{
		$this->db->where('id_surat',$id);
		$this->db->delete('tbl_surat');
	}

}