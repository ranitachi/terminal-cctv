<!-- <video id="my_video" autoplay="autoplay" onended="onVideoEnded(<?=$index?>)" style="width:600px;height: 350px;">
	<source src="<?=base_url()?>terminal/playvideo/<?=$file?>" type="video/mp4" />
</video> -->

<!--  <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="640" height="264" poster="http://vjs.zencdn.net/v/oceans.png" data-setup="{}">
    <source src="D:/MULTIMEDIA\MOVIE\sample.mp4" type="video/mp4">
 </video> -->
 <?php
 $f_img='../../../assets/img/'.$jpg;
 // if(file_exists($f_img))
 // {
 	$img=$f_img;
 // }
 // else
 // 	$img=base_url().'assets/img/cctv.png';

/* $fd='E:\\Recording\\Terbaru\\<?php echo $folder;?>\mp4\\<?php echo $file;?>';*/
$fd=DIRECTORY_FOLDER.'/'.$folder.'/mp4/'.$file;
if(file_exists($fd))
{

	$getID3 = new getID3;
	$ddd=$getID3->analyze($fd);							
	if($ddd['quicktime']['mdat']['size'] != 0)
	{
?>
	<script type="text/javascript">
		onVideoEnded(<?php echo $index;?>);
	</script>
<?php
	}
}
 ?>
  <video autoplay preload="auto" onended="onVideoEnded(<?php echo $index; ?>,'<?php echo $folder;?>')" id="example_video_1" class="video-js vjs-default-skin" preload="none" style="width:558px;height: 310px;background: url('<?php echo $img;?>');background-size: 100% 100%;" poster="../../../assets/img/loader.gif" data-setup="">
    <source id="ex" src="<?php echo base_url(); ?>terminal/playvideo/<?php echo $folder;?>/<?php echo $file;?>" type="video/mp4">
  </video>
 <?php
// $filePath='D:\JOB\RAMTEC\CCTV\Terbaru\f2aa1dd0-8830-476a-ba78-36ea3eb7ca10\mp4\2017-02-09 13_45_29_506.mp4';
// $stream = new VideoStream($filePath);
// $stream->start();
 ?>
