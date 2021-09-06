            <div class="col-md-12">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data About</h3>
            </div>
            </div>

            <form action="<?php echo base_url(); ?>about/submit_edit_data/<?php echo $data_about['id_about'] ?>" method="post" enctype="multipart/form-data" role="form">
              <div class="box-body">

              <div class="col-md-12">
                <div class="form-group">
                  <label>Nama</label>
                  <input required="" type="text" class="form-control" name="nama_about" placeholder="" value="<?php echo $data_about['nama_about'] ?>"  >
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Nim</label>
                  <input required="" type="text" class="form-control" name="nim_about" placeholder="" value="<?php echo $data_about['nim_about'] ?>"  >
                </div>
              </div>

                <div class="col-md-4">
                    <label>Tanggal</label>
                    <input required="" type="date" class="form-control" name="tanggal_about" placeholder="" value="<?php echo $data_about['tanggal_about'] ?>"  >
                </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" name="foto_about">
                </div>
              </div>

              </div>
              <div class="col-md-12">
              <div class="box-footer">
                <a href="<?php echo base_url().'about'?>" class="btn btn-info"> Kembali</a>
                <button type="submit" name="submit" class="btn btn-success btn"><i class="fa fa-paper-plane"></i>Save</button>
              </div>
              </div>
            </form>