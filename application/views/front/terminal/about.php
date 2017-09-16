<div id="about-normal">
 <div class="content-wrapper">
    <section class="content" style="padding-top: 0px !important;">
    	<div class="row">
    		<div class="col-lg-4 col-md-4 bg">
          <div class="row">
              <div class="col-lg-3 col-md-3">&nbsp;</div>
              <div class="col-lg-9 col-md-9" style="text-align:center;">
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
      					<img src="<?=base_url()?>assets/img/png/<?=$img?>" style="height:110px;text-align:center;margin-top:20px;">
      				</div>
          </div>
    			<div class="row"  style="margin-top: 20px;">
    				<?=$this->load->view('front/terminal/menu','',true)?>
    			</div>
    		</div>
    		<div class="col-lg-1 col-md-1">&nbsp;</div>
    		<div class="col-lg-6 col-md-6">
    			<div class="row">
            <h4 class="fa fa-circle-o-notch fa-spin-custom spinner"></h4>
    				<div class="col-lg-12" style="margin-top: 10px;text-align: center;">
    					<div style="width:100%;border-bottom:10px solid #ffd800;color:gray;font-size:30px;margin-top:10px;color:#95989a !important;text-shadow:2px 2px 4px #ddd;">Tentang Terminal <?=ucwords($terminal)?></div>
              <!-- <h2><span class="border-warna-bottom">About <?=ucwords($terminal)?></span></h2> -->
    				</div>
    				<div class="col-lg-12" style="margin-top: 15px;text-align:justtify !important">
              <div style="width:200px;padding:5px;border:1px solid #ddd;float:right;margin-left:10px;text-align:center;">
                <?=count($term)!=0 ? '<img src="'.$term->foto_kepala.'" style="width:188px;height:188px">': ''?>
                <br>
                <small>Kepala Terminal </small>
                <br>
                <b><?=$term->nama_kepala?></b>
              </div>
              <div style="text-align:justify;"><?=count($term)!=0 ? $term->about_us: ''?></div>
    				</div>
    			</div>
    		</div>
    		<div class="col-lg-1 col-md-1">&nbsp;</div>
    	</div>
    </section>
</div>
<?=$this->load->view('front/layout/footer','',true)?>
</div>

<div id="about-mobile">
  <?=$this->load->view('mobile/terminal/about','',true)?>
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
#about-normal
{
  display: inline;
}
#about-mobile
{
  display: none;
}
@media screen and (max-width: 1000px) {
  #about-normal
  {
    display: none;
  }
  #about-mobile
  {
    display: inline;
  }
}
</style>
