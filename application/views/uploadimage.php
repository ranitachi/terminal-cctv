<?PHP	if($this->session->userdata("islogin") != 'Y'){		header('Location: ' . $signout);	}?><!-- Se7en_Template CSS -->
<link href="<?PHP echo $dirasset; ?>Library/Se7en_Template/stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- General CSS -->
<link rel="stylesheet" href="<?PHP echo $dirasset; ?>css/docs.css"><!--Cropping --><link href="<?PHP echo $dirasset; ?>Library/cropper-master/dist/cropper.min.css" rel="stylesheet"><link href="<?PHP echo $dirasset; ?>Library/cropper-master/examples/crop-avatar/css/main.css" rel="stylesheet"><link href="<?PHP echo $dirasset; ?>Library/cropper-master/demo/css/main.css" rel="stylesheet">
<style>	.avatar-view {		width: 100%;		height: 58%;	}		#avatar-modal{		width: 80%;		height: 70%;	}
</style>
<section id="product" class="container main">	<div class="row-fluid">		<div class="span12 center">			<img src="<?PHP echo $dirasset; ?>img/header.png" />		</div>	</div>	    <div class="row">
        <div class="bs-docs-example col-lg-12">
            <h3>Upload Image</h3>						<div class="pull-right">				<a class="btn btn-primary avatar-save" type="button" href="<?PHP echo $signout; ?>">Logout</a>			</div>			
            <div class="widget-container fluid-height clearfix">			
                <div class="widget-content padded">
                    <form action="#" class="form-horizontal">						<div class="form-group">                            <label class="control-label col-md-4">                            	Terminal								<i class="fa fa-commenting-o" data-toggle="popover" data-content='Choose a bus terminal would you change the picture.'></i>                            </label>							                            <div class="col-md-8">								<div class="col-md-7">									<label class="radio">										<input id="giwangan" name="terminal" type="radio" value="giwangan" checked="checked" 										onclick="javascript:$('#avatar_path').val('giwangan');">										<span>Jogyakarta - Terminal Giwangan</span>									</label>																		<label class="radio">										<input id="soekarno" name="terminal" type="radio" value="soekarno" 										onclick="javascript:$('#avatar_path').val('soekarno');">										<span>Klaten - Terminal Ir.Soekarno</span>									</label>																		<label class="radio">										<input id="purabaya" name="terminal" type="radio" value="purabaya" 										onclick="javascript:$('#avatar_path').val('purabaya');">										<span>Sidoarjo - Terminal Purabaya</span>									</label>																		<label class="radio">										<input id="tirtonadi" name="terminal" type="radio" value="tirtonadi" 										onclick="javascript:$('#avatar_path').val('tirtonadi');">										<span>Solo - Terminal Tirtonadi</span>									</label>								</div>                            </div>							                        </div>						
                        <div class="form-group" id="crop-avatar">
                            <label class="control-label col-md-4">
                            	Terminal image								<i class="fa fa-commenting-o" data-toggle="popover" data-content='Please provide image in 800 x 466 resolution or crop image in 800 x 466 pixels.'></i>
                            </label>							
                            <div class="col-md-3">
                            	<div class="avatar-view" title="Click to change the image">
                                    <img src="<?PHP echo $dirasset;?>img/upload.png" alt="Avatar">
                                </div>
                            </div>							
                        </div>						<!--
                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <button class="btn btn-default-outline">Cancel </button>
                            </div>
                        </div>						-->												<div id="msgsuccess"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
	(function () {
        $(document).ready(function () {
			var winWidth = $(window).width();
			var winHeight = $(window).height();
			var mdlWidth = $("#avatar-modal").width();
			var mdlHeight = $("#avatar-modal").height();			
			$("#avatar-modal").css("left", (winWidth/2) - (mdlWidth/2));
        }); //document.ready
    }).call(this);
