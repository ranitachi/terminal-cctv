<style type="text/css">
/* Style the second URL with a red border */
#test-gdocsviewer {
	border: 5px red solid;
	padding: 20px;
	width: 100%;
	background: #ccc;
	text-align: center;
	/*height: 400px;*/
}
/* Style all gdocsviewer containers */
.gdocsviewer {
	margin:10px;
	width: 100% !important;
	height: 600px !important;
}
.gdocsviewer iframe
{
	width:100% !important;
	height:600px !important;
}
</style>
<script src="<?PHP echo base_url(); ?>assets/js/vendor/jquery-1.9.1.min.js"></script>
<script src="<?PHP echo base_url(); ?>assets/js/jquery.gdocsviewer.js"></script>
<script type="text/javascript"> 
/*<![CDATA[*/
$(document).ready(function() {
	// $('a.embed').gdocsViewer({width: 600, height: 750});
	$('#embedURL').gdocsViewer();
});
/*]]>*/
</script> 

<a href="<?php echo base_url();?>assets/upload/<?=$terminal?>.pdf" id="embedURL"></a>