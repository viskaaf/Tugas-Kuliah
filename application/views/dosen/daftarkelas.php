  <div class="col-md-4">
    <!-- Widget: user widget style 1 -->
    <div class="box box-primary">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="box-header">
        <h4 class="widget-user">Tugas</h4>
        <div class="box-tools pull-right">
          <div class="btn-group">
            <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-toggle-down"></i></button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Edit</a></li>
                <li><a href="#">Hapus</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="box-footer no-padding">
          <ul class="nav nav-stacked">
            <?php foreach ($tugas as $value) { ?>
              <li>
                <a href="<?php echo site_url('DosenC/tampilSoalPilgan/'.$value->id_tugas); ?>"><?php echo $value->nama_tugas;?>
                </a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <!-- /.widget-user -->
    </div>
    <!-- /.col -->