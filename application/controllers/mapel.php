<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mapel extends CI_Controller {
	public function index(){
		if ($this->session->userdata("uname")=="") {
				redirect("login");
			}
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$data['mapel'] = $this->absensi_models->queryAll('tb_mapel');
		$this->load->view('template/header', $data);
		$this->load->view('mapel/v_mapel', $data);
		$this->load->view('template/footer');
	}

	public function tambah(){if ($this->session->userdata("uname")=="") {
				redirect("login");
			}
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$this->load->view('template/header', $data);
		$this->load->view('mapel/v_tambah');
		$this->load->view('template/footer');
	}

	public function add(){
		$field['nama_mapel'] = $this->input->post("i_namamapel");
		$field['status'] = "Aktif";

		$this->db->insert('tb_mapel', $field);
		redirect('mapel');
 	}

 	public function edit($id){
 		$ID = decrypt_url($id);
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$data['detail'] = $this->absensi_models->whereQuery('tb_mapel', 'id_mapel', $ID)->row();
		$this->load->view('template/header', $data);
		$this->load->view('mapel/v_edit', $data);
		$this->load->view('template/footer');
	}

	public function update(){
		$ID = $this->input->post("i_id");
		$field['status'] = $this->input->post("i_status");
		$field['nama_mapel'] = $this->input->post("i_namamapel");

		$this->db->where('id_mapel', $ID);
		$this->db->update('tb_mapel', $field);
		redirect('mapel');
 	}
}
?>