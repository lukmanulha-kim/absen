<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index(){
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$data['siswa'] = $this->db->query("SELECT COUNT(nis) as jumlahSiswa from tb_siswa where status='Aktif'")->row();
		$data['guru'] = $this->db->query("SELECT COUNT(nip) as jumlahGuru from tb_guru where status='Aktif'")->row();
		
		if ($this->session->userdata("uname")=="") {
				redirect("login");
			}
			$this->load->view('template/header', $data);
			$this->load->view('template/isi', $data);
			$this->load->view('template/footer');
	}
}
?>