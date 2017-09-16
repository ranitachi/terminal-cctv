<div id="profil-normal">
 <div class="content-wrapper">
    <section class="content" style="padding-top: 0px !important;">
    	<div class="row">
    		<div class="col-lg-4 bg">
    			<div class="row">
    				<div class="col-lg-3">&nbsp;</div>
            <div class="col-lg-9">
                    <?
                    if(strtolower($terminal)=='giwangan')
                        $img='Group 1107.png';
                    else if(strtolower($terminal)=='purabaya')
                        $img='Group 1005.png';
                    else if(strtolower($terminal)=='tirtonadi')
                        $img='Group 1108.png';
                    else if(strtolower($terminal)=='soekarno')
                        $img='Group 1109.png';
                    else if(strtolower($terminal)=='arjosari')
                        $img='Group 1110.png';
                    else if(strtolower($terminal)=='bawen')
                        $img='terminal-bawen.png';
                    else if(strtolower($terminal)=='cilacap')
                        $img='Group 1118.png';
                    else if(strtolower($terminal)=='sukabumi')
                        $img='Group 1119.png';
                    else if(strtolower($terminal)=='wonogiri')
                        $img='terminal-wonogiri_2.png';
                    ?>
    					<img src="<?=base_url()?>assets/img/png/<?=$img?>" style="margin-top: 40px;">
    				</div>
    			</div>
    			<div class="row"  style="margin-top: 20px;">
    				<?=$this->load->view('front/terminal/menu','',true)?>
    			</div>
    		</div>
    		<div class="col-lg-1">&nbsp;</div>
    		<div class="col-lg-6">
    			<div class="row">
    				<div class="col-lg-12" style="margin-top: 20px;">
    					<!-- <div style="background: url('<?=base_url()?>assets/img/png/garis.png') no-repeat;height: 36px;width: 100%;text-align: center;padding-top: 10px;background-size: 100% 100%;font-size: 18px"><b>CCTV 1</b> - Gedung Keberangkatan</div> -->
    					<center>
                           <img src="<?=base_url()?>assets/img/png/VIDEO PROFILE.png" class="border-warna-bottom">
                        </center>
                    </div>
                    <div class="col-lg-12" style="margin-top: 15px;">
                        <img src="<?=base_url()?>assets/img/png/Group 918.png" style="width: 100%">
    				</div>

    			</div>
    		</div>
    		<div class="col-lg-1">&nbsp;</div>
    	</div>
    </section>
</div>
</div>

<div id="profil-mobile">
  <?=$this->load->view('mobile/terminal/profile','',true)?>
</div>
<style type="text/css">
    .bg
    {
      background-image: url('<?=base_url()?>assets/img/png/bg-terminal.png');
      background-repeat: no-repeat;
      /*background-size: 100% 100%;*/
      /*width: 100%;*/
      height:436px;
    }
    .menu
    {
    	cursor: pointer;
    }
    .menu:hover
    {
    	background-color: #eeeddd;
    }
    #profil-normal
    {
      display: inline;
    }
    #profil-mobile
    {
      display: none;
    }
    @media screen and (max-width: 1000px) {
      #profil-normal
      {
        display: none;
      }
      #profil-mobile
      {
        display: inline;
      }
    }
  </style>
