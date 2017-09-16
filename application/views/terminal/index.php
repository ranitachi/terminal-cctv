<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Terminal
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=site_url()?>admin/terminal"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Terminal</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#data" data-toggle="tab" aria-expanded="true">Data Terminal</a></li>

              <li class=""><a href="#form" data-toggle="tab" aria-expanded="false">Form Add/Edit Data</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="data"></div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="form"></div>

            </div>
            <!-- /.tab-content -->
          </div>
    </div>
  </div>
</section>
<script src="<?=base_url()?>assets/ckfinder/ckfinder.js"></script>
<script src="<?=base_url()?>assets/ckeditor/ckeditor.js"></script>
<script>
  jQuery(function($){
    $('#data').load('<?=site_url()?>terminal/data/-1');
    $('#form').load('<?=site_url()?>terminal/form/-1');
  });

  function edit(id)
  {
    $('#form').load('<?=site_url()?>terminal/form/'+id);
    $('.nav-tabs a:last').tab('show');
  }
  function hapus(id)
  {
    $('h4#title-hapus').text('Confirmation');
    $('#body-hapus').html('<h2>Yakin Ingin Menghapus Data Terminal ini ?</h2><input type="hidden" name="id" id="id" value="'+id+'">');
    $('#modal-hapus').modal('show');
  }
  function hps()
  {
    $('#modal-hapus').modal('hide');
    var id=$('input#id').val();
    $.ajax({
      url : '<?=site_url()?>terminal/hapus/'+id,
      success : function(a)
      {
        $('div#body-alert').html('<h2>'+a+'</h2>');
        $('div#modal-alert').modal('show');
        $('#data').load('<?=site_url()?>terminal/data/-1');
        $('#form').load('<?=site_url()?>terminal/form/-1');
      }
    });
    // alert(id);
  }
  function showmap(terminal,lat,lng)
  {
    if(lat=='')
    {
      $('div#body-alert').html('<h2>Koordinat Masih Kosong</h2>');
      $('div#modal-alert').modal('show');
    }
    else
    {
      $('#body-info').load('<?=site_url()?>terminal/showmap/'+terminal+'/'+lat+'/'+lng,function(){
        allsite();
      });
      $('#modal-info').modal('show');
    }
  }
  function showstreet(terminal,lat,lng)
  {
    if(lat=='')
    {
      $('div#body-alert').html('<h2>Koordinat Masih Kosong</h2>');
      $('div#modal-alert').modal('show');
    }
    else
    {
      $('#body-info').load('<?=site_url()?>terminal/showmap/'+terminal+'/'+lat+'/'+lng,function(){
        allsitestreet();
      });
      $('#modal-info').modal('show');
    }
  }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYzgG72G3M3HVGRdzkvtvO5c4N7lmIuiY"></script>
