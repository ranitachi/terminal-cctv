<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="aboutus-form">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Konten About Us</label>
                  <div class="col-sm-10">&nbsp;</div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">&nbsp;</label>
                  <div class="col-sm-11">
                    <textarea id="txteditor" class="form-control"><?=count($d)!=0 ? $d[0]->konten : ''?></textarea>
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-info pull-right" onclick="simpan()">Simpan</button>
              </div>
              <input type="hidden" name="konten" id="konten">
            </form>
          </div>
<script src="<?=base_url()?>assets/ckfinder/ckfinder.js"></script>
<script src="<?=base_url()?>assets/ckeditor/ckeditor.js"></script>
<script>
          function simpan()
          {
            $('h4.modal-title-default').text('Confirmation');
            $('div#body-default').html('<h2>Apakah Data About Us Sudah benar?</h2>');
            $('div#modal-default').modal('show');
            var data = CKEDITOR.instances.txteditor.getData();
            $('input#konten').val(data);
          }
          function ok()
          {
            $('div#modal-default').modal('hide');
            $.ajax({
              url : '<?=site_url()?>config/process_aboutus/<?=$id?>',
              type : 'POST',
              data : $('form#aboutus-form').serialize(),
              success : function(a){
                $('div#body-alert').html('<h2>'+a+'</h2>');
                $('div#modal-alert').modal('show').on('click', 'button#okalert', function(){
                    location.href='<?=site_url()?>config/aboutus';
                });
                // $('.nav-tabs a[href="#data"]').tab('show');
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
                height:'400',
                width : '90%'
              });
            CKFinder.setupCKEditor( null, { basePath : '<?=base_url()?>assets/ckfinder/', skin : 'v1' } ) ;
          }
          </script>
