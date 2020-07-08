<?php ?>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Ujian</h6>
              <a href="<?php echo base_url('ujian/tambah')?>" class="btn btn-sm btn-primary float-right"> <i class="fas fa-plus"></i> Tambah Data</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Ujian</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Ujian</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php $no = 1; foreach ($ujian->result() as $data_ujian) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $data_ujian->nama_ujian; ?></td>
                      <td><a href="<?php echo base_url() ?>ujian/edit/<?php echo encrypt_url($data_ujian->nip) ?>" title="Edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a></td>
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