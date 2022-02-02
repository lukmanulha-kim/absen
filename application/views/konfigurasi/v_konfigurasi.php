<?php  ?>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Konfigurasi </h6>
            </div>
            <div class="card-body">
              <form action="<?php echo base_url('index.php/konfigurasi/add') ?>" method="post" accept-charset="utf-8">
                <div class="form-group">
                  <select name="i_semester" class="form-control">
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" name="i_tahunajaran" value="<?php echo date('Y'); ?>/<?php echo date('Y')+1; ?>" class="form-control">
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