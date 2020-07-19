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
         <?php foreach ($pasien as $nomer) { ?>
          <div class="row">
            <div class="col-1">
              <label>Detail</label> 
            </div>
                        <div class="col-5">
              <label>NO PASIEN : 00<?php echo $nomer->id_pasien ?></label> 
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
        <a target="_blank" class="btn btn-primary" href="<?php echo base_url()?>/igd/print2/<?php echo $nomer->id_rekam_medis?>"><i class="fa fa-envelope o"></i> Buat Surat Sakit</a>

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





 
<?php } ?>
 <form method="post" action="<?php echo base_url().'igd/tambah_transaksi'; ?>">
    <div class="row">
      <div class="col-2">
        <select name="layanan" class="form-control">
          <option>Obat</option>
                    <?php 
          foreach ($obat as $pr) {
            echo'<option value="'.$pr->id_inventory.'">'.$pr->nama_inv.'</option>';
          }
          ?>
        </select>
      </div>
      <div class="col-1">
        <input name="jumlah" class="form-control" type="text" placeholder="Qty">
        <input type="hidden" name="id_rekam_medis" class="form-control" value="<?php echo $nomer->id_rekam_medis?>">
      </div>
      <div class="col-1">
        <button class="btn btn-primary"><i class="fa fa-plus"></i> <i class="fa fa-medkit"></i></button>
      </div>

    </div>
  </form>

   <form method="post" action="<?php echo base_url().'igd/tambah_transaksi'; ?>">

<div class="row">
          <div class="col-2">
        <select name="layanan" class="form-control">
          <option>Tindakan</option>
            <?php 
          foreach ($tindakan as $pr) {
            echo'<option value="'.$pr->id_inventory.'">'.$pr->nama_inv.'</option>';
          }
          ?>
        </select>
      </div>
      <div class="col-1">
        <input name="jumlah" class="form-control" type="text" placeholder="Qty">
        <input type="hidden" name="id_rekam_medis" class="form-control" value="<?php echo $nomer->id_rekam_medis?>">

      </div>

      <div class="col-1">
        <button class="btn btn-primary"><i class="fa fa-plus "></i> <i class="fa fa-heartbeat"></i> </button>
      </div>
            <div class="col-1">

      </div>
       </div>
        </form>
                <a target="_blank" href="<?php echo base_url()?>/igd/print/<?php echo $nomer->id_rekam_medis?>" class="btn btn-primary"><i class="fa fa-plus "></i> <i class="fa fa-print"></i>Print </a>
     



    
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Pelayanan</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1 ?>
                      <?php foreach ($transaksi as $nomer): ?>
                      <tr>
                        
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $nomer->nama_inv ?></td>
                        <td><?php echo "Rp. " . number_format($nomer->harga_inv, 0, ".", ".") ?></td>
                        <td><?php echo $nomer->jumlah ?></td>
                        
                       
                        
        <!--                 <td><?php echo anchor('igd/pendaftaranigd/'.$nomer->id,'<div class="btn btn-success btn-sm">Daftar</i></div>') ?></td>
                        <td><?php echo anchor('igd/bedigddetail/'.$nomer->id,'<div class="btn btn-primary btn-sm">Detail</i></div>') ?></td>
                        <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor ('igd/kosongkan_bed/'.$nomer->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                               -->
                              
                      </tr>
                       <?php endforeach; ?>



      <tr>
      <th scope="col">Total</th>
      <th scope="col"></th>

      <th scope="col"><?php foreach ($total as $nomer): ?> <td><?php echo "Rp. " . number_format($nomer, 0, ".", ".") ?></td> <?php endforeach; ?></th>
    </tr>
  </tbody>
</table>





    
  </div>
</div>
      





  </div>



</div>