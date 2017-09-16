<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="form-cctv">
              <?
              $bgr='';
              if($id!=-1)
              {
                $bgr='background-image:url("'.$det[0]->gambar.'");';
              }
              ?>
              <div style="<?=$bgr?>position:absolute;padding:4px;width:150px;border:1px solid #ddd;right:15px;height:150px;background-size:100% 100%" id="foto"></div>

              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Judul Berita" name="judul" value="<?=$id!=-1 ? $det[0]->judul : ''?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Author</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="inputEmail3" readonly placeholder="Author"  name="author" value="<?=$id!=-1 ? $det[0]->author : ''?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Gambar</label>

                  <div class="col-sm-4">
                    <div class="input-group input-group-sm">
                      <input type="hidden" class="form-control" readonly="readonly" placeholder=""  id="gambar_t">
                      <input type="text" class="form-control" readonly="readonly" placeholder=""  name="gambar" id="gambar">
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" onclick="BrowseServer( 'Image:/', 'gambar' );"><i class="fa fa-search"></i></button>
                          </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Terminal</label>
                  <div class="col-sm-3">
                    <select class="form-control select2" style="width: 100%;" data-placeholder="Terminal" name="terminal_id">
                      <option value="-1"> - Terminal -</option>
                      <?
                      if($admin!=1)
                      {
                          echo '<option value="'.$user->terminal_id.'" selected="selected">'.$term->nama_terminal.'</option>';
                      }
                      else
                      {

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
                      }

                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Isi Berita</label>
                  <div class="col-sm-10">
                    <textarea id="txteditor" class="form-control"><?=$id!=-1 ? $det[0]->konten : ''?></textarea>
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
              <input type="hidden" name="waktu_input" value="<?=date('Y-m-d H:i:s')?>">
              <input type="hidden" name="konten" id="konten">
            </form>
          </div>
<script>
          function simpan()
          {
            $('h4.modal-title-default').text('Confirmation');
            $('div#body-default').html('<h2>Apakah Data Berita Sudah benar?</h2>');
            $('div#modal-default').modal('show');
            var data = CKEDITOR.instances.txteditor.getData();
            $('input#konten').val(data);
          }
          function baru()
          {
            $('#form').load('<?=site_url()?>news/form/-1',function(){
              $(".select2").select2();
            });
          }
          function ok()
          {
            $('div#modal-default').modal('hide');
            $.ajax({
              url : '<?=site_url()?>news/process/<?=$id?>',
              type : 'POST',
              data : $('form#form-cctv').serialize(),
              success : function(a){
                $('div#body-alert').html('<h2>'+a+'</h2>');
                $('div#modal-alert').modal('show');
                $('#data').load('<?=site_url()?>news/data/-1');
                $('#form').load('<?=site_url()?>news/form/-1',function(){
                  $(".select2").select2();
                });
                $('.nav-tabs a[href="#data"]').tab('show');
              }
            });
          }
          if ( typeof CKEDITOR == 'undefined' )
          {
            document.write(
              '<strong>Error</strong>' ) ;
          }
          else
          {
            var editor = CKEDITOR.instances.txteditor;
            if (editor)
            {
              editor.destroy(true);
            }
            CKEDITOR.replace( 'txteditor',
              {
                height:'250',
                width : '100%'
              });
            CKFinder.setupCKEditor( null, { basePath : '<?=base_url()?>assets/ckfinder/', skin : 'v1' } ) ;
          }
          </script>
