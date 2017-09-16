<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="form-cctv">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Terminal</label>
                  <div class="col-sm-5">
                    <select class="form-control select2" style="width: 100%;" data-placeholder="Terminal" name="terminal_id">
                      <option></option>
                      <?
                      foreach ($term as $k => $v)
                      {
                        if($id!=-1)
                        {
                          if($det[0]->terminal_id==$v->id)
                            echo '<option value="'.$det[0]->terminal_id.'" selected="selected">Terminal '.$v->nama_terminal.'</option>';
                          else {
                              echo '<option value="'.$v->id.'">Terminal '.$v->nama_terminal.'</option>';
                            }
                        }
                        else
                          echo '<option value="'.$v->id.'">Terminal '.$v->nama_terminal.'</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama CCTV</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Nama CCTV" name="nama_cctv" value="<?=$id!=-1 ? $det[0]->nama_cctv : ''?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode CCTV</label>

                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Kode CCTV"  name="kode" value="<?=$id!=-1 ? $det[0]->kode : ''?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">IP CCTV</label>

                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="IP CCTV"  name="ip" value="<?=$id!=-1 ? $det[0]->ip_cctv : ''?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">IP Stream</label>

                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="http://IP:PORT"  name="ip_stream" value="<?=$id!=-1 ? $det[0]->ip_stream : ''?>">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <?
                if($id!=-1)
                {
                ?>
                <button type="button" class="btn btn-default" onclick="baru()">Input Baru</button>
                <?
                }
                ?>
                <button type="button" class="btn btn-info pull-right" onclick="simpan()">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
<script>
          function simpan()
          {
            $('h4.modal-title-default').text('Confirmation');
            $('div#body-default').html('<h2>Apakah Data CCTV Sudah benar?</h2>');
            $('div#modal-default').modal('show');
          }
          function baru()
          {
            $('#form').load('<?=site_url()?>cctv/form/-1',function(){
              $(".select2").select2();
            });
          }
          function ok()
          {
            $('div#modal-default').modal('hide');
            $.ajax({
              url : '<?=site_url()?>cctv/process/<?=$id?>',
              type : 'POST',
              data : $('form#form-cctv').serialize(),
              success : function(a){
                $('div#body-alert').html('<h2>'+a+'</h2>');
                $('div#modal-alert').modal('show');
                $('#data').load('<?=site_url()?>cctv/data/-1');
                $('#form').load('<?=site_url()?>cctv/form/-1',function(){
                  $(".select2").select2();
                });
                $('.nav-tabs a[href="#data"]').tab('show');
              }
            });
          }
          </script>
