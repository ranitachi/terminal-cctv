<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="form-video">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Judul Video</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Judul Video" name="judul" value="<?=$id!=-1 ? $det[0]->judul : ''?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Video</label>

                  <div class="col-sm-4">
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control" readonly="readonly" placeholder=""  name="video" id="file">
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" onclick="BrowseServer( 'Files:/', 'file' );"><i class="fa fa-search"></i></button>
                          </span>
                    </div>
                    <input type="hidden" name="tanggal" value="<?=date('Y-m-d H:i:s')?>">
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
  $('div#body-default').html('<h2>Apakah Video Profile Sudah benar?</h2>');
  $('div#modal-default').modal('show');
}
function baru()
{
  $('#form').load('<?=site_url()?>config/videoform/-1');
}
function ok()
{
  $('div#modal-default').modal('hide');
  $.ajax({
    url : '<?=site_url()?>config/videoprocess/<?=$id?>',
    type : 'POST',
    data : $('form#form-video').serialize(),
    success : function(a){
      $('div#body-alert').html('<h2>'+a+'</h2>');
      $('div#modal-alert').modal('show');
      $('#data').load('<?=site_url()?>config/videodata/-1');
      $('#form').load('<?=site_url()?>config/videoform/-1');
      $('.nav-tabs a[href="#data"]').tab('show');
    }
  });
}
</script>
