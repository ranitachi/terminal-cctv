<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="icon" href="<?PHP echo $dirasset; ?>img/favicon.png">
    <title><?PHP echo $sitetitle; ?></title>
    <meta name="description" content="Terinalku.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
	
    <link rel="stylesheet" href="<?PHP echo $dirasset; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?PHP echo $dirasset; ?>css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="<?PHP echo $dirasset; ?>css/font-awesome.css">
    <link rel="stylesheet" href="<?PHP echo $dirasset; ?>css/main.css">
    <link rel="stylesheet" href="<?PHP echo $dirasset; ?>css/animate.css">
    <link rel="stylesheet" href="<?PHP echo $dirasset; ?>css/style.css">
	
	<style>
		body{
			    margin: 0;
                padding: 0;
                background-image: url(<?=$dirasset;?>img/bg2000.png);
                background-repeat: no-repeat;
		}
	</style>
	
    <script src="<?PHP echo $dirasset; ?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	
    <script src="<?PHP echo $dirasset; ?>js/vendor/jquery-1.9.1.min.js"></script>
    <script src="<?PHP echo $dirasset; ?>js/vendor/bootstrap.min.js"></script>
    <script src="<?PHP echo $dirasset; ?>js/main.js"></script>
    <script src="<?PHP echo $dirasset; ?>js/jquery.gdocsviewer.js"></script>

    <!-- <link href="<?PHP echo $dirasset; ?>videojs/css/video-js.css" rel="stylesheet"> -->
    <!-- <script src="http://vjs.zencdn.net/ie8/1.1.0/videojs-ie8.min.js"></script> -->
    <!-- <script src="<?PHP echo $dirasset; ?>videojs/js/video.js"></script> -->
</head>

<body>
    <!--Header-->
    <?PHP //echo $tpl_header; ?>
    <!-- /Header -->
	
    <!--Main-->
    <?PHP echo $tpl_main; ?>
    <!-- /Main-->
	
    <!--Footer-->
    <?PHP echo $tpl_footer; ?>
    <!--/Footer-->
</body>

</html>