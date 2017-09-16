<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="form-video">
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Tujuan Keberangkatan</label>

                  <div class="col-sm-5">
                  <?
                  if($id!=-1)
                  {
                      $tujuan=$det[0]->tujuan_berangkat;
                  }
                  ?>
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Tujuan Keberangkatan" name="tujuan_berangkat" value="<?=$id!=-1 ? $tujuan : ''?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Waktu</label>

                  <div class="col-sm-5">
                  <?
                  if($id!=-1)
                  {
                      $waktu=$det[0]->waktu_berangkat;
                  }
                  ?>
                    <input type="text" class="form-control" id="inputEmail3" placeholder="hh:mm" name="waktu_berangkat" value="<?=$id!=-1 ? $waktu : ''?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Operator</label>

                  <div class="col-sm-5">
                  <?
                  if($id!=-1)
                  {
                      $operator=$det[0]->operator_berangkat;
                  }
                  ?>
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Operator" name="operator_berangkat" value="<?=$id!=-1 ? $operator : ''?>">
                  </div>
                </div>
                <hr class="hr hr-dotted">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tujuan Kedatangan</label>

                  <div class="col-sm-5">
                  <?
                  if($id!=-1)
                  {
                      $tujuan=$det[0]->tujuan_datang;
                  }
                  ?>
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Asal Kedatangan" name="tujuan_datang" value="<?=$id!=-1 ? $tujuan : ''?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Waktu</label>

                  <div class="col-sm-5">
                  <?
                  if($id!=-1)
                  {
                      $waktu=$det[0]->waktu_datang;
                  }
                  ?>
                    <input type="text" class="form-control" id="inputEmail3" placeholder="hh:mm" name="waktu_datang" value="<?=$id!=-1 ? $waktu : ''?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Operator</label>

                  <div class="col-sm-5">
                  <?
                  if($id!=-1)
                  {
                      $operator=$det[0]->operator_datang;
                  }
                  ?>
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Operator" name="operator_datang" value="<?=$id!=-1 ? $operator : ''?>">
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
  $('div#body-default').html('<h2>Apakah Schedule Sudah benar?</h2>');
  $('div#modal-default').modal('show');
}
function baru()
{
  $('#form').load('<?=site_url()?>config/scheduleform/-1',function(){
    $(".select2").select2();
  });
}
function ok()
{
  $('div#modal-default').modal('hide');
  $.ajax({
    url : '<?=site_url()?>config/scheduleprocess/<?=$id?>',
    type : 'POST',
    data : $('form#form-video').serialize(),
    success : function(a){
      $('div#body-alert').html('<h2>'+a+'</h2>');
      $('div#modal-alert').modal('show');
      $('#data').load('<?=site_url()?>config/scheduledata/-1');
      $('#form').load('<?=site_url()?>config/scheduleform/-1',function(){
        $('.select2').select2();
      });
      $('.nav-tabs a[href="#data"]').tab('show');
    }
  });
}
</script>
