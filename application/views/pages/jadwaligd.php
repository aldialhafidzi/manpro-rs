<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Jadwal</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Dokter dan Perawat</h3>
                </div>

                <form role="form">
                    <div class="card-body">
                        

                        <div class="card-body">
                          <div class="container">
  <div class="form-group col-9">
    <form class="form-inline">
   <button type="submit" class="btn btn-primary mb-2">Tambah Jadwal Seminggu</button>
      <button type="submit" class="btn btn-primary mb-2">Format Jadwal Seminggu</button>

  </form>
    </div>

<div class="form-group col-9">
  <form class="form-inline">
    <label for="formGroupExampleInput" class="mr-2">Tanggal</label>
    <input type="text" class="form-control mr-2" id="formGroupExampleInput" placeholder="17/03/2020--Selasa">
    <button type="button" class="btn btn-info ">Tambah Perawat/Dokter</button>
</form>
</div>
         


   <div class="card card-primary card-outline card-outline-tabs">
                                <div class="card-header p-0 border-bottom-0">
                                                                       <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Dokter</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Perawat</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-three-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                            <table class="table">
                                                  <thead>
                                                    <tr>
                                                      <th scope="col">Waktu</th>
                                                      <th scope="col">Nama</th>
                                                      <th scope="col">Hapus</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr>
                                                      <th scope="row">Pagi</th>
                                                      <td>Mark</td>
                                                   
                                                                                <td> <a href="#" class="btn btn-danger active btn-sm" role="button" aria-pressed="true">Hapus </a></td>

                                                    </tr>
                                                    <tr>
                                                      <th scope="row">Pagi</th>
                                                      <td>Jacob</td>
                                                     
                                                        <td> <a href="#" class="btn btn-danger active btn-sm" role="button" aria-pressed="true">Hapus </a></td>

                                                    </tr>
                                                    <tr>
                                                      <th scope="row">Siang</th>
                                                      <td>Larry</td>
                                                      
                                                        <td> <a href="#" class="btn btn-danger active btn-sm" role="button" aria-pressed="true">Hapus </a></td>

                                                    </tr>
                                                  </tbody>
                                             </table>

                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                           <table class="table">
                                            <thead>
                                                                                                <tr>
                                                      <th scope="col">Waktu</th>
                                                      <th scope="col">Nama</th>
                                                      <th scope="col">Hapus</th>
                                                    </tr>
                                                  </thead
                                                     </thead>
                                                  <tbody>
                                                    <tr>
                                                      <th scope="row">Pagi</th>
                                                      <td>Mark</td>
                                                   
                                                                                <td> <a href="#" class="btn btn-danger active btn-sm" role="button" aria-pressed="true">Hapus </a></td>

                                                    </tr>
                                                    <tr>
                                                      <th scope="row">Pagi</th>
                                                      <td>Jacob</td>
                                                     
                                                        <td> <a href="#" class="btn btn-danger active btn-sm" role="button" aria-pressed="true">Hapus </a></td>

                                                    </tr>
                                                    <tr>
                                                      <th scope="row">Siang</th>
                                                      <td>Larry</td>
                                                      
                                                        <td> <a href="#" class="btn btn-danger active btn-sm" role="button" aria-pressed="true">Hapus </a></td>

                                                    </tr>
                                                  </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="tglmasuk">Tanggal Masuk: </label><br>
                                                    <input type="date" id="tglmasuk" name="tglmasuk">
                                                </div>
                                                <div class="col-4">
                                                    <label for="jmasuk">Jam Masuk: </label><br>
                                                    <input type="time" id="jmasuk" name="jmasuk">
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="ruang">Ruangan </label><br>
                                                    <input type="text" id="ruang" name="ruang" class="form-control" placeholder=" "><br>
                                                </div>
                                                <div class="col-4">
                                                    <label for="hak">Hak Kelas</label><br>
                                                    <input type="text" id="hak" name="hak" class="form-control" placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Nomor Kamar</label>
                                                <input type="text" id="nkamar" name="nkamar" class="form-control" placeholder=" ">
                                            </div>
                                            <div class="form-group">
                                                <label>Nomor Bed</label>
                                                <input type="text" id="nbed" name="nbed" class="form-control" placeholder=" ">
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="dpjp">DP/JP</label><br>
                                                    <input type="text" id="dpjp" name="dpjp" class="form-control" placeholder=" "><br>
                                                </div>
                                                <div class="col-4">
                                                    <label for="hak">F9</label><br>
                                                    <input type="text" id="hak" name="hak" class="form-control" placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Diagnosa Awal</label>
                                                <input type="text" id="dawal" name="dawal" class="form-control" placeholder=" ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>