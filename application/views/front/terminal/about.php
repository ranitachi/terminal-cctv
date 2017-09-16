<div id="about-normal">
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
    				<div class="col-lg-12" style="margin-top: 20px;text-align: center;">
    					<h2><span class="border-warna-bottom">About <?=ucwords($terminal)?></span></h2>
    				</div>
    				<div class="col-lg-12" style="margin-top: 15px;">
    					 <h4 style="line-height: 21px"><?=count($term)!=0 ? $term->about_us: ''?></h4>
    				</div>
    			</div>
    		</div>
    		<div class="col-lg-1">&nbsp;</div>
    	</div>
    </section>
</div>
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
