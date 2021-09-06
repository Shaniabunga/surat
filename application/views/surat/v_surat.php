              <div class="col-md-12">
                <h3>Arsip Surat</h3>
              </div>
              <div class="col-md-12">
              <h4><?php echo $this->session->flashdata('message'); ?></h4>
              </div>
              <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nomor</th>
                  <th>Judul</th>
                  <th>Kategori</th>
                  <th>Waktu Pengarsipan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($surat as $rows) { ?>
               
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $rows['nomor_surat']; ?></td>
                  <td><?php echo $rows['judul_surat']; ?></td>
                  <td><?php echo $rows['kategori_surat']; ?> </td>
                  <td><?php echo $rows['tanggal_surat']; ?> </td>
                  <td>
                    <a onClick="javascript: return confirm('Apakah anda yakin ingin menghapus arsip surat ini?');" href="<?php echo base_url(); ?>surat/data_hapus/<?php echo $rows['id_surat'] ?>" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i> Hapus</a>
                    <a href="<?php echo base_url().'surat/download/'.$rows['file'] ?>" class="btn btn-warning btn-xs"><i class="ace-icon fa fa-download"></i> Unduh</a>
                    <a href="<?php echo base_url(); ?>surat/lihat_data/<?php echo $rows['id_surat']; ?>" class="btn btn-primary btn-xs" title="Lihat"><i class="fa fa-detail"></i> Lihat >></a>
                    <a href="<?php echo base_url(); ?>surat/edit_data/<?php echo $rows['id_surat']; ?>" class="btn btn-success btn-xs" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
                  </td>
                </tr>
                <?php $no++ ?>
              <?php } ?>
            </tbody>
          </table>
          <a href="<?php echo base_url(); ?>surat/tambah_data" class="btn btn-info" style="margin-bottom:20px; "><i class="fa fa-plus"></i> Arsipkan Surat</a>
