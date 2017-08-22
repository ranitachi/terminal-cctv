<style>
footer {
	position: fixed;
	bottom: 0;
	width: 100%;
}
</style>

<section class="container main" style="margin-bottom: 40px !important;">
	<span>&nbsp;</span>
	<div class="row-fluid">
		<div class="span12">
			<div class="center" id="logoterminal"></div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div id="jawa">
		        <div id="jogja" style="cursor:pointer"></div>
		        <div id="solo" style="cursor:pointer"></div>
		        <div id="klaten" style="cursor:pointer"></div>
		        <div id="surabaya" style="cursor:pointer"></div>
		    </div>
		</div>
	</div>
			<!-- <div class="center span4">&nbsp;</div>-->
	<div class="row-fluid" style="min-height: 400px !important;">
			<div class="center span12" id="menu" >
				<!-- <img src="<?PHP echo $dirasset; ?>img/car.png" width="100px" /> -->
				<p>&nbsp;</p>
				<div class="accordion" id="accordion">
				
					<div style="width:100%;float:left;height:100px;margin-bottom: 30px;">
						<div style="width:49%;float:left;">
							<div style="margin:0 auto;">
								
								<a class="btn btn-large btn-block" href="<?PHP echo $urlgiwangan; ?>">
									<img src="<?=base_url()?>assets/img/mobile/icon_jogja.png">
									<!-- <div id="jogja" style="cursor:pointer"></div><span class="icon icon-facetime-video" ></span> Jogyakarta - Terminal Giwangan -->
								</a>
							</div>
						</div>	
						<div style="width:49%;float:right">
							<div style="margin:0 auto;">
								<a class="btn btn-large btn-block" href="<?PHP echo $urlsoekarno; ?>">
									<img src="<?=base_url()?>assets/img/mobile/icon_klaten.png">
									 <!-- <div id="klaten" style="cursor:pointer"></div><span class="icon icon-facetime-video" ></span> Klaten - Terminal Ir. Soekarno -->
								</a>
							</div>	
						</div>	
					</div>
					<div style="width:100%;float:left;height:130px;margin-bottom: 30px;">
						<div style="width:49%;float:left">
							<div style="margin:0 auto;">
								<a class="btn btn-large btn-block" href="<?PHP echo $urlpurabaya; ?>">
									<img src="<?=base_url()?>assets/img/mobile/icon_surabaya.png">
							<!-- <span class="icon icon-facetime-video" ></span> Sidoarjo - Terminal Purabaya -->
								</a>
							</div>	
						</div>	
						<div style="width:49%;float:right">
							<div style="margin:0 auto;">
								<a class="btn btn-large btn-block" href="<?PHP echo $urltirtonadi; ?>">
									<img src="<?=base_url()?>assets/img/mobile/icon_solo.png">
								<!-- <div id="solo" style="cursor:pointer"></div><span class="icon icon-facetime-video" ></span> Solo - Terminal Tirtonadi -->
								</a>
							</div>	
						</div>	
					</div>
					
					
					
					
				</div>
			</div> 
			<div class="center span4">&nbsp;</div>
		</div>
	</div>
	
</section>
 <script>
        $(document).ready(function() {

            $('#jawa').css({
                'position' : 'absolute',
                'top' : ($(window).innerHeight() / 2) - ($('#jawa').height() / 2)
            }).animate({left: ($(window).innerWidth() / 2) - ($('#jawa').width() / 2)}, 1000);

            $('#terminalku').css({
                'position' : 'absolute',
                'top' : '5%'
            }).animate({left: ($(window).innerWidth() / 2) - ($('#terminalku').width() / 2)}, 1000);

            $('#copyright').css({
                'position' : 'absolute',
                'left' : ($('#footer').innerWidth() / 2) - ($('#copyright').width() / 2),
                'top' : ($('#footer').innerHeight() / 2) - ($('#copyright').height() / 2)
            });

            $('#jogja').removeClass().addClass('bounceInDown animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                $(this).removeClass();
            });
            $('#solo').removeClass().addClass('bounceInDown animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                $(this).removeClass();
            });
            $('#klaten').removeClass().addClass('bounceInDown animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                $(this).removeClass();
            });
            $('#surabaya').removeClass().addClass('bounceInDown animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                $(this).removeClass();
            });

            $('#jogja').click(function(e) {
		        $(location).attr('href', '<?=$urlgiwangan?>')

		    });

		    $('#solo').click(function(e) {
		        $(location).attr('href', '<?=$urltirtonadi?>')

		    });

		    $('#surabaya').click(function(e) {
		        $(location).attr('href', '<?=$urlpurabaya?>')

		    });

		    $('#klaten').click(function(e) {
		        $(location).attr('href', '<?=$urlsoekarno?>')

		    });

        });

    </script>