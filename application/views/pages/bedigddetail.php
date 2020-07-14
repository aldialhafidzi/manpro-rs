<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                
                    
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-12">

<div class="card">
  <div class="card-header">
         <?php foreach ($detail as $nomer) { ?>
          <div class="row">
            <div class="col-1">
              <label>Detail</label> 
            </div>
                        <div class="col-5">
              <label>NO BED IGD    :   00<?php echo $nomer->id ?> / NO PASIEN : 00<?php echo $nomer->id_pasien ?></label> 
            </div>

          </div>
            
          
    <?php } ?>
     
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-2">
        <p>Nama : <?php echo $nomer->nama ?></p>
      </div>
      <div class="col-2">
        <p>Kelamin : <?php echo $nomer->jenis_kelamin ?></p>
      </div>
      <div class="col-3">
        <p>Lahir : <?php echo $nomer->tanggal_lahir?></p>
      </div>

   
    </div>

    <div class="row">
      <div class="col-5">
        <p>Alamat : <?php echo $nomer->alamat ?> Telp.<?php echo $nomer->no_telp ?></p>
      </div>
                  <div class="col-3">
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-envelope o"></i> Buat Surat Sakit</button>

            </div>
    </div>


    
  </div>
</div>


<div class="card">
  <div class="card-header">
         <?php foreach ($detail as $nomer) { ?>
          <div class="row">
            <div class="col-2">
              <label>REKAM MEDIS</label> 
            </div>
                        <div class="col-5">
              <label>NO  :   00<?php echo $nomer->id_rekam_medis?> </label> 
            </div>
            <div class="col-3">
              <label></label> 
            </div>
          </div>
            
          
   
     
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-2">
        <p>Diagnosa :  <?php echo $nomer->diagnosa?></p>
      </div>
      <div class="col-2">
        <p>Status Gawat : <?php echo $nomer->darurat?></p>
      </div>
      <div class="col-2">
        <p>Dokter : Dyah Hajuni Ambarsari, drg, Sp</p>
      </div>
      <div class="col-2">
        <p>Perawat : Cindy</p>
      </div>
    </div>

<a class="btn btn-success" href="http://[::1]/manproigd/index.php/igd/rekammedisdetail/<?php echo $nomer->id_rekam_medis?>" role="button"><i class="fa fa-heartbeat"></i>Detail Rekam Medis</a>

<?php } ?>

    </div>
<!-- <table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Pelayanan</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Harga</th>
    </tr>
  </thead>
  <tbody>
                      <?php foreach ($detail2 as $nomer): ?>
                      <tr>
                        
                        <td><?php echo $nomer->id_obat ?></td>
                        <td><?php echo $nomer->id_tindakan ?></td>
                        <td><?php echo $nomer->id_transaksi ?></td>
                       
                        
                        <td><?php echo anchor('igd/pendaftaranigd/'.$nomer->id,'<div class="btn btn-success btn-sm">Daftar</i></div>') ?></td>
                        <td><?php echo anchor('igd/bedigddetail/'.$nomer->id,'<div class="btn btn-primary btn-sm">Detail</i></div>') ?></td>
                        <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor ('igd/kosongkan_bed/'.$nomer->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                              
                              
                      </tr>
                       <?php endforeach; ?>
  </tbody>
</table> -->
    
  </div>
</div>
      





  </div>



</div>