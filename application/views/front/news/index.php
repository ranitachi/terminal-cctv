
<div id="news-normal">
 <div class="content-wrapper" style="">
    <section class="content" style="padding-top: 0px !important;">
      <!-- Small boxes (Stat box) -->
      <div class="row " style="">
         <div class="col-lg-12 bg  col-md-12" style="height:500px !important">
            <center>

              <div class="row" style="margin-top: 120px;">
                <div class="col-lg-12  col-md-12">
                  <!-- <img src="<?=base_url()?>assets/img/png/Group 801.png" style="margin-top: 30px;"><br> -->
                  <div style="font-weight:bold;width:200px;border-bottom:6px solid #ffd800;color:gray;font-size:30px;margin-top:10px;color:#95989a !important"><b>BERITA</b></div>
                </div>
                <div class="col-lg-12  col-md-12" style="margin-top: 30px;text-align:center">
                  <div class="row">
                    <div class="col-lg-1 col-md-1 col-sm-1" style="margin-top: 100px;">
                      <img src="<?=base_url()?>assets/img/png/Group 671.png" style="cursor:pointer;" onclick='mySwipe.prev()'>
                    </div>
                    <div style="text-align:center;margin:0 auto !important" class="col-lg-10 col-md-10 col-sm-10">
                      <div class="row" >
                        <!-- <div > -->
                        <div id="mySwipe" class="swipe">
                          <div class='swipe-wrap'>
                            <div>
                              <?
                              // for ($i=0; $i < 5; $i++) {
                              $ik=0;
                              foreach($d as $k=>$v)
                              {
                                  if($ik==4)
                                  {
                                    echo '</div>';
                                    echo '<div>';
                                    $ik=1;
                                  }
                                  $judul=(strlen($v->judul) > 20 ? substr($v->judul,0,19).' ...' : $v->judul);
                                // if(count($d)<=5)
                                // {
                                //   $col=floor(10/count($d));
                                // }
                                // else
                                  $col=3;

                                  if($v->gambar!='')
                                    $gbr=$v->gambar;
                                  else
                                    $gbr=base_url().'assets/img/download.png';

                                  $isi=substr(strip_tags($v->konten),0,60).' ...';
                              ?>
                              <div class="col-lg-<?=$col?> col-md-<?=$col?>">
                                <div class="box box-widget">
                                  <div class="box-header with-border">
                                    <div class="user-block">
                                      <img class="img-circle" src="<?=base_url()?>assets/img/png/120x120 pixel-02.png"  alt="<?=$v->judul?>">
                                      <span class="username" style="font-size: 11px;text-align: left"><a href="<?=site_url()?>berita/<?=cleartext($v->judul)?>"><?=$judul?></a></span>
                                      <span class="description" style="font-size: 10px;text-align: left"><?=tgl_indo($v->waktu_input)?></span>
                                    </div>
                                    <!-- /.user-block -->

                                    <!-- /.box-tools -->
                                  </div>
                                  <!-- /.box-header -->
                                  <div class="box-body">
                                    <a href="<?=site_url()?>berita/<?=cleartext($v->judul)?>"><img class="img-responsive pad" src="<?=$gbr?>" alt="Photo" style="height:150px;max-width:250px;"></a>
                                    <p style="font-size: 10px"><?=$isi?></p>
                                    <a href="<?=site_url()?>berita/<?=cleartext($v->judul)?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-share"></i> Detail</a>
                                  </div>

                                </div>
                              </div>
                              <?
                              $ik++;
                              }
                              ?>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-1  col-md-1 col-sm-1" style="margin-top: 100px;">
                      <img src="<?=base_url()?>assets/img/png/Group 670.png" style="cursor:pointer;" onclick='mySwipe.next()'>
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
    <!-- <div id='mySwipe' style='max-width:500px;margin:0 auto' class='swipe'>
      <div class='swipe-wrap'>
        <div><div style="width:50%;float:left">0</div> <div style="width:50%;float:left">00</div></div>
        <div><b>1</b></div>
        <div><b>2</b></div>
        <div><b>3</b></div>
        <div><b>4</b></div>
        <div><b>5</b></div>
        <div><b>6</b></div>
        <div><b>7</b></div>
        <div><b>8</b></div>
        <div><b>9</b></div>
        <div><b>10</b></div>
        <div><b>11</b></div>
        <div><b>12</b></div>
        <div><b>13</b></div>
        <div><b>14</b></div>
        <div><b>15</b></div>
        <div><b>16</b></div>
        <div><b>17</b></div>
        <div><b>18</b></div>
        <div><b>19</b></div>
        <div><b>20</b></div>
      </div>
    </div> -->



    <!-- <div style='text-align:center;padding-top:20px;'>

      <button onclick='mySwipe.prev()'>prev</button>
      <button onclick='mySwipe.next()'>next</button>

    </div> -->
    <!-- /.content -->
  </div>
  <?=$this->load->view('front/layout/footer','',true)?>
  <script>

  // pure JS
  var elem = document.getElementById('mySwipe');
  window.mySwipe = Swipe(elem, {
    // startSlide: 4,
    // auto: 3000,
    // continuous: true,
    // disableScroll: true,
    // stopPropagation: true,
    // callback: function(index, element) {},
    // transitionEnd: function(index, element) {}
  });

  // with jQuery
  // window.mySwipe = $('#mySwipe').Swipe().data('Swipe');

  </script>
  <style type="text/css">
    .bg
    {
      background-image: url('assets/img/png/bg-news.png');
      background-repeat: no-repeat;
      background-size: 100% 50%;
      /*width: 100%;*/
      height:281px;
    }
    .swipe {
      overflow: hidden;
      visibility: hidden;
      position: relative;
    }
    .swipe-wrap {
      overflow: hidden;
      position: relative;
    }
    .swipe-wrap > div {
      float:left;
      width:100%;
      position: relative;
    }
  </style>
</div>

<div id="news-mobile">
  <?=$this->load->view('mobile/news/index','',true)?>
</div>
