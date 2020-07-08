<?php ?>
<!-- Begin Page Content -->
        <div class="container-fluid">
           <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">mengajar</h6>
                  <div class="dropdown no-arrow">
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
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  	<div class="card-body">
		              <div class="table-responsive">
		                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		                  <thead>
		                    <tr>
		                      <th>No</th>
		                      <th>Nama Guru</th>
		                      <th>Kelas</th>
		                      <th>Mapel</th>
		                      <th>Aksi</th>
		                    </tr>
		                  </thead>
		                  <tfoot>
		                    <tr>
		                      <th>No</th>
		                      <th>Nama Guru</th>
		                      <th>Kelas</th>
		                      <th>Mapel</th>
		                      <th>Aksi</th>
		                    </tr>
		                  </tfoot>
		                  <tbody>
		                  	<?php $no = 1; foreach ($mengajar->result() as $data_mengajar) { ?>
		                    <tr>
		                      <td style="text-align: center;"><?php echo $no++ ?></td>
		                      <td><?php echo $data_mengajar->nama_guru; ?></td>
		                      <td><?php echo $data_mengajar->nama_kelas; ?></td>
		                      <td><?php echo $data_mengajar->nama_mapel; ?></td>
		                      <td style="text-align: center;"><a href="<?php echo base_url()?>mengajar/edit/<?php echo  encrypt_url($data_mengajar->id_penugasan); ?>" title="Edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a></td>
		                    </tr>
		                	<?php } ?>
		                  </tbody>
		                </table>
		              </div>
		            </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                  <div class="dropdown no-arrow">
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
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <form action="<?php echo base_url('mengajar/add') ?>" method="post" accept-charset="utf-8">
	                <div class="form-group">
	                  <b>Nama Guru</b>
	                  <select name="i_namaguru" class="form-control js-example-basic-single" required>
	                  	<option value="">Pilih Guru</option>
	                  	<?php foreach ($guru->result() as $data_guru) {
	                  		echo "<option value='$data_guru->nip'>$data_guru->nama_guru</option>";
	                  	} ?>
	                  </select>
	                </div>
	                <div class="form-group">
	                	<b>Nama Mapel</b>
	                  <select name="i_namamapel" class="form-control js-example-basic-single" required>
	                  	<option value="">Pilih Mapel</option>
	                  	<?php foreach ($mapel->result() as $data_mapel) {
	                  		echo "<option value='$data_mapel->id_mapel'>$data_mapel->nama_mapel</option>";
	                  	} ?>
	                  </select>
	                </div>
	                <div class="form-group">
	                	<b>Nama Kelas</b>
	                  <select name="i_namakelas" class="form-control js-example-basic-single" required>
	                  	<option value="">Pilih Kelas</option>
	                  	<?php foreach ($kelas->result() as $data_kelas) {
	                  		echo "<option value='$data_kelas->id_kelas'>$data_kelas->nama_kelas</option>";
	                  	} ?>
	                  </select>
	                </div>
	                <div class="form-group">
	                  <input type="submit" name="i_simpan" value="Simpan" class="btn btn-sm btn-primary">
	                </div>
	              </form>
                </div>
              </div>
            </div>
          </div>          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->