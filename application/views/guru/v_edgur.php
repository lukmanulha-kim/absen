<?php  ?>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
            </div>
            <div class="card-body">
              <div class="row">
              	<div class="col-md-6">
	              <form action="<?php echo base_url('guru/upgur') ?>" method="post" accept-charset="utf-8">
	              	<div class="form-group" hidden>
	                  <b>Status guru</b><br>
	                  <input type="radio" name="i_status" value="Aktif" <?php if($detail->status=='Aktif'){echo 'checked';} ?> id="aktif"><label for="aktif">&nbsp;Aktif</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                  <input type="radio" name="i_status" value="Mutasi" <?php if($detail->status=='Mutasi'){echo 'checked';} ?> id="mutasi"><label for="mutasi">&nbsp;Mutasi</label>
	                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                  <input type="radio" name="i_status" value="Alumni" <?php if($detail->status=='Alumni'){echo 'checked';} ?> id="alumni"><label for="alumni">&nbsp;Mutasi</label>    
	                </div>
	                <div class="form-group">
	                  <b>NIP</b>
	                  <input type="text" name="i_nip" value="<?php echo $detail->nip ?>" class="form-control" readonly>
	                </div>
	                <div class="form-group">
	                  <b>Nama guru</b>
	                  <input type="text" name="i_namaguru" value="<?php echo $detail->nama_guru ?>" class="form-control">
	                </div>
	                <div class="form-group">
	                  <b>Jenis Kelamin</b><br>
	                  <input type="radio" name="i_jk" value="L" <?php if($detail->jenis_kelamin=='L'){echo 'checked';} ?> id="lk"><label for="lk">&nbsp;Laki-Laki</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                  <input type="radio" name="i_jk" value="P" <?php if($detail->jenis_kelamin=='P'){echo 'checked';} ?> id="pr"><label for="pr">&nbsp;Perempuan</label>
	                </div>
	                <div class="form-group">
	                  <b>Alamat</b>
	                  <textarea class="form-control" name="i_alamat"><?php echo $detail->alamat ?></textarea>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <div class="form-group">
	                  <b>Tempat Lahir</b>
	                  <input type="text" name="i_tptlahir" value="<?php echo $detail->tpt_lahir ?>" class="form-control">
	                </div>
	                <div class="form-group">
	                  <b>Tanggal Lahir</b>
	                  <input type="date" name="i_tgllahir" value="<?php echo $detail->tgl_lahir ?>" class="form-control">
	                </div>
	                <div class="form-group">
	                  <b>Username</b>
	                  <input type="text" name="i_username" value="<?php echo $detail->uname ?>" class="form-control">
	                </div>
	                <div class="form-group">
	                  <b>Password</b>
	                  <input type="password" name="i_pwd" value="" class="form-control">
	                  <span>Kosongi Jika Tidak Ingin Merubah Kata Sandi</span>
	                </div>
	                <div class="form-group" hidden>
	                  <b>Password</b>
	                  <input type="password" name="i_pwd2" value="<?php echo $detail->pwd ?>" class="form-control">
	                </div>
	                <div class="form-group" hidden>
	                  <b>Level User</b>
	                  <input type="text" name="i_level" value="<?php echo $detail->level ?>" class="form-control">
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