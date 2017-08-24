<!-- Required css files for Slick -->
<link rel="stylesheet" type="text/css" href="<?PHP echo $dirasset; ?>Library/slick-1.5.9/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?PHP echo $dirasset; ?>Library/slick-1.5.9/slick/slick-theme.css"/>
<!-- /Required css files for Slick -->

<section class="title">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <h3><?PHP echo str_replace('_', ' ', $prodtype); ?></h3>
            </div>
            <div class="span6">
                <ul class="breadcrumb pull-right">
                    <li><a href="<?PHP echo $urlhome; ?>"><?PHP echo $menuhome[$lang]; ?></a> <span class="divider">/</span></li>
                    <li><a href="#"><?PHP echo $menuproduct[$lang]; ?></a> <span class="divider">/</span></li>
                    <li class="active"><?PHP echo str_replace('_', ' ', $prodtype); ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- / .title -->

<script>
	(function () {
        $(document).ready(function () {
			var winWidth = $(window).width();
			var winHeight = $(window).height();
			var mdlWidth = $(".modal").width();
			var mdlHeight = $(".modal").height();
			
			$(".modal").css("left", (winWidth/2) - (mdlWidth/2));
        }); //document.ready
    }).call(this);
</script>

<section id="product" class="container main">

    <!--Slick -->
    <?PHP if(isset($imgbanner[$prodtype]["file"])){ ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="slider autoplay" style="margin-bottom:0px;">
                
                <?PHP foreach($imgbanner[$prodtype]["file"] as $a => $b){ ?>
                <div>
                    <p>
                        <a href="#">
                            <img src="<?PHP echo $dirimg . "product/thumb/$prodtype/banner/" . $b["filename"]; ?>" alt="">
                        </a>
                    </p>
                </div>
                <?PHP } ?>
                    
            </div>
        </div>
    </div>
    <?PHP } ?>
    <!--/Slick -->

    <div>&nbsp;</div>

    <div class="row-fluid">
        <ul class="gallery">
            <?PHP if (ISSET($imgthumb[$prodtype])){ ?>
                <?php for($i=0; $i<sizeof($imgthumb[$prodtype]); $i++) { ?>
                <li class="box <?PHP if(sizeof($imgthumb[$prodtype]) == 1)echo 'span12'; else echo 'span6'; ?>">
                    <div class="row-fluid">
                        <div class="span3">
                            <div class="preview" style="border: 1px dashed #0e90d2">
                                <img alt=" " src="<?PHP echo str_replace('index.php', '', $_SERVER['PHP_SELF']) . $dirthumb . '/' . $imgthumb[$prodtype][$i]["filename"]; ?>">

                                <div class="overlay"></div>
                                <div class="links">
                                    <a data-toggle="modal" href="#modal-<?PHP echo $i; ?>"><i class="icon-eye-open fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="desc span8" style="border-left: 2px dashed #0e90d2; padding-left: 10px">
                            <p align="justify">
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab_desc_<?PHP echo $i; ?>" data-toggle="tab"><?PHP echo $tabdesc[$lang]; ?></a></li>
                                        <li><a href="#tab_app_<?PHP echo $i; ?>" data-toggle="tab"><?PHP echo $tabapplication[$lang]; ?></a></li>
                                        <li><a href="#tab_pkg_<?PHP echo $i; ?>" data-toggle="tab"><?PHP echo $tabpackaging[$lang]; ?></a></li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_desc_<?PHP echo $i; ?>">
                                            <b></b>
                                            <p>
                                                <?PHP echo $imgthumb[$prodtype][$i]["desc"]; ?>
                                            </p>
                                        </div><!-- /.tab-pane -->
                                        <div class="tab-pane" id="tab_app_<?PHP echo $i; ?>">
                                            <b></b>
                                            <p>
                                                <?PHP echo $imgthumb[$prodtype][$i]["applications"]; ?>
                                            </p>
                                        </div><!-- /.tab-pane -->
                                        <div class="tab-pane" id="tab_pkg_<?PHP echo $i; ?>">
                                            <b></b>
                                            <p>
                                                <?PHP echo $imgthumb[$prodtype][$i]["packaging"]; ?>
                                            </p>
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div>
                            </p>
                        </div>

                        <div id="modal-<?PHP echo $i; ?>" class="modal hide fade">
                            <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove fa fa-times"></i></a>
                            <div class="modal-body">
                                <img src="<?PHP echo str_replace('index.php', '', $_SERVER['PHP_SELF']) . $dirthumb . '/' . $imgthumb[$prodtype][$i]["filename"]; ?>" alt=" " style="height:400px">
                            </div>
                        </div>
                    </div>
                </li>

                <?PHP if($i%2 == 1){ ?>
                </ul></div><div class="row-fluid"><ul class="gallery">
                <?PHP } ?>

                <?php } ?>
            <?PHP }Else{ ?>
            <div class="row-fluid">
                <div class="desc">
                    <p align="justify">
                        <h5>No product with keyword "<?PHP echo $prodtype; ?>" found!</h5>
                    </p>
                </div>
            </div>
            <?PHP } ?>
        </ul>
    </div>
</section>


<!-- Required javascript files for Slick -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?PHP echo $dirasset; ?>Library/slick-1.5.9/slick/jquery-1.11.3.js"></script>
<script type="text/javascript" src="<?PHP echo $dirasset; ?>Library/slick-1.5.9/slick/jquery-migrate-1.2.1.js"></script>
<script type="text/javascript" src="<?PHP echo $dirasset; ?>Library/slick-1.5.9/slick/slick.js"></script>
<!-- /Required javascript files for Slick -->

<!--Slick -->
<script>
    $('.autoplay').slick({
        slidesToShow: 6,
        autoplay: true,
        autoplaySpeed: 2000,
        speed:2000,
        arrows: false,
        draggable:true
    });
    
    /*$('.autoplay').on('mouseenter', function(){
                                             
    });*/
</script>
<!--/Slick -->