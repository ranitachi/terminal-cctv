<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="form-cctv">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Level</label>
                  <div class="col-sm-3">
                    <select class="form-control select2" style="width: 100%;" data-placeholder="Level" name="level">
                      <option></option>
                      <?
                      foreach ($level as $k => $v)
                      {
                        if($id!=-1)
                        {
                          if($det[0]->id_level==$v->id)
                            echo '<option value="'.$det[0]->id_level.'" selected="selected">'.$v->level.'</option>';
                          else {
                              echo '<option value="'.$v->id.'">'.$v->level.'</option>';
                            }
                        }
                        else
                          echo '<option value="'.$v->id.'">'.$v->level.'</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Terminal</label>
                  <div class="col-sm-3">
                    <select class="form-control select2" style="width: 100%;" data-placeholder="Terminal" name="terminal_id">
                      <option value="-1"></option>
                      <?
                      foreach ($terminal as $k => $v)
                      {
                        if($id!=-1)
                        {
                          if($det[0]->terminal_id==$k)
                            echo '<option value="'.$det[0]->terminal_id.'" selected="selected">'.$v->nama_terminal.'</option>';
                          else {
                              echo '<option value="'.$k.'">'.$v->nama_terminal.'</option>';
                            }
                        }
                        else
                          echo '<option value="'.$v->id.'">'.$v->nama_terminal.'</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama User</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Nama User" name="nama" value="<?=$id!=-1 ? $det[0]->nama : ''?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Username</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Username"  name="user" value="<?=$id!=-1 ? $det[0]->user : ''?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-4">
                    <input type="password" class="form-control" id="inputEmail3" placeholder=""  name="pass">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Email"  name="email" value="<?=$id!=-1 ? $det[0]->email : ''?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Telepon</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Telepon"  name="telp" value="<?=$id!=-1 ? $det[0]->telp : ''?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-4">
                    <textarea class="form-control" name="alamat"><?=$id!=-1 ? $det[0]->alamat : ''?></textarea>
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
            $('div#body-default').html('<h2>Apakah Data User Sudah benar?</h2>');
            $('div#modal-default').modal('show');
          }
          function baru()
          {
            $('#form').load('<?=site_url()?>user/form/-1',function(){
              $(".select2").select2();
            });
          }
          function ok()
          {
            $('div#modal-default').modal('hide');
            $.ajax({
              url : '<?=site_url()?>user/process/<?=$id?>',
              type : 'POST',
              data : $('form#form-cctv').serialize(),
              success : function(a){
                $('div#body-alert').html('<h2>'+a+'</h2>');
                $('div#modal-alert').modal('show');
                $('#data').load('<?=site_url()?>user/data/-1');
                $('#form').load('<?=site_url()?>user/form/-1',function(){
                  $(".select2").select2();
                });
                $('.nav-tabs a[href="#data"]').tab('show');
              }
            });
          }
          </script>
