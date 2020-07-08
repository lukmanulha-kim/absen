<?php  ?>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
            </div>
            <div class="card-body">
              <form action="<?php echo base_url('mapel/update') ?>" method="post" accept-charset="utf-8">
                <div class="form-group" hidden>
                  <input type="text" name="i_id" value="<?php echo $detail->id_mapel ?>" class="form-control">
                </div>
                <div class="form-group">
                  <b>Status</b>
                  <select name="i_status" class="form-control">
                    <?php if ($detail->status == 'Aktif') { ?>
                      <option value="<?php echo $detail->status ?>"><?php echo $detail->status ?></option>
                      <option value="Tidak Aktif">Tidak Aktif</option>
                    <?php }else{ ?>
                      <option value="<?php echo $detail->status ?>"><?php echo $detail->status ?></option>
                      <option value="Aktif">Aktif</option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <b>Nama Mapel</b>
                  <input type="text" name="i_namamapel" value="<?php echo $detail->nama_mapel ?>" class="form-control">
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