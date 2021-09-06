<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Surat extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			$this->load->model('M_surat');
			$this->load->database();
		}

	// Menampilkan menu surat halaman utama Arsip surat
	public function index()
	{	
		$oke['surat'] = $this->M_surat->tampil_surat();
		$oke['content_page']="surat/v_surat";
		$this->load->view('body/menu',$oke);
	}

	// Menampilkan halaman lihat surat
	public function lihat_data($id_surat){
		$oke['data_surat'] = $this->M_surat->lihat_data($id_surat);
		$oke['content_page']="surat/v_lihat_surat";
		$this->load->view('body/menu',$oke);
	}

	// Menampilkan halaman tambah atau arsip surat baru
	public function tambah_data(){
		$oke['content_page']="surat/v_tambah_surat";
		$this->load->view('body/menu',$oke);
	}

	// Menampilkan halaman edit arsip surat
	public function edit_data($id_surat){
		$oke['data_surat'] = $this->M_surat->edit_data($id_surat);
		$oke['content_page']="surat/v_edit_surat";
		$this->load->view('body/menu',$oke);
	}

	// Menyimpan data arsip surat baru yang telah ditambahkan
	public function submit_simpan_data(){
		$config['upload_path']		= './assets/surat'; 
		$config['allowed_types']	= 'pdf'; 
		$config['max_size']			= 1044070; 
		$config['max_width']        = 1044070;
		$config['max_height']       = 1044070; 
		$config['file_name']        = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10); 
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		$this->upload->do_upload("file");
		$data = $this->upload->data();
		$surat =$data['file_name'];
		if ($this->upload->do_upload("file")) {
			$data = array(
			'nomor_surat' 		=>$this->input->post('nomor_surat',true),
			'kategori_surat' 	=>$this->input->post('kategori_surat',true),
			'judul_surat' 		=>$this->input->post('judul_surat',true),
			'tanggal_surat' 	=>date('y-m-d H:i:s'),
			'file' 				=>$surat,
			);
			$oke				=$this->M_surat->tambah_data($data); 
			redirect('surat');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Type file tidak diperbolehkan!</div>');
			redirect('surat');
		}
	}

	// Menyimpan data arsip surat yang telah diedit
	public function submit_edit_data($id_surat){
		$config['upload_path']		= './assets/surat'; 
		$config['allowed_types']	= 'pdf'; 
		$config['max_size']			= 1044070; 
		$config['max_width']        = 1044070;
		$config['max_height']       = 1044070; 
		$config['file_name']        = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10); 
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		$this->upload->do_upload("file");
		$data = $this->upload->data();
		$surat =$data['file_name'];

		if ($this->upload->do_upload("file")) {
		$data = array(
			'nomor_surat' 		=>$this->input->post('nomor_surat',true),
			'kategori_surat' 	=>$this->input->post('kategori_surat',true),
			'judul_surat' 		=>$this->input->post('judul_surat',true),
			'tanggal_surat' 	=>date('y-m-d H:i:s'),
			'file' 				=>$surat,
		);
		$oke					=$this->M_surat->ubah_data($data,$id_surat); 
		redirect('surat');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Type file tidak diperbolehkan!</div>');
			redirect('surat');
		}
	}

	// Konfirmasi hapus data arsip surat
	public function data_hapus($id){
		$oke		=$this->M_surat->delete($id);
		redirect('surat');
	}

	// Konfirmasi unduh arsip surat PDF
	public function download($surat){
        force_download('assets/surat/'.$surat,NULL);
    }

}
