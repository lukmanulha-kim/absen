<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
	private $filename = "import_data_guru";
	public function index(){
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		if ($this->session->userdata("uname")=="") {
				redirect("login");
			}
		$data['guru'] = $this->absensi_models->queryAll('tb_guru');
		$this->load->view('template/header', $data);
		$this->load->view('guru/v_guru', $data);
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
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		if ($this->session->userdata("uname")=="") {
				redirect("login");
			}
		$this->load->view('template/header', $data);
		$this->load->view('guru/v_tambah');
		$this->load->view('template/footer');
	}

	public function add(){
		$field['nip'] = $this->input->post("i_nip");
		$field['nama_guru'] = $this->input->post("i_namaguru");
		$field['jenis_kelamin'] = $this->input->post("i_jk");
		$field['alamat'] = $this->input->post("i_alamat");
		$field['tpt_lahir'] = $this->input->post("i_tptlahir");
		$field['tgl_lahir'] = $this->input->post("i_tgllahir");
		$field['uname'] = $this->input->post("i_username");
		$field['pwd'] = md5($this->input->post("i_pwd"));
		$field['status'] = "Aktif";

		$this->db->insert('tb_guru', $field);
		redirect('guru');
 	}

 	public function edit($id){
 		$ID = decrypt_url($id);
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$data['detail'] = $this->absensi_models->whereQuery('tb_guru', 'nip', $ID)->row();
		$this->load->view('template/header', $data);
		$this->load->view('guru/v_edit', $data);
		$this->load->view('template/footer');
	}

	public function edgur($id){
 		$ID = decrypt_url($id);
		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$data['detail'] = $this->absensi_models->whereQuery('tb_guru', 'nip', $ID)->row();
		$this->load->view('template/header', $data);
		$this->load->view('guru/v_edgur', $data);
		$this->load->view('template/footer');
	}

	public function update(){
		$ID = $this->input->post("i_nip");
		$field['nama_guru'] = $this->input->post("i_namaguru");
		$field['jenis_kelamin'] = $this->input->post("i_jk");
		$field['alamat'] = $this->input->post("i_alamat");
		$field['tpt_lahir'] = $this->input->post("i_tptlahir");
		$field['tgl_lahir'] = $this->input->post("i_tgllahir");
		$field['uname'] = $this->input->post("i_username");
		$PWD = $this->input->post("i_pwd");
		if (empty($PWD)) {
			$field['pwd'] = $this->input->post("i_pwd2");
		}else{
			$field['pwd'] = $this->input->post("i_pwd");
		}

		$this->db->where('nip', $ID);
		$this->db->update('tb_guru', $field);
		redirect('guru');
 	}

 	public function upgur(){
		$ID = $this->input->post("i_nip");
		$field['nama_guru'] = $this->input->post("i_namaguru");
		$field['jenis_kelamin'] = $this->input->post("i_jk");
		$field['alamat'] = $this->input->post("i_alamat");
		$field['tpt_lahir'] = $this->input->post("i_tptlahir");
		$field['tgl_lahir'] = $this->input->post("i_tgllahir");
		$field['uname'] = $this->input->post("i_username");
		$PWD = $this->input->post("i_pwd");
		if (empty($PWD)) {
			$field['pwd'] = $this->input->post("i_pwd2");
		}else{
			$field['pwd'] = md5($this->input->post("i_pwd"));
		}

		$this->db->where('nip', $ID);
		$this->db->update('tb_guru', $field);
		redirect('Welcome');
 	}

 	public function upload(){

 		if ($this->session->userdata("uname")=="") {
				redirect("login");
			}

		$data['semester'] = $this->absensi_models->whereQuery('tb_komponen','status','Aktif')->row();
		$this->load->view('template/header', $data);
		$this->load->view('guru/v_upload');
		$this->load->view('template/footer');
	}
}
?>