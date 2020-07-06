<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>Pasien Aktif</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53</h3>

              <p>Pasien Terlayani</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>Pasien Member</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Total Pasien</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-12">
          <table class="table text-center">
            <tbody>
              <tr>
                <td>
                  <div class="card-group">
                    <div class="card d-flex">
                      <div class="card-header border-0" style="background-color:rgb(34,129,232)">
                        <div class="d-flex justify-content-center align-items-center">
                          <h3 class="card-title" style="font-size:1.3rem; font-weight:400; color:white">Ruangan Terisi</h3>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                          <p class="d-flex flex-column">
                            <span class="text-bold" style="font-size:2.5rem; text-align:center">10 Ruang</span>
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="card">
                      <div class="card-header border-0" style="background-color:rgb(34,129,232)">
                        <div class="d-flex align-content-center justify-content-center">
                          <h3 class="card-title" style="font-size:1.3rem; font-weight:400; color:white">Ruangan Kosong</h3>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                          <p class="d-flex flex-column">
                            <span class="text-bold" style="font-size:2.5rem; text-align:center">5 Ruang</span>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>

                <td>
                  <div class="card-group">
                    <div class="card">
                      <div class="card-header border-0" style="background-color:rgb(34,129,232)">
                        <div class="d-flex justify-content-center align-items-center">
                          <h3 class="card-title" style="font-size:1.3rem; font-weight:400; color:white">Total Kasur Terisi</h3>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                          <p class="d-flex flex-column">
                            <span class="text-bold" style="font-size:2.5rem; text-align:center">50 Bed</span>
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="card">
                      <div class="card-header border-0" style="background-color:rgb(34,129,232)">
                        <div class="d-flex justify-content-center align-items-center">
                          <h3 class="card-title" style="font-size:1.3rem; font-weight:400; color:white">Total Kasur Kosong</h3>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                          <p class="d-flex flex-column">
                            <span class="text-bold" style="font-size:2.5rem; text-align:center">100 Bed</span>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Pengunjung</h3>
                <a href="javascript:void(0);">View Report</a>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                  <span class="text-bold text-lg">820</span>
                  <span>Visitors Over Time</span>
                </p>
                <p class="ml-auto d-flex flex-column text-right">
                  <span class="text-success">
                    <i class="fas fa-arrow-up"></i> 12.5%
                  </span>
                  <span class="text-muted">Since last week</span>
                </p>
              </div>

              <div class="position-relative mb-4">
                <canvas id="visitors-chart" height="200"></canvas>
              </div>

              <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                  <i class="fas fa-square text-primary"></i> This Week
                </span>

                <span>
                  <i class="fas fa-square text-gray"></i> Last Week
                </span>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header border-0">
              <h3 class="card-title">Rekam Medis</h3>
              <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-download"></i>
                </a>
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-bars"></i>
                </a>
              </div>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-striped table-valign-middle">
                <thead>
                  <tr>
                    <th>Pasien</th>
                    <th>Count</th>
                    <th>Sales</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <img src="<?= base_url() ?>public/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Dadang Konelo
                    </td>
                    <td>13</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        12%
                      </small>
                      12,000 Sold
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="<?= base_url() ?>public/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Asep Supriatna
                    </td>
                    <td>29</td>
                    <td>
                      <small class="text-warning mr-1">
                        <i class="fas fa-arrow-down"></i>
                        0.5%
                      </small>
                      123,234 Sold
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="<?= base_url() ?>public/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Ening Sumiati
                    </td>
                    <td>1,230</td>
                    <td>
                      <small class="text-danger mr-1">
                        <i class="fas fa-arrow-down"></i>
                        3%
                      </small>
                      198 Sold
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="<?= base_url() ?>public/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Tita Sunandar
                      <span class="badge bg-danger">URG</span>
                    </td>
                    <td>199</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        63%
                      </small>
                      87 Sold
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Pasien</h3>
                <a href="javascript:void(0);">View Report</a>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                  <span class="text-bold text-lg">18.230.00</span>
                  <span>Pasien Over Time</span>
                </p>
                <p class="ml-auto d-flex flex-column text-right">
                  <span class="text-success">
                    <i class="fas fa-arrow-up"></i> 33.1%
                  </span>
                  <span class="text-muted">Since last month</span>
                </p>
              </div>

              <div class="position-relative mb-4">
                <canvas id="sales-chart" height="200"></canvas>
              </div>

              <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                  <i class="fas fa-square text-primary"></i> This year
                </span>

                <span>
                  <i class="fas fa-square text-gray"></i> Last year
                </span>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header border-0">
              <h3 class="card-title">Rangkuman Penyakit</h3>
              <div class="card-tools">
                <a href="#" class="btn btn-sm btn-tool">
                  <i class="fas fa-download"></i>
                </a>
                <a href="#" class="btn btn-sm btn-tool">
                  <i class="fas fa-bars"></i>
                </a>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                <p class="text-success text-xl">
                  <i class="ion ion-ios-refresh-empty"></i>
                </p>
                <p class="d-flex flex-column text-right">
                  <span class="font-weight-bold">
                    <i class="ion ion-android-arrow-up text-success"></i> 12%
                  </span>
                  <span class="text-muted">INFLUENZA</span>
                </p>
              </div>
              <!-- /.d-flex -->
              <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                <p class="text-warning text-xl">
                  <i class="ion ion-ios-cart-outline"></i>
                </p>
                <p class="d-flex flex-column text-right">
                  <span class="font-weight-bold">
                    <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
                  </span>
                  <span class="text-muted">COVID-19</span>
                </p>
              </div>
              <!-- /.d-flex -->
              <div class="d-flex justify-content-between align-items-center mb-0">
                <p class="text-danger text-xl">
                  <i class="ion ion-ios-people-outline"></i>
                </p>
                <p class="d-flex flex-column text-right">
                  <span class="font-weight-bold">
                    <i class="ion ion-android-arrow-down text-danger"></i> 1%
                  </span>
                  <span class="text-muted">DBD</span>
                </p>
              </div>
              <!-- /.d-flex -->
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->