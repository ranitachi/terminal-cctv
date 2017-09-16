<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Schedule
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=site_url()?>admin/cctv"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Schedule</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#datas" data-toggle="tab" aria-expanded="true">Data Schedule</a></li>
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
    $('#data').load('<?=site_url()?>config/scheduledata/-1',function(){
      $('#loader-data').hide();
    });
    $('#form').load('<?=site_url()?>config/scheduleform/-1',function(){
      $(".select2").select2();
      $('#loader-form').hide();
    });
  });
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
	}
  function hapus(id)
  {
    $('h4#title-hapus').text('Confirmation');
    $('#body-hapus').html('<h2>Yakin Ingin Menghapus Data Schedule ini ?</h2><input type="hidden" name="id" id="id" value="'+id+'">');
    $('#modal-hapus').modal('show');
  }
  function hps()
  {
    $('#modal-hapus').modal('hide');
    var id=$('input#id').val();
    $.ajax({
      url : '<?=site_url()?>config/schedulehapus/'+id,
      success : function(a)
      {
        $('div#body-alert').html('<h2>'+a+'</h2>');
        $('div#modal-alert').modal('show');
        $('#loader-data').show();
        $('#loader-form').show();
        $('#data').load('<?=site_url()?>config/scheduledata/-1',function(){
          $('#loader-data').hide();
        });
        $('#form').load('<?=site_url()?>config/scheduleform/-1',function(){
          $(".select2").select2();
          $('#loader-form').hide();
        });
      }
    });
    // alert(id);
  }
  function edit(id)
  {
    $('#loader-form').show();
    $('#form').load('<?=site_url()?>config/scheduleform/'+id,function(){
      $(".select2").select2();
      $('#loader-form').hide();
    });
    $('.nav-tabs a:last').tab('show');
  }
</script>
