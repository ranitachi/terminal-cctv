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
                  <th>Terminal</th>
                  <th>User</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Telp</th>
                  <th>Level</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?
              foreach ($d as $k => $v)
              {
                echo '<tr>';
                echo '<td style="text-align:center">'.($k+1).'</td>';
                if(isset($terminal[$v->terminal_id]))
                {
                  $nama_terminal=$terminal[$v->terminal_id]->nama_terminal;
                }
                else
                {
                  $nama_terminal='Admin';
                }
                echo '<td style="text-align:center">'.($nama_terminal).'</td>';
                echo '<td style="text-align:center">'.($v->user).'</td>';
                echo '<td style="text-align:left">'.($v->nama).'</td>';
                echo '<td style="text-align:left">'.($v->email).'</td>';
                echo '<td style="text-align:center">'.$v->telp.'</td>';
                echo '<td style="text-align:left">'.($v->level_user).'</td>';
                echo '<td style="text-align:center">
                  <button class="btn btn-xs btn-primary" onclick="edit(\''.$v->id_user.'\')"><i class="fa fa-edit"></i></button>
                  <button class="btn btn-xs btn-danger" onclick="hapus(\''.$v->id_user.'\')"><i class="fa fa-trash"></i></button>
                </td>';
                echo '</tr>';
              }
              ?>
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