</script>
<!--Cropping Modal -->
<div id="avatar-modal-container">
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border: none">
                <form class="form-horizontal avatar-form" action="<?PHP echo $uploadaction; ?>" enctype="multipart/form-data" method="post">
                <!--modal-body -->
                <div class="modal-body">
                    <!--Row -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="img-container" style="border: 1px solid #E8E8EC">
                                <img src="<?PHP echo $dirasset;?>img/upload.png" alt="Picture">
                            </div>
                        </div>
                        <div class="col-md-4">							<!--
                        	<div class="docs-preview clearfix">
                                <div class="img-preview preview-lg" style="border: 1px solid #E8E8EC">
                                </div>
                            </div>							-->							
                            <div class="docs-data">
                                <div class="input-group">
                                    <label class="input-group-addon" for="dataWidth">Width</label>
                                    <input class="form-control" id="dataWidth" type="text" placeholder="width" value="800" />
                                    <span class="input-group-addon">px</span>
                                </div>
                                <div class="input-group">
                                    <label class="input-group-addon" for="dataHeight">Height</label>
                                    <input class="form-control" id="dataHeight" type="text" placeholder="height" value="466" />
                                    <span class="input-group-addon">px</span>
                                </div>																<div class="btn-group">									<button class="btn btn-primary" data-method="setDragMode" data-option="move" type="button" title="Move">										<span class="docs-tooltip" data-toggle="tooltip" title="Move"><span class="fa fa-arrows-alt">										</span></span>									</button>																		<button class="btn btn-primary" data-method="setDragMode" data-option="crop" type="button" title="Crop">										<span class="docs-tooltip" data-toggle="tooltip" title="Crop"><span class="fa fa-crop">										</span></span>									</button>									<button class="btn btn-primary" data-method="zoom" data-option="0.1" type="button" title="Zoom In">										<span class="docs-tooltip" data-toggle="tooltip" title="Zoom In"><span class="fa fa-search-plus">										</span></span>									</button>									<button class="btn btn-primary" data-method="zoom" data-option="-0.1" type="button" title="Zoom Out">										<span class="docs-tooltip" data-toggle="tooltip" title="Zoom Out"><span class="fa fa-search-minus">										</span></span>									</button>									<button class="btn btn-primary" data-method="crop" type="button" title="Crop">										<span class="docs-tooltip" data-toggle="tooltip" title="Crop"><span class="fa fa-check">										</span></span>									</button>									<button class="btn btn-primary" data-method="clear" type="button" title="Clear">										<span class="docs-tooltip" data-toggle="tooltip" title="Clear"><span class="fa fa-remove">										</span></span>									</button>									<label class="btn btn-primary btn-upload avatar-upload" for="inputImage" title="Upload image file">										<input class="avatar-src" name="avatar_src" type="hidden">										<input class="avatar-data" name="avatar_data" type="hidden">										<input class="avatar-path" name="avatar_path" id="avatar_path" type="hidden" value="giwangan">										<input class="avatar-input sr-only" id="inputImage" name="file" type="file" accept="image/*">										<span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">											<span class="fa fa-upload"></span>										</span>									</label>									<button class="btn btn-primary avatar-save" type="submit">Done</button>								</div>
                            </div>
                        </div>
                    </div>
                    <!--./Row -->					
                </div>
                <!--modal-body -->
                </form>
            </div>
        </div>
    </div>
    <!-- /.modal -->
    <!-- Loading state -->
    <div class="loading" aria-label="Loading" role="img" tabindex="-1">
    </div>
</div>
<!--Cropping Modal -->
<!--Cropping -->
<script src="<?php echo $dirasset; ?>Library/cropper-master/dist/cropper.js"></script>
<script src="<?php echo $dirasset; ?>Library/cropper-master/examples/crop-avatar/js/main.js"></script>
<script>
    (function () {
        $(document).ready(function () {
			 /*
            # =============================================================================
            #   Popover
            # =============================================================================
            */
			$('[data-toggle="popover"]').popover({trigger:"hover", placement:"right", container:"body"});
        }); //document.ready
    }).call(this);
</script>