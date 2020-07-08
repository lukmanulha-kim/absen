<?php ?>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Kehadiran</h6>
             <!--  <a href="<?php echo base_url('rombel/tambah')?>" class="btn btn-sm btn-primary float-right"> <i class="fas fa-plus"></i> Tambah Data</a> -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Rombel</th>
                      <th>Jumlah Siswa</th>
                      <th>Mapel</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Rombel</th>
                      <th>Jumlah Siswa</th>
                      <th>Mapel</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php $no = 1; foreach ($rombel->result() as $data_rombel) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><a href="<?php echo base_url() ?>kehadiran/lihat_absen/<?php echo encrypt_url($data_rombel->id_kelas) ?>"><?php echo $data_rombel->nama_kelas; ?></a></td>
                      <td><?php echo $data_rombel->jumlah; ?></td>
                      <td><?php echo $data_rombel->nama_mapel; ?></td>
                      <td>
                        <center>
                          <?php 
                          $dateNow = date('Y-m-d'); 
                          $jumlahAbsen = $this->db->query("SELECT COUNT(tgl_absen) as jumlahTgl From tb_absensi where tgl_absen = '$dateNow' and kd_kelas='$data_rombel->kd_kelas'")->row();
                          if ($jumlahAbsen->jumlahTgl==0) { 
                          ?>
                             <a href="<?php echo base_url() ?>kehadiran/absen/<?php echo encrypt_url($data_rombel->id_rombel) ?>" title="Absen" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Isi Absensi</a>
                          <?php }else{ ?>
                             <!-- <a href="<?php echo base_url() ?>kehadiran/lihat_absen/<?php echo encrypt_url($data_rombel->id_rombel) ?>" title="Lihat Absen" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Lihat Absensi</a> -->
                          <?php } ?>
                          <a href="<?php echo base_url() ?>kehadiran/rekap_absen/<?php echo encrypt_url($data_rombel->id_rombel) ?>" title="Rekap" class="btn btn-sm btn-success"><i class="fas fa-chart-area"></i> Rekap Absensi</a>
                        </center>
                      </td>
                    </tr>
                	<?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->