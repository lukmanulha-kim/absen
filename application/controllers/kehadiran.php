<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kehadiran extends CI_Controller {
	public function index(){
		if ($this->session->userdata("uname")=="") {
				redirect("login");
			}
		$tanggal = date('Y-m-d');
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$data['rombel'] = $this->db->query("SELECT *, COUNT(tb_rombel.kd_kelas) as jumlah FROM tb_penugasan Inner Join tb_kelas ON tb_kelas.id_kelas = tb_penugasan.kd_kelas Inner Join tb_guru ON tb_guru.nip = tb_penugasan.kd_guru Inner Join tb_mapel ON tb_mapel.id_mapel = tb_penugasan.kd_mapel Inner Join tb_rombel ON tb_rombel.kd_kelas = tb_penugasan.kd_kelas WHERE tb_kelas.status='Aktif' AND tb_penugasan.kd_guru= '".$this->session->userdata['id_user']."' group by tb_rombel.kd_kelas");
		$data['absen'] = $this->db->query('SELECT COUNT(tgl_absen) as jumlahTgl, COUNT(kd_kelas) as jumlahKelas from tb_absensi where tgl_absen="'.$tanggal.'"')->row();
		$this->load->view('template/header', $data);
		$this->load->view('kehadiran/v_kehadiran', $data);
		$this->load->view('template/footer');
	}

	public function absen($id){
		$ID = decrypt_url($id);
		$dateNow = date('Y-m-d'); 
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();

		$this->load->view('template/header', $data);
		$this->load->view('kehadiran/v_absen');
		$this->load->view('template/footer');
	
	}

	public function lihat_absen($id){
		$ID = decrypt_url($id);
		$dateNow = date('Y-m-d'); 
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();

		$this->load->view('template/header', $data);
		$this->load->view('kehadiran/v_lihatabsen');
		$this->load->view('template/footer');
	}

	
 	public function rekap_absen($id){
 		$ID = decrypt_url($id);
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		
		$this->load->view('template/header', $data);
		$this->load->view('kehadiran/v_rekap');
		$this->load->view('template/footer');
	}

	public function outputrekap(){
		$kodeKelas = $this->input->post("i_kdkelas");
		$kodeSmt = $this->input->post("i_smt");
		$data['cek'] = $this->db->query("SELECT count(kd_kelas) as jumlah FROM tb_absensi where kd_kelas='$kodeKelas' AND smt='$kodeSmt'")->row();
		$data['kelas'] = $this->db->query("SELECT tb_komponen.semester, tb_komponen.tahun_ajaran, tb_absensi.tgl_absen, tb_siswa.nama_siswa, tb_absensi.kehadiran, tb_kelas.nama_kelas, tb_mapel.nama_mapel FROM tb_absensi Inner Join tb_komponen ON tb_komponen.id_komponen = tb_absensi.smt Inner Join tb_siswa ON tb_siswa.nis = tb_absensi.kd_siswa Inner Join tb_kelas ON tb_kelas.id_kelas = tb_absensi.kd_kelas Inner Join tb_mapel ON tb_mapel.id_mapel = tb_absensi.kd_mapel where tb_absensi.kd_kelas='$kodeKelas' AND tb_absensi.smt='$kodeSmt'")->row();
		$data['absensi'] = $this->db->query("SELECT * FROM tb_absensi Inner Join tb_komponen ON tb_komponen.id_komponen = tb_absensi.smt Inner Join tb_siswa ON tb_siswa.nis = tb_absensi.kd_siswa Inner Join tb_kelas ON tb_kelas.id_kelas = tb_absensi.kd_kelas where tb_absensi.kd_kelas='$kodeKelas' AND tb_absensi.smt='$kodeSmt' group by tb_absensi.kd_siswa");

		$this->load->view('kehadiran/v_outputrekap',$data);
	}

 	public function edit($id){
 		$ID = decrypt_url($id);
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$data['detail'] = $this->absensi_models->whereQuery('tb_kehadiran', 'id_kehadiran', $ID)->row();
		$this->load->view('template/header', $data);
		$this->load->view('kehadiran/v_edit', $data);
		$this->load->view('template/footer');
	}

	public function update(){
		$ID = $this->input->post("i_id");
		$field['status'] = $this->input->post("i_status");
		$field['nama_kehadiran'] = $this->input->post("i_namakehadiran");

		$this->db->where('id_kehadiran', $ID);
		$this->db->update('tb_kehadiran', $field);
		redirect('kehadiran');
 	}

 	public static function TglIndo($date){
		$str = explode('-', $date);

		$bulan = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember');

		return $str[2]." ".$bulan[$str[1]]." ".$str[0];
	}
}
?>