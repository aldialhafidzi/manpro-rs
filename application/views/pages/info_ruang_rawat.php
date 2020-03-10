<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-7">
          <h1 class="m-0 text-dark">Ruang Rawat</h1>
        </div>

        <div class="btn-group" style="margin: 0px 5px 0px 5px">
          <button type="button" class="btn btn-default" style="width: 140px">Pilih Kelas</button>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?= base_url() ?>ruangrawat/ruang_vvip">VVIP</a></li>
            <li><a href="#">VIP</a></li>
            <li class="divider"></li>
            <li><a href="#">Kelas 1</a></li>
            <li><a href="#">Kelas 2</a></li>
            <li><a href="#">Kelas 3</a></li>
          </ul>
        </div>
      
        <form action="#" method="get" class="sidebar-form" style="margin: 0px 5px 0px 5px">
          <div class="input-group align-right">
          <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
      
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
    <table class="table table-bordered" style="background-color: white">
      <tbody><tr>
        <th style="width: 5%">No</th>
        <th style="width: 60%">Ruangan</th>
        <th style="background-color: green">Available</th>
        <th style="background-color: yellow">Maintenance</th>
        <th style="background-color: red">Occupied</th>
      </tr>
      <tr>
        <td>1.</td>
        <td>Update software</td>
        <td style="background-color: green; text-align: center">2</td>
        <td style="background-color: yellow">3</td>
        <td style="background-color: red">4</td>
      </tr>
    </tbody></table>  
    </div>
  </div>
</div>