<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Berita
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=site_url()?>admin/cctv"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Berita</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#data" data-toggle="tab" aria-expanded="true">Data Berita</a></li>
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
    $('#data').load('<?=site_url()?>news/data/-1');
    $('#form').load('<?=site_url()?>news/form/-1',function(){
      $(".select2").select2();
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
		var f=fileUrl.split('/');
		var x=f.length;
		var file = f[x-1];
		$('#gambar_t').val(file);
    $('div#foto').css({'background-image':'url("'+fileUrl+'")'});
	}
  function edit(id)
  {
    $('#form').load('<?=site_url()?>news/form/'+id,function(){
      $(".select2").select2();
    });
    $('.nav-tabs a:last').tab('show');
  }
  function hapus(id)
  {
    $('h4#title-hapus').text('Confirmation');
    $('#body-hapus').html('<h2>Yakin Ingin Menghapus Data Berita ini ?</h2><input type="hidden" name="id" id="id" value="'+id+'">');
    $('#modal-hapus').modal('show');
  }
  function hps()
  {
    $('#modal-hapus').modal('hide');
    var id=$('input#id').val();
    $.ajax({
      url : '<?=site_url()?>news/hapus/'+id,
      success : function(a)
      {
        $('div#body-alert').html('<h2>'+a+'</h2>');
        $('div#modal-alert').modal('show');
        $('#data').load('<?=site_url()?>news/data/-1');
        $('#form').load('<?=site_url()?>news/form/-1',function(){
          $(".select2").select2();
        });
      }
    });
    // alert(id);
  }
</script>
