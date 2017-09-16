<div class="" style="background-color:#fff;min-height: 300px; !important;">
   <section class="content" style="padding-top: 0px !important;">
     <!-- Small boxes (Stat box) -->
     <div class="row ">
        <div class="col-lg-12 col-xs-12 col-sm-12">
           <center>
             <div class="row">
               <div class="col-lg-12">
                 <img src="<?=base_url()?>assets/img/png/Group 801.png" style="height:40px;padding-top:10px;">
               </div>
             </div>
             <div class="row" style="margin-top:20px;">
               <div class="col-lg-1 col-sm-1 col-xs-1">&nbsp;</div>
               <div class="col-lg-10 col-xm-10 col-xs-10" style="text-align:center;">
                 <center>
                   <div class="row" style="text-align:center">
                     <?
                    //  for ($i=0; $i < 3; $i++) {
                    foreach($d as $k=>$v)
                    {
                      if($v->gambar!='')
                        $gbr=$v->gambar;
                      else
                        $gbr=base_url().'assets/img/download.png';

                      $judul=(strlen($v->judul) > 17 ? substr($v->judul,0,16).'...' : $v->judul);
                      $isi=substr(strip_tags($v->konten),0,60).' ...';

                     ?>
                     <div class="col-lg-2 col-sm-4 col-xs-6">
                       <div class="box box-widget">
                         <div class="box-header with-border">
                           <div class="user-block">
                             <img class="img-circle" src="<?=base_url()?>assets/img/png/120x120 pixel-02.png"  alt="<?=$v->judul?>">
                             <span class="username" style="font-size: 11px;text-align: left"><a href="<?=site_url()?>news/title/<?=cleartext($v->judul)?>"><?=$judul?></a></span>
                             <span class="description" style="font-size: 10px;text-align: left"><?=tgl_indo($v->waktu_input)?></span>
                           </div>
                           <!-- /.user-block -->

                           <!-- /.box-tools -->
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                           <img class="img-responsive pad" src="<?=$gbr?>" alt="Photo">

                           <p style="font-size: 10px"><?=$isi?></p>
                           <button type="button" class="btn btn-default btn-xs pull-right"><a href="<?=site_url()?>news/title/<?=cleartext($v->judul)?>"><i class="fa fa-share"></i> Detail</a></button>
                         </div>

                       </div>
                     </div>
                     <?
                    }
                     ?>
                   </div>
                 </center>
               </div>
               <div class="col-lg-1 col-sm-1 col-xs-1">&nbsp;</div>
             </div>
           </center>
         <!-- <div class="bg"></div> -->
        </div>
     </div>
     <!-- /.row (main row) -->

   </section>
   <!-- /.content -->
 </div>
