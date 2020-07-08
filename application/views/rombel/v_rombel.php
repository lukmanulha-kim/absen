<?php ?>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Rombel</h6>
              <a href="<?php echo base_url('rombel/tambah')?>" class="btn btn-sm btn-primary float-right"> <i class="fas fa-plus"></i> Tambah Data</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Rombel</th>
                      <th>Jumlah Siswa</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Rombel</th>
                      <th>Jumlah Siswa</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php $no = 1; foreach ($rombel->result() as $data_rombel) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $data_rombel->nama_kelas; ?></td>
                      <td><?php echo $data_rombel->jumlah; ?></td>
                      <td><?php echo $data_rombel->status; ?></td>
                      <td>
                        <center>
                          <a href="<?php echo base_url() ?>rombel/edit/<?php echo encrypt_url($data_rombel->id_rombel) ?>" title="Edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a> 
                          <a href="<?php echo base_url() ?>rombel/hapus/<?php echo encrypt_url($data_rombel->id_rombel) ?>" title="Hapus" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Mau Menghapus?')"><i class="fas fa-trash"></i> Hapus</a>
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