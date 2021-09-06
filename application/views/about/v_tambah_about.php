
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data About</h3>
            </div>
            <form action="<?php echo base_url(); ?>about/submit_simpan_data" method="post" enctype="multipart/form-data" role="form">
              <div class="box-body">

                <div class="form-group">
                  <label>Nama</label>
                  <input required="" type="text" class="form-control" name="nama_about" placeholder="" value="<?=set_value('nama_about')?>"  >
                </div>

                <div class="form-group">
                  <label>Nim</label>
                  <input required="" type="text" class="form-control" name="nim_about" placeholder="" value="<?=set_value('nim_about')?>"  >
                </div>

                <div class="form-group">
                  <label>Tanggal</label>
                  <input required="" type="date" class="form-control" name="tanggal_about" placeholder="" value="<?=set_value('tanggal_about')?>"  >
                </div>

                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" name="foto_about">
                </div>
                
              </div>
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-success btn"><i class="fa fa-paper-plane"></i>Save</button>
              </div>
            </form>