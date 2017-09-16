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
                        <?
                        // for ($i=0; $i < 5; $i++) {
                        foreach($d as $k=>$v)
                        {
                            $judul=(strlen($v->judul) > 20 ? substr($v->judul,0,19).' ...' : $v->judul);
                          // if(count($d)<=5)
                          // {
                          //   $col=floor(10/count($d));
                          // }
                          // else
                            $col=2;

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
                              <img class="img-responsive pad" src="<?=$gbr?>" alt="Photo">

                              <p style="font-size: 10px"><?=$isi?></p>
                              <button type="button" class="btn btn-default btn-xs pull-right"><a href="<?=site_url()?>berita/<?=cleartext($v->judul)?>"><i class="fa fa-share"></i> Detail</a></button>
                            </div>

                          </div>
                        </div>
                        <?
                        }
                        ?>
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
      background-image: url('assets/img/png/bg-news.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
      /*width: 100%;*/
      height:281px;
    }
  </style>
</div>
<div id="news-mobile">
  <?=$this->load->view('mobile/news/index','',true)?>
</div>
