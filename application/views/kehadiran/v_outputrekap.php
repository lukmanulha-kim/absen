<?php
// echo $semester->tahun_ajaran;
require('assets/fpdf/fpdf.php');
// echo $semester->tahun_ajaran;
// 
date_default_timezone_set('Asia/Jakarta');
if ($cek->jumlah==0) {
	$pdf = new FPDF('L','cm',array(21.5,33));
	$pdf->SetTitle('DATA KOSONG');
	$pdf->SetMargins(1, 1, 1);
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',24);
	$pdf->MultiCell(31,1,'DATA KOSONG :)',0,'C');
	$pdf->Output();
}else{

$pdf = new FPDF('L','cm',array(21.5,33));
$pdf->SetTitle('Rekap Absensi '.$kelas->nama_kelas.' '.$kelas->semester.' Tahun Ajaran '.$kelas->tahun_ajaran);
$pdf->SetMargins(1, 1, 1);
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->MultiCell(31,0.8,'Rekap Absensi '.$kelas->nama_kelas,0,'C');
$pdf->SetFont('Arial','B',14);
$pdf->MultiCell(31,0.8,'Semester '.$kelas->semester.' Tahun Ajaran '.$kelas->tahun_ajaran,0,'C');
$pdf->MultiCell(31,0.5,' ',0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(1,0.5,'',0,0,'C');
$pdf->Cell(4,0.5,'Mata Pelajaran',0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(7,0.5,': '.$kelas->nama_mapel,0,1);

$pdf->SetFont('Arial','',12);
$pdf->Cell(1,1.4,'No',1,0,'C');
$pdf->Cell(10,1.4,'Nama',1,0,'C');
$pdf->Cell(10,0.7,'Kehadiran',1,0,'C');
$pdf->Cell(5,1.4,'Jumlah Hadir',1,0,'C');
$pdf->Cell(5,1.4,'Jumlah Tidak Hadir',1,0,'C');
$pdf->Cell(0.5,0.7,' ',0,1,'C');
$pdf->Cell(11,0.7,' ',0,0,'C');
$pdf->Cell(2,0.7,'Hadir',1,0,'C');
$pdf->Cell(2,0.7,'Ijin',1,0,'C');
$pdf->Cell(2,0.7,'Sakit',1,0,'C');
$pdf->Cell(2,0.7,'Alfa',1,0,'C');
$pdf->Cell(2,0.7,'Telat',1,1,'C');
$no=1;
foreach ($absensi->result() as $data_absensi) {
	$pdf->Cell(1,0.7,$no++,1,0,'C');
	$pdf->Cell(10,0.7,$data_absensi->nama_siswa,1,0);
	$jumlahHadir = $this->db->query("SELECT count(kehadiran) as jumHadir from tb_absensi where kd_siswa='$data_absensi->kd_siswa' and kehadiran='H'")->row();
	$pdf->Cell(2,0.7,$jumlahHadir->jumHadir,1,0,'C');
	$jumlahIjin = $this->db->query("SELECT count(kehadiran) as jumIjin from tb_absensi where kd_siswa='$data_absensi->kd_siswa' and kehadiran='I'")->row();
	$pdf->Cell(2,0.7,$jumlahIjin->jumIjin,1,0,'C');
	$jumlahSakit = $this->db->query("SELECT count(kehadiran) as jumSakit from tb_absensi where kd_siswa='$data_absensi->kd_siswa' and kehadiran='S'")->row();
	$pdf->Cell(2,0.7,$jumlahSakit->jumSakit,1,0,'C');
	$jumlahAlfa = $this->db->query("SELECT count(kehadiran) as jumAlfa from tb_absensi where kd_siswa='$data_absensi->kd_siswa' and kehadiran='A'")->row();
	$pdf->Cell(2,0.7,$jumlahAlfa->jumAlfa,1,0,'C');
	$jumlahTelat = $this->db->query("SELECT count(kehadiran) as jumTelat from tb_absensi where kd_siswa='$data_absensi->kd_siswa' and kehadiran='T'")->row();
	$pdf->Cell(2,0.7,$jumlahTelat->jumTelat,1,0,'C');
	$pdf->Cell(5,0.7,$jumlahHadir->jumHadir+$jumlahTelat->jumTelat,1,0,'C');
	$pdf->Cell(5,0.7,$jumlahIjin->jumIjin+$jumlahSakit->jumSakit+$jumlahAlfa->jumAlfa,1,1,'C');
}

$pdf->MultiCell(31,0.8,' ',0,'C');
$pdf->Cell(21,0.6,' ',0,'C');
$pdf->Cell(10,0.6,'Bondowoso, '.kehadiran::TglIndo(date('Y-m-d')),0,1);
$pdf->Cell(21,0.6,' ',0,'C');
$pdf->Cell(10,0.6,'Mengetahui, ',0,1);
$pdf->Cell(21,0.6,' ',0,'C');
$pdf->Cell(10,0.6,'Guru Mapel '.$kelas->nama_mapel,0,1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(21,3.5,' ',0,'C');
$pdf->Cell(10,3.5,$this->session->userdata['uname'],0,1);

$pdf->Output("Rekap Absensi ".$kelas->nama_kelas." ".$kelas->semester." ".$kelas->tahun_ajaran.".pdf","I");

}
?>