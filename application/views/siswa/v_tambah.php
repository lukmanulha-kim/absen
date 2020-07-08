<?php  ?>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
              <a href="<?php echo base_url('siswa/upload')?>" class="btn btn-sm btn-primary float-right"> <i class="fas fa-upload"></i> Upload Data</a>
            </div>
            <div class="card-body">
              <div class="row">
              	<div class="col-md-6">
	              <form action="<?php echo base_url('siswa/add') ?>" method="post" accept-charset="utf-8">
	                <div class="form-group">
	                  <b>NIS</b>
	                  <input type="text" name="i_nis" placeholder="No Induk Siswa" class="form-control" autofocus>
	                </div>
	                <div class="form-group">
	                  <b>NISN</b>
	                  <input type="text" name="i_nisn" placeholder="No Induk Siswa Nasional" class="form-control">
	                </div>
	                <div class="form-group">
	                  <b>Nama Siswa</b>
	                  <input type="text" name="i_namasiswa" placeholder="Nama Siswa" class="form-control">
	                </div>
	                <div class="form-group">
	                  <b>Jenis Kelamin</b><br>
	                  <input type="radio" name="i_jk" value="L" id="lk"><label for="lk">&nbsp;Laki-Laki</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                  <input type="radio" name="i_jk" value="P" id="pr"><label for="pr">&nbsp;Perempuan</label>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <div class="form-group">
	                  <b>Alamat</b>
	                  <textarea class="form-control" name="i_alamat"></textarea>
	                </div>
	                <div class="form-group">
	                  <b>Tempat Lahir</b>
	                  <input type="text" name="i_tptlahir" placeholder="Tempat Lahir" class="form-control">
	                </div>
	                <div class="form-group">
	                  <b>Tanggal Lahir</b>
	                  <input type="date" name="i_tgllahir" placeholder="Tanggal Lahir" class="form-control">
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