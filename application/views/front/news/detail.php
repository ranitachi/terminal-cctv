<div id="news-normal" style="float:left !important;width:100%">
 <div class="content-wrapper" >

    <section class="content" style="padding-top: 0px !important;">
      <!-- Small boxes (Stat box) -->
      <div class="row ">
         <div class="col-lg-12 bg  col-md-12" style="height:500px !important">
            <center>

              <div class="row" style="margin-top: 120px;">
                <div class="col-lg-12  col-md-12">
                  <!-- <img src="<?=base_url()?>assets/img/png/Group 801.png" style="margin-top: 30px;"><br> -->
                  <div style="font-weight:bold;width:200px;border-bottom:6px solid #ffd800;color:gray;font-size:30px;margin-top:10px;color:#95989a !important"><b>BERITA</b></div>
                </div>
                <div class="col-lg-12  col-md-12" style="margin-top: 30px;text-align:center;height:auto !important;margin-bottom:100px;">
                  <div class="row">
                    <div class="col-lg-2 col-md-1" style="margin-top: 100px;">
                      &nbsp;
                    </div>

                        <div class="col-lg-8 col-md-10" style="text-align:left">
                                <h3><?=$d->judul?></h3>
                                <h6><?=tgl_indo($d->waktu_input)?></h6>
                                  <img src="<?=$d->gambar?>" style="width:30%;margin-right:6px;padding:6px; border:1px solid #eee;float:left;">
                                <?=$d->konten?>
                        </div>

                    <div class="col-lg-2  col-md-1" style="margin-top: 100px;">
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
      background-size: 100% 50%;
      /*width: 100%;*/
      height:281px;
    }
  </style>
</div>
<div id="news-mobile">
  <?
  $dd['d']=$d;
  ?>
  <?=$this->load->view('mobile/news/detail',$dd,true)?>
</div>
