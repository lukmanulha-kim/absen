<?php
class absensi_models extends CI_Model {
	public function queryAll($tb_name){
		$q = $this->db->get($tb_name);
		return $q;
	}

	public function whereQuery($tb_name, $field, $parameter){
		$this->db->where($field, $parameter);
		$q = $this->db->get($tb_name);
		return $q;
	}

	public function insert_multiple($tb_name,$data){
		$this->db->insert_batch($tb_name, $data);
	}

	public function insert_rombel($kd_kelas, $kd_siswa, $status){
		$result = array();
		foreach ($kd_siswa as $key => $value) {
			$result[] = array(
				'kd_kelas' => $kd_kelas,
				'kd_siswa' => $_POST['i_kdsiswa'][$key],
				'status' => $status
			);
		}
		$this->db->insert_batch('tb_rombel', $result);
	} 

	public function update_rombel($kd_kelas, $kd_siswa, $status){
		$result = array();

		$this->db->delete('tb_rombel', array('kd_kelas'=>$kd_kelas));

		foreach ($kd_siswa as $key => $value) {
			$result[] = array(
				'kd_kelas' => $kd_kelas,
				'kd_siswa' => $_POST['i_kdsiswa'][$key],
				'status' => $status
			);
		}
		$this->db->insert_batch('tb_rombel', $result);
	}

}
?>