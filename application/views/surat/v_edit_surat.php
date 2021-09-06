
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data Surat</h3>
            </div>

            <form action="<?php echo base_url(); ?>surat/submit_edit_data/<?php echo $data_surat['id_surat'] ?>" method="post" enctype="multipart/form-data" role="form">
              <div class="box-body">

                <div class="form-group">
                  <label>Nomor</label>
                  <input required="" type="text" class="form-control" name="nomor_surat" placeholder="" value="<?php echo $data_surat['nomor_surat'] ?>"  >
                </div>

                <div class="form-group">
                  <label>Judul</label>
                  <input required="" type="text" class="form-control" name="judul_surat" placeholder="" value="<?php echo $data_surat['judul_surat'] ?>"  >
                </div>

                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control" name="kategori_surat" required="">
                    <option value="">-- Pilih --</option>
                    <option value="Surat Biasa">Surat Biasa</option>
                    <option value="Surat Rahasia">Surat Rahasia</option>
                    <option value="Surat Undangan">Surat Undangan</option>
                    <option value="Surat Kilat">Surat Kilat</option>
                    <option value="Surat Intern">Surat Intern</option>
                    <option value="Surat Ekstern">Surat Ekstern</option>
                    <option value="Surat Edaran">Surat Edaran</option>
                    <option value="Surat Pengumuman">Surat Pengumuman</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>File Surat PDF</label>
                  <input type="file" name="file" required="">
                </div>

              </div>
              <div class="box-footer">
                <a href="<?php echo base_url().'surat'?>" class="btn btn-info"> Kembali</a>
                <button type="submit" name="submit" class="btn btn-success btn"><i class="fa fa-paper-plane"></i> Save</button>
              </div>
            </form>