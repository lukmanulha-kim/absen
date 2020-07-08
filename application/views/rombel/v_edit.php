<?php  ?>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
            </div>
            <div class="card-body">
              <form action="<?php echo base_url('rombel/update') ?>" method="post" accept-charset="utf-8">
                <div class="form-group" hidden>
                  <b>Nama Rombel</b>
                  <input type="text" name="i_id" value="<?php echo $detail_kelas->id_kelas ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <b>Nama Rombel</b>
                  <input type="text" name="i_namarombel" value="<?php echo $detail_kelas->nama_kelas ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <b>Nama Siswa</b>
                  <select name="i_kdsiswa[]" class="form-control js-example-basic-multiple" multiple>
                  	<?php foreach ($detail_rombel->result() as $detailrombel) {?>
                      <option value="<?php echo $detailrombel->nis ?>" selected><?php echo $detailrombel->nama_siswa ?></option>
                    <?php } ?>
                    <?php foreach ($siswa->result() as $data_sisswa) {?>
                      <option value="<?php echo $data_sisswa->nis ?>"><?php echo $data_sisswa->nama_siswa ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <input type="submit" name="i_simpan" value="Simpan" class="btn btn-sm btn-primary">
                </div>
              </form>
            </div>
          </div>

        </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->