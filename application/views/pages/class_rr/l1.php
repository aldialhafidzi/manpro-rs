<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-7">
          <h1 class="m-0 text-dark">Ruang Rawat</h1>
        </div>

        <div class="btn-group" style="margin: 0px 5px 0px 5px">
          <button type="button" class="btn btn-default" style="width: 140px">Lantai 1</button>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a class="dropdown-item active" href="<?= base_url() ?>ruangrawat/lantai1">Lantai 1</a></li>
            <li><a class="dropdown-item " href="<?= base_url() ?>ruangrawat/lantai2">Lantai 2</a></li>
            <li><a class="dropdown-item " href="<?= base_url() ?>ruangrawat/lantai3">Lantai 3</a></li>
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
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="small-box bg-white">
            <div class="inner">
              <h4>Ruang Melati</h4>
              <table class="table table-bordered text-center">
                <tbody><tr>
                  <td>
                    <a type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#infobedModal">VVIP</a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <button type="button" class="btn btn-block btn-default">VIP</button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-block btn-default">Bed 8</button>
                  </td>
                </th>
                </tr>
              </tbody></table>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="infobedModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Info Bed</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
    
      </div>  
    </div>
  </div>
</div>