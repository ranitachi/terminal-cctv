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
                  <th>Judul/Tanggal</th>
                  <th>Video</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?
              foreach ($d as $k => $v)
              {
                echo '<tr>';
                echo '<td style="text-align:center">'.($k+1).'</td>';
                echo '<td style="text-align:left"><b>'.($v->judul).'</b><br>'.tgl_indo($v->tanggal).'</td>';
                echo '<td style="text-align:center"></td>';
                echo '<td style="text-align:center;width:100px">
                  <button class="btn btn-xs btn-primary" onclick="edit(\''.$v->id.'\')"><i class="fa fa-edit"></i></button>';

                  echo '<button class="btn btn-xs btn-danger" onclick="hapus(\''.$v->id.'\')"><i class="fa fa-trash"></i></button>';
                
                echo '</td>';
                echo '</tr>';
              }
              ?>
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
