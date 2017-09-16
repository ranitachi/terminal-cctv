<div id="main-normal">
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content" style="padding-top: 0px !important;">
      <!-- Small boxes (Stat box) -->
      <div class="row ">
         <div class="col-lg-12 bg">
            <center>
              <div class="row">
                <div class="col-lg-12">
                  <img src="<?=base_url()?>assets/img/png/120x120 pixel-02.png" style="margin-top: 20px;">
                </div>
                <div class="col-lg-12">
                  <img src="<?=base_url()?>assets/img/png/Group 920.png" style="margin-top: 10px;cursor:pointer" onclick="showvideo()">
                </div>
              </div>
              <div class="row" style="margin-top: 0;">
                <div class="col-lg-12">
                  <img src="<?=base_url()?>assets/img/png/AboutTerminalku.png" style="margin-top: 30px;"><br>
                  <img src="<?=base_url()?>assets/img/png/Group 14.png" style="">
                </div>
                <div class="col-lg-12">
                  <h5 style="width:60%;line-height: 22px;">
                  <?
                  if(count($about)!=0)
                  {
                    echo $about[0]->konten;
                  }
                  ?>
                  </h5>
                </div>
              </div>

            </center>
          <!-- <div class="bg"></div> -->
         </div>
      </div>
      <!-- /.row (main row) -->

    </section>
    <div class="row" style="background-color:#fff;text-align:center">
      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <img src="<?=base_url()?>assets/img/png/Group 16.png" style="cursor:pointer;"><br>
      </div>
    </div>
    <!-- /.content -->
  </div>

  <?=$this->load->view('front/layout/footer','',true)?>
  <style type="text/css">
    .bg
    {
      background-image: url('assets/img/png/bg-2.png');
      background-repeat: no-repeat;
      background-size: 100% 70%;
      /*width: 100%;*/
      /*height:436px;*/
    }
    body
    {
      overflow-y: hidden;
    }
  </style>
</div>
  <div id="main-mobile">
    <?=$this->load->view('mobile/layout/main','',true)?>
  </div>
  <script>
  function showvideo()
  {
      $('h4#title-info').text('Video Profile');
      $('#body-info').load('<?=site_url()?>terminalku/showvideo');
      $('#modal-info').modal('show');
  }
  </script>
