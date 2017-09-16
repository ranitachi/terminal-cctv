<div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>Kode CCTV</th>
                  <th>Nama CCTV</th>
                  <th>IP CCTV</th>
                  <th>IP Streaming</th>
                  <th>Lihat Kamera</th>
                  <th>Terminal</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?
              foreach ($d as $k => $v)
              {
                echo '<tr>';
                echo '<td style="text-align:center">'.($k+1).'</td>';
                echo '<td style="text-align:center">'.($v->kode).'</td>';
                echo '<td style="text-align:left">'.($v->nama_cctv).'</td>';
                echo '<td style="text-align:left">'.($v->ip_cctv).'</td>';
                echo '<td style="text-align:left">'.($v->ip_stream).'</td>';
                echo '<td style="text-align:center"><button class="btn btn-xs btn-success" onclick="showcam(\''.$v->id_cctv.'\')"><i class="fa fa-video-camera"></i></button></td>';
                echo '<td style="text-align:left">'.($v->nama_terminal).'</td>';
                echo '<td style="text-align:center">
                  <button class="btn btn-xs btn-primary" onclick="edit(\''.$v->id_cctv.'\')"><i class="fa fa-edit"></i></button>
                  <button class="btn btn-xs btn-danger" onclick="hapus(\''.$v->id_cctv.'\')"><i class="fa fa-trash"></i></button>
                </td>';
                echo '</tr>';
              }
              ?>
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
