<ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                <?
                foreach ($d as $k => $v)
                {
                ?>
                  <li class="time-label">
                        <span class="bg-red">
                          <?=tgl_indo($v->waktu_input)?>
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-newspaper-o bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> <?=waktu($v->waktu_input)?></span>

                      <h3 class="timeline-header"><a href="#"><?=$v->judul?></a></h3>

                      <div class="timeline-body">
                        <div class="row">
                          <div class="col-xs-2 col-lg-1">
                          <?
                          if($v->gambar!='')
                          {
                              echo '<img src="'.$v->gambar.'" style="" class="img-responsive img-circle" alt="'.$v->judul.'">';
                          }
                          ?>
                          </div>
                          <div class="col-xs-10 col-lg-11">
                          <?
                          if(strlen($v->konten)<100)
                          {
                            echo strip_tags($v->konten);
                          }
                          else
                            echo substr(strip_tags($v->konten),0,100).' ...';
                          ?>
                          </div>
                        </div>
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-success btn-xs" href="javascript:detail('<?=$v->id?>')">Detail</a>
                        <a class="btn btn-primary btn-xs" href="javascript:edit('<?=$v->id?>')">Edit</a>
                        <a class="btn btn-danger btn-xs pull-right" href="javascript:hapus('<?=$v->id?>')">Delete</a>
                      </div>
                    </div>
                  </li>
                  <?
                  }
                  ?>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
