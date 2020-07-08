<?php  ?>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
            </div>
            <div class="card-body">
              <form action="<?php echo base_url('mengajar/update') ?>" method="post" accept-charset="utf-8">
                <div class="form-group" hidden>
                  <input type="text" name="i_id" value="<?php echo $detail->id_penugasan ?>" class="form-control">
                </div>
                <div class="form-group">
                  <b>Nama Guru</b>
                  <select name="i_namaguru" class="form-control js-example-basic-single" required>
                    <option value="<?php echo $detail->kd_guru ?>"><?php echo $detail->nama_guru ?></option>
                    <?php foreach ($guru->result() as $data_guru) {
                      echo "<option value='$data_guru->nip'>$data_guru->nama_guru</option>";
                    } ?>
                  </select>
                </div>
                <div class="form-group">
                  <b>Nama Mapel</b>
                  <select name="i_namamapel" class="form-control js-example-basic-single" required>
                    <option value="<?php echo $detail->kd_mapel ?>"><?php echo $detail->nama_mapel ?></option>
                    <?php foreach ($mapel->result() as $data_mapel) {
                      echo "<option value='$data_mapel->id_mapel'>$data_mapel->nama_mapel</option>";
                    } ?>
                  </select>
                </div>
                <div class="form-group">
                  <b>Nama Kelas</b>
                  <select name="i_namakelas" class="form-control js-example-basic-single" required>
                    <option value="<?php echo $detail->kd_kelas ?>"><?php echo $detail->nama_kelas ?></option>
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

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->