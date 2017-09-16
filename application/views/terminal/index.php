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
              <li class="active"><a href="#datas" data-toggle="tab" aria-expanded="true">Data Terminal</a></li>

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
<script src="<?=base_url()?>assets/ckfinder/ckfinder.js"></script>
<script src="<?=base_url()?>assets/ckeditor/ckeditor.js"></script>
<script>
  jQuery(function($){
    $('#loader-data').show();
    $('#loader-form').show();
    $('#data').load('<?=site_url()?>terminal/data/-1',function(){
      $('#loader-data').hide();
    });
    $('#form').load('<?=site_url()?>terminal/form/-1',function(){
      $('#loader-form').hide();
    });
  });

  function edit(id)
  {
    $('#loader-form').show();
    $('#form').load('<?=site_url()?>terminal/form/'+id,function(){
      $('#loader-form').hide();
    });
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
        $('#loader-data').show();
        $('#loader-form').show();
        $('#data').load('<?=site_url()?>terminal/data/-1',function(){
          $('#loader-data').hide();
        });
        $('#form').load('<?=site_url()?>terminal/form/-1',function(){
          $('#loader-form').hide();
        });
      }
    });
    // alert(id);
  }
  function showvideo(terminal)
  {
      $('#body-info').load('<?=site_url()?>terminal/showsvideo/'+terminal);
      $('#modal-info').modal('show');
  }
  function showabout(terminal)
  {
      $('#body-info').load('<?=site_url()?>terminal/showabout/'+terminal);
      $('#modal-info').modal('show');
  }
  function showschedule(terminal)
  {
      $('#body-info').load('<?=site_url()?>terminal/showschedule/'+terminal,function(){
        if ( $.fn.dataTable.isDataTable( '#jadwal-table' ) ) {
          table = $('#jadwal-table').DataTable();
        }
        else {
            table = $('#jadwal-table').DataTable({
              'paging'      : false,
              'lengthChange': true,
              'searching'   : false,
              'ordering'    : true,
              'info'        : false,
              'autoWidth'   : true,
              // 'scrollY'    : '330px',
              // 'scrollCollapse':false
            });
        }
      });
      $('#modal-info').modal('show');
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
  function BrowseServer( startupPath, functionData )
	{
		var finder = new CKFinder();
		finder.basePath = '<?=base_url()?>assets/ckfinder/';
		finder.startupPath = startupPath;
		finder.selectActionFunction = SetFileField;
		finder.selectActionData = functionData;
		finder.removePlugins = 'basket';
		//finder.selectThumbnailActionFunction = ShowThumbnails;
		finder.popup();
	}

	function SetFileField( fileUrl, data )
	{
		document.getElementById( data["selectActionData"] ).value = fileUrl;
		var f=fileUrl.split('/');
		var x=f.length;
		var file = f[x-1];
		$('#gambar_t').val(file);
    $('div#foto').css({'background-image':'url("'+fileUrl+'")'});
	}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYzgG72G3M3HVGRdzkvtvO5c4N7lmIuiY"></script>
