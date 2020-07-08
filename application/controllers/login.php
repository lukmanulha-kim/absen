<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function index()	{
		if ($this->session->userdata("uname")) {
			redirect ("Welcome");
		}
		$this->load->view("login");
	}

	public function cek(){
		$username = $this->input->post("i_user");
		$password = md5($this->input->post("i_sandi"));

		$this->db->where("uname", $username);
		$this->db->where("pwd", $password);
		$query = $this->db->get("tb_guru");
		$hitung = $query->num_rows();
		if ($hitung>0) {
				$datalogin = $query->row();
				$arraysession = array("id_user"=>$datalogin->nip, "uname"=>$datalogin->nama_guru, "jk"=>$datalogin->jenis_kelamin, "level"=>$datalogin->level);
				$this->session->set_userdata($arraysession);
			redirect("Welcome");
		}else{
			redirect('login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect("login");
	}

	public function daftar(){
		$this->load->view("konfigurasi/templatedaftar");
	}

	public function sign_up(){
		$field['username'] = $this->input->post("i_username");
		$field['password'] = md5($this->input->post("i_password"));
		$field['nama_user'] = $this->input->post("i_namapengguna");
		$field['pertanyaan_reset'] = $this->input->post("i_pertanyaan");
		$field['jawaban'] = $this->input->post("i_jawaban");

		$this->db->insert("tb_user", $field);

		redirect('login');
	}
}
