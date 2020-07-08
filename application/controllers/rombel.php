<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rombel extends CI_Controller {
	public function index(){
		if ($this->session->userdata("uname")=="") {
				redirect("login");
			}
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$data['rombel'] = $this->db->query('SELECT Count(tb_rombel.kd_kelas) AS jumlah, tb_rombel.id_rombel, tb_kelas.status, tb_kelas.nama_kelas FROM tb_kelas Inner Join tb_rombel ON  tb_kelas.id_kelas = tb_rombel.kd_kelas Inner Join tb_siswa ON tb_siswa.nis = tb_rombel.kd_siswa where tb_kelas.status="Aktif" group by tb_rombel.kd_kelas');
		
		$this->load->view('template/header', $data);
		$this->load->view('rombel/v_rombel', $data);
		$this->load->view('template/footer');
	}

	public function tambah(){
		if ($this->session->userdata("uname")=="") {
				redirect("login");
			}
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$data['kelas'] = $this->absensi_models->whereQuery('tb_kelas', 'status', 'Aktif');
		$this->load->view('template/header', $data);
		$this->load->view('rombel/v_tambah', $data);
		$this->load->view('template/footer');
	}

	public function add(){
		// $nama_rombel = $this->input->post("i_namarombel");
		$kd_kelas = $this->input->post("i_kdkelas");
		$kd_siswa = $this->input->post("i_kdsiswa");
		$status = "Aktif";

		$this->absensi_models->insert_rombel($kd_kelas, $kd_siswa, $status);	
		redirect('rombel');
 	}

 	public function edit($id){
 		$ID = decrypt_url($id);
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$data['siswa'] = $this->db->query('SELECT * FROM tb_siswa WHERE NOT EXISTS ( SELECT * FROM tb_rombel WHERE tb_siswa.nis = tb_rombel.kd_siswa )');
		$data['detail_kelas'] = $this->db->query('SELECT * FROM tb_rombel inner join tb_kelas on tb_rombel.kd_kelas=tb_kelas.id_kelas inner join tb_siswa on tb_rombel.kd_siswa=tb_siswa.nis where tb_rombel.id_rombel = "'.$ID.'"')->row();
		$data['detail_rombel'] = $this->db->query('SELECT * FROM tb_rombel inner join tb_kelas on tb_rombel.kd_kelas=tb_kelas.id_kelas inner join tb_siswa on tb_rombel.kd_siswa=tb_siswa.nis where tb_rombel.kd_kelas = "'.$data['detail_kelas']->kd_kelas.'"');
		$this->load->view('template/header', $data);
		$this->load->view('rombel/v_edit', $data);
		$this->load->view('template/footer');
	}

	public function update(){
		$ID = $this->input->post("i_id");
		$kd_kelas = $this->input->post("i_id");
		$kd_siswa = $this->input->post("i_kdsiswa");
		$status = "Aktif";

		$this->absensi_models->update_rombel($kd_kelas, $kd_siswa, $status);	
		redirect('rombel');
 	}

 	public function hapus($id){
		$ID = decrypt_url($id);

		$data['hapus'] = $this->absensi_models->whereQuery('tb_rombel', 'id_rombel', $ID)->row();

		$tables = array('tb_rombel', 'tb_absensi');
		$this->db->where('kd_kelas', $data['hapus']->kd_kelas);
		$this->db->delete($tables);
			
		redirect('rombel');
 	}
}
?>