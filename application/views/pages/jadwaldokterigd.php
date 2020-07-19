<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">JADWAL</h1>
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
      <a class="nav-item nav-link active" href="<?php echo base_url()?>/igd/jadwaldokterigd">DOKTER<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="<?php echo base_url()?>/igd/jadwalperawatigd">PERAWAT</a>
      
    </div>
  </div>
</nav>




<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah Jadwal</button>
        <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Hari</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Waktu</th>
                </tr>
              </thead>
              <tbody>
                      <?php 
                      $no = 1;
      
      foreach ($jadwaldokter as $nomer): ?>
                <tr>
                  <th scope="row"><?php echo $no++ ?></th>
                  <td><?php echo $nomer->hari ?></td>
                  <td><?php echo $nomer->nama ?></td>
                  <td><?php echo $nomer->waktu ?></td>

                        <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor ('igd/hapusjadwaldokterigd/'.$nomer->id_jadwaldokter, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
              
                </tr>
                <?php endforeach; ?>
              </tbody>
         </table>


                                 


 
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">FORM INPUT Jadwal Dokter</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'igd/tambah_jadwaldokterigd'; ?>">
        <div class="form-group">
          <label>Dokter</label>
            <select name="nama" id="nama" class="form-control">
                <option>Pilih Dokter</option>
                <option>Nurly Hestika Wardhani, dr, MG</option>
                <option>Dyah Hajuni Ambarsari, drg, Sp</option>

              </select>
        </div>
            <div class="form-grup">
              <label>Hari</label>
              <select name="hari" id="hari" class="form-control">
                <option>Pilih Hari</option>
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jum'at</option>
                <option>Sabtu</option>
                <option>Minggu</option>
              </select>
            </div>
        <div class="form-group">
          <label>Waktu</label>
                        <select name="waktu" id="hari" class="form-control">
                <option>Pilih Waktu</option>
                <option>Pagi</option>
                <option>Siang</option>
                <option>Malam</option>

              </select>
        </div>

      

        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
</div>