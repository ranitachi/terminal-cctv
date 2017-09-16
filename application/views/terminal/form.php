<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="form-terminal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Terminal</label>

                  <div class="col-sm-10 col-lg-3">
                    <input name="nama_terminal" type="text" value="<?=$id!=-1 ? $d[0]->nama_terminal : ''?>" class="form-control" id="inputEmail3" placeholder="Nama Terminal">
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10 col-lg-5">
                    <textarea class="form-control" id="inputPassword3" placeholder="Alamat" name="alamat"><?=$id!=-1 ? $d[0]->alamat : ''?></textarea>
                  </div>
                </div> -->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tentang Terminal</label>

                  <div class="col-sm-10 col-lg-8">
                    <textarea class="form-control" id="txteditor2" placeholder="Tentang Terminal"><?=$id!=-1 ? $d[0]->about_us : ''?></textarea>
                    <input type="hidden" name="about_us" id="about_us">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Contact</label>

                  <div class="col-sm-10 col-lg-5">
                    <textarea class="form-control" id="txteditor" placeholder="Contact"><?=$id!=-1 ? $d[0]->contact : ''?></textarea>
                    <input type="hidden" name="contact" id="contact">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Koordinat Latitude</label>

                  <div class="col-sm-10 col-lg-3">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                      <input type="text" class="form-control" placeholder="Latitude" name="lat_koord" value="<?=$id!=-1 ? $d[0]->lat_koord : ''?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Koordinat Longitude</label>

                  <div class="col-sm-10 col-lg-3">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                      <input type="text" class="form-control" placeholder="Longitude" name="long_koord" value="<?=$id!=-1 ? $d[0]->long_koord : ''?>">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <?
                if($id!=-1)
                {
                  if($admin==1)
                  {

                ?>
                    <button type="button" class="btn btn-default" onclick="baru()">Input Baru</button>
                <?
                  }
                }
                ?>
                <!-- <button type="button" class="btn btn-default">Cancel</button> -->
                <button type="button" class="btn btn-info pull-right" onclick="simpan()">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
<script>
function simpan()
{
  $('h4.modal-title-default').text('Confirmation');
  $('div#body-default').html('<h2>Apakah Data Terminal Sudah benar?</h2>');
  $('div#modal-default').modal('show');
  var data = CKEDITOR.instances.txteditor.getData();
  var about = CKEDITOR.instances.txteditor2.getData();
  $('input#contact').val(data);
  $('input#about_us').val(about);
}
function baru()
{
  $('#form').load('<?=site_url()?>terminal/form/-1');
}
function ok()
{
  $('div#modal-default').modal('hide');
  $.ajax({
    url : '<?=site_url()?>terminal/process/<?=$id?>',
    type : 'POST',
    data : $('form#form-terminal').serialize(),
    success : function(a){
      $('div#body-alert').html('<h2>'+a+'</h2>');
      $('div#modal-alert').modal('show');
      $('#data').load('<?=site_url()?>terminal/data/-1');
      $('#form').load('<?=site_url()?>terminal/form/-1');
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
      height:'100',
      width : '100%',
      toolbar : [['Bold','Italic','Underline','Strike','-','Subscript','Superscript','-','NumberedList','BulletedList','-','Blockquote','Image','Table']]
    });
  CKFinder.setupCKEditor( null, { basePath : '<?=base_url()?>assets/ckfinder/', skin : 'v1' } ) ;

  var aboutus = CKEDITOR.instances.txteditor2;
  if (aboutus)
  {
    aboutus.destroy(true);
  }
  CKEDITOR.replace( 'txteditor2',
    {
      height:'100',
      width : '100%',
      toolbar : [['Bold','Italic','Underline','Strike','-','Subscript','Superscript','-','NumberedList','BulletedList','-','Blockquote','Image','Table']]
    });
  CKFinder.setupCKEditor( null, { basePath : '<?=base_url()?>assets/ckfinder/', skin : 'v1' } ) ;
}
</script>
