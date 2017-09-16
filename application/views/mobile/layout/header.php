<header class="main-header" style="max-height: 130px !important;border-bottom:1px solid white">
   <!-- Logo -->

   <!-- Header Navbar: style can be found in header.less -->
   <nav class="navbar navbar-static-top bg-warna" style="margin-left: 0px !important;min-height: 103px !important">
     <!-- Sidebar toggle button-->
     <!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
       <span class="sr-only">Toggle navigation</span>
     </a> -->
     <div class="row">
       <div class="col-sm-9 col-xs-9">
         <img src="<?=base_url()?>assets/img/png/logo-kemenhub.png" style="height:60px;">
       </div>
       <div class="col-sm-3 col-xs-3">
          <img src="<?=base_url()?>assets/img/png/120x120 pixel-02.png" style="width:60px;padding:5px;text-align:right;float:right;">
       </div>
    </div>
    <div class="row" style="background-color:#ffffff !important;">
    <div class="col-sm-1 col-xs-1">&nbsp;</div>
    <div class="col-sm-10 col-xs-10">
         <center>
         <?
           $mn=$this->uri->segment(1);
           // echo $mn;
         ?>
         <ul class="nav" style="display:block;margin:0 auto !important;font-size: 15px !important;">
             <li style="width:33%;float:left;border-right:#1d2983 solid 1px"  class="<?=($mn=='' ? 'active' : '')?>"><a href="<?=base_url()?>" class="warna">BERANDA</a></li>
             <li style="width:33%;float:left;border-right:#1d2983 solid 1px" class="<?=($mn=='terminal' ? 'active' : '')?>"><a href="<?=site_url()?>terminal" class="warna">TERMINAL</a></li>
             <li style="width:33%;float:left" class="<?=($mn=='news' ? 'active' : '')?>"><a href="<?=site_url()?>berita" class="warna">BERITA</a></li>
           </ul>
         </center>
       </div>
       <div class="col-sm-1 col-xs-1">&nbsp;</div>
     </div>
   </nav>
 </header>
