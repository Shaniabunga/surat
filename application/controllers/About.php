<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class About extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			$this->load->model('M_about');
			$this->load->database();
		}

	// Menampilkan menu about halaman utama About
	public function index()
	{	
		
		$oke['about'] = $this->M_about->tampil_about();
		$oke['content_page']="about/v_about";
		$this->load->view('body/menu',$oke);
	}

	// Menampilkan halaman edit about
	public function edit_data($id_about){
		$oke['data_about'] = $this->M_about->edit_data($id_about);
		$oke['content_page']="about/v_edit_about";
		$this->load->view('body/menu',$oke);
	}

	// Menyimpan semua data about yang telah diedit
	public function submit_edit_data($id_about){
		$config['upload_path']		= './assets/foto'; 
		$config['allowed_types']	= 'gif|jpg|png|jpeg'; 
		$config['max_size']			= 1044070; 
		$config['max_width']        = 1044070;
		$config['max_height']       = 1044070; 
		$config['file_name']        = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10); 
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		$this->upload->do_upload("foto_about");
		$data = $this->upload->data();
		$gambar =$data['file_name'];

		if ($this->upload->do_upload("foto_about")) {
		$data = array(
			'nama_about' 		=>$this->input->post('nama_about',true),
			'nim_about' 		=>$this->input->post('nim_about',true),
			'tanggal_about' 	=>$this->input->post('tanggal_about',true),
			'foto_about' 		=>$gambar,
		);
		$oke					=$this->M_about->ubah_data($data,$id_about); 
		redirect('about');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Type file tidak diperbolehkan!</div>');
			redirect('about');
		}
	}

}
