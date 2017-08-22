<?PHP
<link href="<?PHP echo $dirasset; ?>Library/Se7en_Template/stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- General CSS -->
<link rel="stylesheet" href="<?PHP echo $dirasset; ?>css/docs.css">
<style>
</style>
<section id="product" class="container main">
        <div class="bs-docs-example col-lg-12">
            <h3>Upload Image</h3>
            <div class="widget-container fluid-height clearfix">
                <div class="widget-content padded">
                    <form action="#" class="form-horizontal">
                        <div class="form-group" id="crop-avatar">
                            <label class="control-label col-md-4">
                            	Terminal image
                            </label>
                            <div class="col-md-3">
                            	<div class="avatar-view" title="Click to change the image">
                                    <img src="<?PHP echo $dirasset;?>img/upload.png" alt="Avatar">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <button class="btn btn-default-outline">Cancel </button>
                            </div>
                        </div>
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
                        <div class="col-md-4">
                        	<div class="docs-preview clearfix">
                                <div class="img-preview preview-lg" style="border: 1px solid #E8E8EC">
                                </div>
                            </div>
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
                                </div>
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