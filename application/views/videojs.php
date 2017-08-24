 <video autoplay preload="auto" onended="filebaru()" id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="800" height="450" poster="http://vjs.zencdn.net/v/oceans.png" data-setup="">
    <source id="ex" src="<?=$video?>" type="video/mp4">
  </video>
<script type="text/javascript">
	function filebaru()
	{
		location.href="<?=base_url()?>terminal/videojs";
		// alert('aa');
		// var file="<?=base_url()?>assets/RECORDING/new.mp4"
		// document.getElementById('ex').src=file;
	}
</script>