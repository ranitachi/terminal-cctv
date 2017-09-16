<div id="news-normal">
 <div class="content-wrapper">
    <section class="content" style="padding-top: 0px !important;">
      <!-- Small boxes (Stat box) -->
      <div class="row ">
         <div class="col-lg-12 bg  col-md-12">
            <center>

              <div class="row" style="margin-top: 120px;">
                <div class="col-lg-12  col-md-12">
                  <img src="<?=base_url()?>assets/img/png/Group 801.png" style="margin-top: 30px;"><br>
                </div>
                <div class="col-lg-12  col-md-12" style="margin-top: 30px;text-align:center">
                  <div class="row">
                    <div class="col-lg-1 col-md-1" style="margin-top: 100px;">
                      &nbsp;
                    </div>
                    <div style="text-align:center;margin:0 auto !important">

                        <div class="col-lg-10 col-md-10">
                          <div class="box box-widget">
                            <div class="box-header with-border">
                              <div class="user-block">
                              </div>
                              <!-- /.user-block -->

                              <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                            </div>

                          </div>
                        </div>

                      </div>
                    <div class="col-lg-1  col-md-1" style="margin-top: 100px;">
                      &nbsp;
                    </div>
                  </div>
                </div>
              </div>
            </center>
          <!-- <div class="bg"></div> -->
         </div>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <style type="text/css">
    .bg
    {
      background-image: url('<?=base_url()?>assets/img/png/bg-news.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      /*width: 100%;*/
      height:281px;
    }
  </style>
</div>
<div id="news-mobile">
  <?=$this->load->view('mobile/news/detail','',true)?>
</div>
