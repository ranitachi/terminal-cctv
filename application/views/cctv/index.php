<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data CCTV
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=site_url()?>admin/cctv"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">CCTV</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#datas" data-toggle="tab" aria-expanded="true">Data CCTV</a></li>
              <li class=""><a href="#forms" data-toggle="tab" aria-expanded="false">Form Add/Edit Data</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="datas" style="padding-top:15px;">
                <!-- <div class="loading">
                  <div class="loading-bar"></div>
                  <div class="loading-bar"></div>
                  <div class="loading-bar"></div>
                  <div class="loading-bar"></div>
                </div> -->
                  <!-- <div class="spinner">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                  </div> -->
                  <center>
                    <div id="loader-data"><img src="<?=base_url()?>assets/img/loading-bl-blue.gif"></div>
                  </center>
                  <div id="data"></div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="forms" style="padding-top:15px;">
                <!-- <div class="spinner">
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                </div> -->
                <center>
                  <div id="loader-form"><img src="<?=base_url()?>assets/img/loading-bl-blue.gif"></div>
                </center>
                <div id="form"></div>
              </div>

            </div>
            <!-- /.tab-content -->
          </div>
    </div>
  </div>
</section>
<script>
  jQuery(function($){
    $('#loader-data').show();
    $('#loader-form').show();
    $('#data').load('<?=site_url()?>cctv/data/-1',function(){
      $('#loader-data').hide();
    });
    $('#form').load('<?=site_url()?>cctv/form/-1',function(){
      $(".select2").select2();
      $('#loader-form').hide();
    });
  });
  function showcam(id)
  {
    $('div#body-alert').text('');
    $('h4#title-alert').html('Kamera Terminal');
    $('div#body-alert').load('<?=site_url()?>cctv/showcam/'+id);
    $('div#modal-alert').modal('show');
  }
  function edit(id)
  {

    $('#loader-form').show();
    $('#form').load('<?=site_url()?>cctv/form/'+id,function(){
      $(".select2").select2();
      $('#loader-form').hide();
    });
    $('.nav-tabs a:last').tab('show');
  }
  function hapus(id)
  {
    $('h4#title-hapus').text('Confirmation');
    $('#body-hapus').html('<h2>Yakin Ingin Menghapus Data CCTV ini ?</h2><input type="hidden" name="id" id="id" value="'+id+'">');
    $('#modal-hapus').modal('show');
  }
  function hps()
  {
    $('#modal-hapus').modal('hide');
    var id=$('input#id').val();
    $.ajax({
      url : '<?=site_url()?>cctv/hapus/'+id,
      success : function(a)
      {
        $('div#body-alert').html('<h2>'+a+'</h2>');
        $('div#modal-alert').modal('show');
        $('#loader-data').show();
        $('#loader-form').show();
        $('#data').load('<?=site_url()?>cctv/data/-1',function(){
          $('#loader-data').hide();
        });
        $('#form').load('<?=site_url()?>cctv/form/-1',function(){
          $(".select2").select2();
          $('#loader-form').hide();
        });
      }
    });
    // alert(id);
  }
</script>
