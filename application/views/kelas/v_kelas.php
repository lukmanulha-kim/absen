<?php ?>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Kelas</h6>
              <a href="<?php echo base_url('kelas/tambah')?>" class="btn btn-sm btn-primary float-right"> <i class="fas fa-plus"></i> Tambah Data</a>
              <!-- <div class="dropdown no-arrow">
	            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
	            </a>
	            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
	              <div class="dropdown-header">Dropdown Header:</div>
	              <a class="dropdown-item" href="#">Action</a>
	              <a class="dropdown-item" href="#">Another action</a>
	              <div class="dropdown-divider"></div>
	              <a class="dropdown-item" href="#">Something else here</a>
	            </div>
	          </div> -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kelas</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Kelas</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php $no = 1; foreach ($kelas->result() as $data_kelas) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $data_kelas->nama_kelas; ?></td>
                      <td><?php echo $data_kelas->status; ?></td>
                      <td><a href="#" title="Edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a></td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
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