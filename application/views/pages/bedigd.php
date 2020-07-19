<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><i class="fas fa-procedures"></i> Data Bed IGD</h1>
                </div>
                 <div class="col-sm-4">
                    <h1 class="m-0 text-dark">TERSEDIA : <?php echo $count ?><br> 
                    TERISI :  <?php echo $count2 ?></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
<a target="_blank" class="btn btn-primary" href="<?php echo base_url()?>/igd/print2/"><i class="fa fa-plus"></i> Buat Surat Sakit</a>
                        <p><small mr-sm-2>Silahkan cari Bed untuk daftar IGD</small></p></div>

                        <table class="table table-sm">
                      <thead class="thead">
                        <tr class="bg-primary">
                          <th scope="col">No Kasur</th>
                          <th scope="col">Status</th>
                          <th scope="col">Nama Pasien</th>
                          
                          <th colspan="3" scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>



                      <?php 
                      
                      foreach ($join2 as $nomer): ?>
                      <tr>
                        
                        <td><?php echo "BED -00".$nomer->id ?></td>
                        <td><?php echo $nomer->kondisi ?></td>
                        <td><?php echo $nomer->nama ?></td>
                       
                        
                        <td><?php echo anchor('igd/pendaftaranigd/'.$nomer->id,'<div class="btn btn-success btn-sm">Daftar</i></div>') ?></td>
                        <td><?php echo anchor('igd/bedigddetail/'.$nomer->id,'<div class="btn btn-primary btn-sm">Detail</i></div>') ?></td>
                        <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor ('igd/kosongkan_bed/'.$nomer->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                              
                              
                      </tr>
                       <?php endforeach; ?>

                      </tbody>
                    </table>


</div>