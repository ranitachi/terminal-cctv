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
                  <th rowspan="2">No</th>
                  <th rowspan="2">Terminal</th>
                  <th colspan="3">Kedatangan</th>
                  <th colspan="3">Keberangkatan</th>
                  <th rowspan="2"></th>
                </tr>
                <tr>
                  <th>Tujuan</th>
                  <th>Waktu</th>
                  <th>Operator</th>
                  <th>Tujuan</th>
                  <th>Waktu</th>
                  <th>Operator</th>
                </tr>
              </thead>
              <tbody>
              <?
              $no=1;
              foreach ($d as $k => $v)
              {
                $term='';
                if(isset($tr[$v->terminal_id]))
                  $term=$tr[$v->terminal_id]->nama_terminal;

                echo '<tr>';
                  echo '<td>'.$no.'</td>';
                  echo '<td>'.$term.'</td>';
                  echo '<td>'.$v->tujuan_datang.'</td>';
                  echo '<td>'.$v->waktu_datang.'</td>';
                  echo '<td>'.$v->operator_datang.'</td>';
                  echo '<td>'.$v->tujuan_berangkat.'</td>';
                  echo '<td>'.$v->waktu_berangkat.'</td>';
                  echo '<td>'.$v->operator_datang.'</td>';
                  echo '<td style="text-align:center;width:80px;">
                    <button class="btn btn-xs btn-primary" type="button" onclick="edit(\''.$v->id.'\')"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-xs btn-danger" type="button" onclick="hapus(\''.$v->id.'\')"><i class="fa fa-trash-o"></i></button>
                  </td>';
                echo '</tr>';
                $no++;
              }
              ?>
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
