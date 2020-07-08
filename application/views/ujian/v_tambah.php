<?php  ?>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
            </div>
            <div class="card-body">
              <div class="row">
              	<div class="col-md-6">
	              <form action="<?php echo base_url('guru/add') ?>" method="post" accept-charset="utf-8">
	                <div class="form-group">
	                  <b>Mata Pelajaran</b>
	                  <select name="i_kdmapel" class="form-control js-example-basic-single">
	                  	<option value="">Pilih Kelas</option>
	                  	<?php foreach ($penugasan->result() as $datapenugasan) {?>
	                  		<option value="<?php echo $datapenugasan->id_mapel ?>"><?php echo $datapenugasan->nama_mapel.' '.$datapenugasan->nama_kelas?></option>
	                  	<?php } ?>
	                  </select>
	                </div>
	                <div class="form-group">
	                  <b>Nama Ujian</b>
	                  <input type="text" name="i_namaujian" placeholder="Nama Ujian" class="form-control">
	                </div>
	                <div class="form-group">
	                  <b>Tanggal Ujian</b>
	                  <input type="date" name="i_tglujian" placeholder="Tanggal Ujian" class="form-control">
	                </div>
	            </div>
	            <div class="col-md-6">
	                <div class="form-group">
	                  <b>Waktu Ujian</b>
	                  <input type="number" name="i_waktuujian" placeholder="Waktu Ujian" class="form-control">
	                </div>
	                <div class="form-group">
	                  <b>Keterangan</b>
	                  <textarea class="form-control" name="i_keterangan"></textarea>
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