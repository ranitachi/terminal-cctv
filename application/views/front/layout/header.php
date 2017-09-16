 <header class="main-header" style="max-height: 130px !important;border-bottom:1px solid white">
    <!-- Logo -->

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top bg-warna" style="margin-left: 0px !important;min-height: 130px !important">
      <!-- Sidebar toggle button-->
      <!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a> -->
      <div class="row">
        <div class="col-sm-4" style="padding-top: 20px;padding-left: 40px">
          <img src="<?=base_url()?>assets/img/png/logo-kemenhub.png">
        </div>
        <div class="col-sm-4">
          <div class="row">
            <div class="col-lg-12">
              <center>
              <?
              $mn=$this->uri->segment(1);
              // echo $mn;
              ?>
                <ul class="nav" style="display:block;margin:0 auto !important;font-size: 20px !important;padding-top: 70px !important;">
                  <li style="width:33%;float:left"  class="<?=($mn=='' ? 'active' : '')?>"><a href="<?=base_url()?>">BERANDA</a></li>
                  <li style="width:33%;float:left" class="<?=($mn=='terminal' ? 'active' : '')?>"><a href="<?=site_url()?>terminal">TERMINAL</a></li>
                  <li style="width:33%;float:left" class="<?=($mn=='news' ? 'active' : '')?>"><a href="<?=site_url()?>news">BERITA</a></li>
                </ul>
              </center>
            </div>
          </div>
        </div>
        <div class="col-sm-4" style="text-align: right;">
          <img src="<?=base_url()?>assets/img/png/120x120 pixel-02.png" style="width:90px;margin-right: 40px;padding-top: 20px;">
        </div>
      </div>
    </nav>
  </header>
