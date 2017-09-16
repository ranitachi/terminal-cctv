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
                <thead><tr>
                  <th>No</th>
                  <th>Nama Terminal</th>
                  <!-- <th>Alamat</th> -->
                  <th style="width:300px !important;">About Us</th>
                  <th>Nama Kepala Terminal</th>
                  <th>Video Profile</th>
                  <th>Schedule</th>
                  <th style="width:300px !important;">Contact</th>
                  <th>Koordinat</th>
                  <th>Show Map</th>
                  <th style="width:100px;"></th>
                </tr>
              </thead>
              <tbody>
                <?
                $about='';
                foreach ($d as $k => $v)
                {
                  $about=substr(strip_tags($v->about_us),0,100).' ...<br> <a href="javascript:showabout(\''.$v->id.'\')"><i><small>Selengkapnya</small></i></a>';
                  echo '<tr>';
                  echo '<td style="text-align:center">'.($k+1).'</td>';
                  echo '<td style="text-align:left">'.($v->nama_terminal).'</td>';
                  // echo '<td style="text-align:left">'.($v->alamat).'</td>';
                  echo '<td style="text-align:left">'.(strlen($v->about_us)>=100 ? $about : $v->about_us).'</td>';
                  echo '<td style="text-align:left">'.$v->nama_kepala.'</td>';
                  echo '<td style="text-align:center"><button class="btn btn-xs btn-primary" type="button" onclick="showvideo(\''.$v->id.'\')"><i class="fa fa-youtube-play"></i> Video Profil</button></td>';
                  echo '<td style="text-align:left"><button class="btn btn-xs btn-primary" type="button" onclick="showschedule(\''.$v->id.'\')"><i class="fa fa-search-plus"></i> Schedule</button></td>';
                  echo '<td style="text-align:left">'.($v->contact).'</td>';
                  echo '<td style="text-align:left;width:200px;">Latitude : '.($v->lat_koord).'<br>Longitude : '.$v->long_koord.'</td>';
                  echo '<td style="text-align:left;width:80px;">
                  <button class="btn btn-xs btn-default" type="button" onclick="showmap(\''.$v->nama_terminal.'\',\''.$v->lat_koord.'\',\''.$v->long_koord.'\')"><i class="fa fa-map-o" style="cursor:pointer;"></i></button>
                  <button class="btn btn-xs btn-default" type="button" onclick="showstreet(\''.$v->nama_terminal.'\',\''.$v->lat_koord.'\',\''.$v->long_koord.'\')"><i class="fa fa-street-view" style="cursor:pointer;" ></i></button></td>';
                  echo '<td style="text-align:center;width:80px;">
                    <button class="btn btn-xs btn-primary" type="button" onclick="edit(\''.$v->id.'\')"><i class="fa fa-edit"></i></button>';
                  if($user->level==1)
                  {
                    echo '<button class="btn btn-xs btn-danger" type="button" onclick="hapus(\''.$v->id.'\')"><i class="fa fa-trash-o"></i></button>';
                  }
                  echo '</td>';
                  echo '</tr>';
                }
                ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
