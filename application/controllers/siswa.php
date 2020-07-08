<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class siswa extends CI_Controller {
	private $filename = "import_data_siswa";
	public function index(){
		if ($this->session->userdata("uname")=="") {
				redirect("login");
			}
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$data['siswa'] = $this->absensi_models->queryAll('tb_siswa');
		$this->load->view('template/header', $data);
		$this->load->view('siswa/v_siswa', $data);
		$this->load->view('template/footer');
	}

	public static function TglIndo($date){
		$str = explode('-', $date);

		$bulan = array(
			'01' => 'Jan',
			'02' => 'Feb',
			'03' => 'Mar',
			'04' => 'Apr',
			'05' => 'Mei',
			'06' => 'Jun',
			'07' => 'Jul',
			'08' => 'Agu',
			'09' => 'Sep',
			'10' => 'Okt',
			'11' => 'Nov',
			'12' => 'Des');

		return $str[2]." ".$bulan[$str[1]]." ".$str[0];
	}

	public function tambah(){
		if ($this->session->userdata("uname")=="") {
				redirect("login");
			}
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$this->load->view('template/header', $data);
		$this->load->view('siswa/v_tambah');
		$this->load->view('template/footer');
	}

	public function add(){
		$field['nis'] = $this->input->post("i_nis");
		$field['nisn'] = $this->input->post("i_nisn");
		$field['nama_siswa'] = $this->input->post("i_namasiswa");
		$field['jenis_kelamin'] = $this->input->post("i_jk");
		$field['alamat'] = $this->input->post("i_alamat");
		$field['tpt_lahir'] = $this->input->post("i_tptlahir");
		$field['tgl_lahir'] = $this->input->post("i_tgllahir");
		$field['status'] = "Aktif";

		$this->db->insert('tb_siswa', $field);
		redirect('siswa');
 	}

 	public function edit($id){
 		$ID = decrypt_url($id);
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$data['detail'] = $this->absensi_models->whereQuery('tb_siswa', 'nis', $ID)->row();
		$this->load->view('template/header', $data);
		$this->load->view('siswa/v_edit', $data);
		$this->load->view('template/footer');
	}

	public function update(){
		$ID = $this->input->post("i_nis");
		$field['status'] = $this->input->post("i_status");
		$field['nisn'] = $this->input->post("i_nisn");
		$field['nama_siswa'] = $this->input->post("i_namasiswa");
		$field['jenis_kelamin'] = $this->input->post("i_jk");
		$field['alamat'] = $this->input->post("i_alamat");
		$field['tpt_lahir'] = $this->input->post("i_tptlahir");
		$field['tgl_lahir'] = $this->input->post("i_tgllahir");

		$this->db->where('nis', $ID);
		$this->db->update('tb_siswa', $field);
		redirect('siswa');
 	}

 	public function upload(){
 		if ($this->session->userdata("uname")=="") {
				redirect("login");
			}
 		
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$this->load->view('template/header', $data);
		$this->load->view('siswa/v_upload', $data);
		$this->load->view('template/footer');
	}
}
?>