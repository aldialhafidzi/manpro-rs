<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Inventory</h1>
                </div>
            </div>
        </div>
    </div>



<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="http://[::1]/manproigd/igd/inventoryobatigd">OBAT <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="http://[::1]/manproigd/igd/inventorytindakanigd">TINDAKAN</a>
      
    </div>
  </div>
</nav>


<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah Obat</button>


        <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                      <?php 
      
      foreach ($obat as $nomer): ?>
                <tr>
                  <th scope="row"><?php echo $nomer->nama_inv ?></th>
                  <td><?php echo $nomer->nama_inv ?></td>
                  <td><?php echo "Rp. " . number_format($nomer->harga_inv, 0, ".", ".") ?></td>
                  <td><a href="<?= base_url() ?>igd/rekammedisawaldetail" class="btn btn-primary btn-lg active btn-sm" role="button" aria-pressed="true">Ubah</a>
        <a href="#" class="btn btn-danger active btn-sm" role="button" aria-pressed="true">Hapus </a></td>
              
                </tr>
                <?php endforeach; ?>
              </tbody>
         </table>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Input Obat</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'Poliklinik/tambah_aksi_obat'?>">
          <div class="form-grup">
            <label>Nama Obat</label>
            <input type="text" name="nama_drugs" class="form-control">
          </div>
          <div class="form-grup">
            <label>Harga</label>
            <input type="text" name="merk" class="form-control">
          </div>

          <div class="modal-footer">
              <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
          

                                 


 
</div>