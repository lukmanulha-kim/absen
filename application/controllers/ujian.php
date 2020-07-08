<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ujian extends CI_Controller {
	private $filename = "import_data_guru";
	public function index(){
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		if ($this->session->userdata("uname")=="") {
				redirect("login");
			}
		$data['ujian'] = $this->absensi_models->queryAll('tb_ujian');
		$this->load->view('template/header', $data);
		$this->load->view('ujian/v_ujian', $data);
		$this->load->view('template/footer');
	}

	public function tambah(){
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		if ($this->session->userdata("uname")=="") {
				redirect("login");
			}
		$id_guru = $this->session->userdata("id_user");
		$data['penugasan'] = $this->db->query("SELECT tb_mapel.nama_mapel, tb_mapel.id_mapel, tb_guru.nip, tb_guru.nama_guru, tb_kelas.nama_kelas FROM tb_penugasan Inner Join tb_guru ON tb_guru.nip = tb_penugasan.kd_guru Inner Join tb_mapel ON tb_mapel.id_mapel = tb_penugasan.kd_mapel Inner Join tb_kelas ON tb_kelas.id_kelas = tb_penugasan.kd_kelas where tb_guru.nip = $id_guru");
		$this->load->view('template/header', $data);
		$this->load->view('ujian/v_tambah', $data);
		$this->load->view('template/footer');
	}
}
?>