<?php ?>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Siswa</h6>
              <a href="<?php echo base_url('siswa/tambah')?>" class="btn btn-sm btn-primary float-right"> <i class="fas fa-plus"></i> Tambah Data</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NISN</th>
                      <th>Nama Siswa</th>
                      <th>JK</th>
                      <th>Alamat</th>
                      <th>TTL</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>NISN</th>
                      <th>Nama Siswa</th>
                      <th>JK</th>
                      <th>Alamat</th>
                      <th>TTL</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php $no = 1; foreach ($siswa->result() as $data_siswa) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $data_siswa->nisn; ?></td>
                      <td><?php echo $data_siswa->nama_siswa; ?></td>
                      <td><?php if($data_siswa->jenis_kelamin=='L'){echo 'Laki-Laki';}else{echo 'Perempuan';} ?></td>
                      <td><?php echo $data_siswa->alamat; ?></td>
                      <td><?php echo $data_siswa->tpt_lahir.', '.siswa::tglIndo($data_siswa->tgl_lahir); ?></td>
                      <td><?php echo $data_siswa->status; ?></td>
                      <td><a href="<?php echo base_url() ?>siswa/edit/<?php echo encrypt_url($data_siswa->nis) ?>" title="Edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a></td>
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