<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kelas extends CI_Controller {
	public function index(){
		if ($this->session->userdata("uname")=="") {
				redirect("login");
			}
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$data['kelas'] = $this->absensi_models->queryAll('tb_kelas');
		$this->load->view('template/header', $data);
		$this->load->view('kelas/v_kelas2', $data);
		$this->load->view('template/footer');
	}

	public function tambah(){
		if ($this->session->userdata("uname")=="") {
				redirect("login");
			}
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$this->load->view('template/header', $data);
		$this->load->view('kelas/v_tambah');
		$this->load->view('template/footer');
	}

	public function add(){
		$field['nama_kelas'] = $this->input->post("i_namakelas");
		$field['status'] = "Aktif";

		$this->db->insert('tb_kelas', $field);
		redirect('kelas');
 	}

 	public function edit($id){
 		$ID = decrypt_url($id);
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$data['detail'] = $this->absensi_models->whereQuery('tb_kelas', 'id_kelas', $ID)->row();
		$this->load->view('template/header', $data);
		$this->load->view('kelas/v_edit', $data);
		$this->load->view('template/footer');
	}

	public function update(){
		$ID = $this->input->post("i_id");
		$field['status'] = $this->input->post("i_status");
		$field['nama_kelas'] = $this->input->post("i_namakelas");

		$this->db->where('id_kelas', $ID);
		$this->db->update('tb_kelas', $field);
		redirect('kelas');
 	}
}
?>