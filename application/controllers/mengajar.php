<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mengajar extends CI_Controller {
	public function index(){
		if ($this->session->userdata("uname")=="") {
				redirect("login");
			}
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$data['mengajar'] = $this->db->query("SELECT tb_guru.nama_guru,tb_mapel.nama_mapel, tb_kelas.nama_kelas, tb_penugasan.id_penugasan FROM tb_penugasan Inner Join tb_guru ON tb_guru.nip = tb_penugasan.kd_guru Inner Join tb_mapel ON tb_mapel.id_mapel = tb_penugasan.kd_mapel Inner Join tb_kelas ON tb_kelas.id_kelas = tb_penugasan.kd_kelas");
		$data['guru'] = $this->absensi_models->whereQuery('tb_guru','status','Aktif');
		$data['kelas'] = $this->absensi_models->whereQuery('tb_kelas','status','Aktif');
		$data['mapel'] = $this->absensi_models->whereQuery('tb_mapel','status','Aktif');
		$this->load->view('template/header', $data);
		$this->load->view('mengajar/v_mengajar', $data);
		$this->load->view('template/footer');
	}

	public function tambah(){
		if ($this->session->userdata("uname")=="") {
				redirect("login");
			}
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$this->load->view('template/header', $data);
		$this->load->view('mengajar/v_tambah');
		$this->load->view('template/footer');
	}

	public function add(){
		$kodeGuru = $this->input->post("i_namaguru");
		$kodeKelas = $this->input->post("i_namakelas");
		$kodeMapel = $this->input->post("i_namamapel");
		$field['kd_guru'] = $kodeGuru;
		$field['kd_mapel'] = $kodeMapel;
		$field['kd_kelas'] = $kodeKelas;

		$cek['penugasan'] = $this->db->query("SELECT * FROM tb_penugasan where kd_guru='$kodeGuru' AND kd_kelas='$kodeKelas' AND kd_mapel='$kodeMapel'")->row();

		if ($cek['penugasan']->id_penugasan==0) {
			$this->db->insert('tb_penugasan', $field);
			redirect('mengajar');
		}else{
			echo "Data Sudah Ada";
		}

 	}

 	public function edit($id){
 		$ID = decrypt_url($id);
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$data['guru'] = $this->db->query('SELECT * FROM tb_guru WHERE NOT EXISTS ( SELECT * FROM tb_penugasan WHERE tb_guru.nip = tb_penugasan.kd_guru )');
		$data['kelas'] = $this->db->query('SELECT * FROM tb_kelas WHERE NOT EXISTS ( SELECT * FROM tb_penugasan WHERE tb_kelas.id_kelas = tb_penugasan.kd_kelas )');
		$data['mapel'] = $this->db->query('SELECT * FROM tb_mapel WHERE NOT EXISTS ( SELECT * FROM tb_penugasan WHERE tb_mapel.id_mapel = tb_penugasan.kd_mapel )');
		$data['detail'] = $this->db->query("SELECT * FROM tb_penugasan inner join tb_guru on tb_penugasan.kd_guru=tb_guru.nip inner join tb_kelas on tb_penugasan.kd_kelas=tb_kelas.id_kelas inner join tb_mapel on tb_penugasan.kd_mapel=tb_mapel.id_mapel where tb_penugasan.id_penugasan='".$ID."'")->row();
		$this->load->view('template/header', $data);
		$this->load->view('mengajar/v_edit', $data);
		$this->load->view('template/footer');
	}

	public function update(){
		$ID = $this->input->post("i_id");
		$field['kd_guru'] = $this->input->post("i_namaguru");
		$field['kd_mapel'] = $this->input->post("i_namamapel");
		$field['kd_kelas'] = $this->input->post("i_namakelas");

		$this->db->where('id_penugasan', $ID);
		$this->db->update('tb_penugasan', $field);
		redirect('mengajar');
 	}
}
?>