<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar Pasien IGD</h1>
                </div>
            </div>
        </div>
    </div>
                    <form class="form-inline my-2 my-lg-0">
                          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <table class="table">
                      <thead class="thead">
                        <tr class="bg-primary">
                          <th scope="col">No Pasien</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Jenis Kelamin</th>
                          <th scope="col">Alamat</th>
                          <th colspan="">Aksi</th>
                        </tr>
<?php 
        $no = 1;
        foreach ($pasien as $mhs): ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $mhs->nama ?></td>
          <td><?php echo $mhs->jenis_kelamin ?></td>
          <td><?php echo $mhs->alamat ?></td>

               
<td><?php echo anchor('igd/rekammedisdetail/'.$mhs->id_rekam_medis,'<div class="btn btn-primary btn-sm">Detail</i></div>') ?></td>


                
                
              
        </tr>
         <?php endforeach; ?>
                      </tbody>
                    </table>


</div>