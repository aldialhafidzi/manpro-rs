
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h1 class="card-title">Form Pendaftaran IGD</h1>
                </div>
                <form method="post" action="<?php echo base_url().'igd/daftarigd'; ?>">
                    <div class="card-body">
                       

                      <!--  <label for="nnota">BED : 2 Terisi, 8 Tersedia</label><br>
                         <small id="emailHelp" class="form-text text-muted">Silahkkan pilih Bed</small>

                         <font color="blue">*kosong   </font><font color="red">*terisi  </font><font color="#E39F21">*dipilih  </font>
                         <br>


                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-danger disabled">
                        <input type="radio" name="options" id="option1" autocomplete="off" > B001
                      </label>
                      <label class="btn btn-danger disabled">
                        <input type="radio" name="options" id="option2" autocomplete="off"> B002
                      </label>
                      <label class="btn btn-primary">
                        <input type="radio" name="options" id="option3" autocomplete="off"> B003
                      </label>
                      <label class="btn btn-primary">
                        <input type="radio" name="options" id="option1" autocomplete="off" > B004
                      </label>
                      <label class="btn btn-primary">
                        <input type="radio" name="options" id="option2" autocomplete="off"> B005
                      </label>
                      <label class="btn btn-primary">
                        <input type="radio" name="options" id="option3" autocomplete="off"> B006
                      </label>

                      <label class="btn btn-primary">
                        <input type="radio" name="options" id="option2" autocomplete="off"> B005
                      </label>
                      <label class="btn btn-primary">
                        <input type="radio" name="options" id="option3" autocomplete="off"> B006
                      </label>

                      <label class="btn btn-primary">
                        <input type="radio" name="options" id="option1" autocomplete="off" > B007
                      </label>
                      <label class="btn btn-primary">
                        <input type="radio" name="options" id="option2" autocomplete="off"> B008
                      </label>
                      <label class="btn btn-primary">
                        <input type="radio" name="options" id="option3" autocomplete="off"> B009
                      </label>
                      <label class="btn btn-primary">
                        <input type="radio" name="options" id="option1" autocomplete="off" > B010
                      </label>
                     
                    </div>
-->
                             
 
     <?php foreach ($idbedigd as $nobed) { ?>
            <label>NO BED IGD    :    BD -   00<?php echo $nobed->id ?></label> <br>
            <label>NO PASIEN     :    IGD - 00<?php echo $idpasienbaru ?></label>    
    <?php } ?>



                        <div class="row">
                            <div class="col-3">

                                <label for="nama">Nama :</label><br>
                                <input type="text" name="nama" class="form-control" placeholder="">
                            </div>

                             <input type="number"  name="id" value="<?php echo $nobed->id?>" style="display: none">

                            <div class="col-1">
                                <label>Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option></option>
                                    <option>L</option>
                                    <option>P</option>
                                </select>
                            </div>

                            <div class="col-2">
                                <label for="umurjalan">Tanggal Lahir</label><br>
                                <input type="date" name="tanggal_lahir" class="form-control" placeholder=" ">
                            </div>
                            <div class="col-3">
                                <label for="nnota">Alamat : </label><br>
                                <input type="text" name="alamat" class="form-control" placeholder="">
                            </div>
                            <div class="col-3">
                                <label for="nnota">No Tlp : </label><br>
                                <input type="text" name="no_telp" class="form-control" placeholder="">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-3">
                                <label for="namajalan">No MR</label><br>

                                <input type="text" name="id_rekam_medis" class="form-control" placeholder="" value="<?php echo $idrekam ?>"><br>
                            </div>
                            <div class="col-3">
                                <label>Tarif</label>
                                <select name="tarif"class="form-control">
                                    <option></option>
                                    <option>BPJS</option>
                                    <option>Umum</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="namajalan">Diagnosa</label><br>
                                <input type="text" id="namajalan" name="diagnosa" class="form-control" placeholder=" "><br>
                            </div>
                            <div class="col-3">
                                <label>Darurat Pasien</label>
                                <select name="darurat" class="form-control">
                                    <option></option>
                                    <option>Hijau</option>
                                    <option>Kuning</option>
                                    <option>Merah</option>
                                    <option>Putih</option>

                                </select>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-3">
                                <label for="dokterjalan">Dokter</label><br>
                                <select class="form-control">
                                    <option></option>
                                    <option>Dyah Hajuni Ambarsari, drg, Sp</option>
                                    <option>Nurly Hestika Wardhani, dr, MG</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="umurjalan">Perawat </label><br>
                                <select class="form-control">
                                    <option></option>
                                    <option>Cindy</option>
                                    <option>Vegy</option>
                                </select>
                              
                            </div>
                        </div>
                       
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>