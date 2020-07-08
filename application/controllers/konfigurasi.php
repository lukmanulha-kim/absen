<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class konfigurasi extends CI_Controller {
	public function index(){
		if ($this->session->userdata("uname")=="") {
				redirect("login");
			}
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$this->load->view('template/header', $data);
		$this->load->view('konfigurasi/v_konfigurasi');
		$this->load->view('template/footer');
	}

	public function add(){
		$field['semester'] = $this->input->post("i_semester");
		$field['tahun_ajaran'] = $this->input->post("i_tahunajaran");
		$field['status'] = 'Aktif';

		$tambah = $this->db->insert("tb_komponen", $field);
		if ($tambah) {
			$data = $this->db->query("SELECT max(id_komponen) as terbesar from tb_komponen")->row();
			$terbesar = $data->terbesar;
			$fieldd['status'] = 'Tidak Aktif';

			$this->db->query("UPDATE tb_komponen SET status='Tidak Aktif' Where id_komponen!=$terbesar");
			redirect('konfigurasi');
		}
	}
}

?>