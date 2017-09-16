<div class="" style="background-color:#fff;min-height: 300px; !important;">
   <section class="content" style="padding-top: 0px !important;">
     <!-- Small boxes (Stat box) -->
     <div class="row ">
        <div class="col-lg-12 col-xs-12 col-sm-12">
           <center>
             <div class="row" style="border-bottom:3px solid yellow;">
               <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                 <?
                 if(strtolower($terminal)=='giwangan')
                     $img='giwangan.png';
                 else if(strtolower($terminal)=='purabaya')
                     $img='purabaya.png';
                 else if(strtolower($terminal)=='tirtonadi')
                     $img='tirtonadi.png';
                 else if(strtolower($terminal)=='soekarno')
                     $img='soekarno.png';
                 else if(strtolower($terminal)=='arjosari')
                     $img='arjosari.png';
                 else if(strtolower($terminal)=='bawen')
                     $img='bawen.png';
                 else if(strtolower($terminal)=='cilacap')
                     $img='cilacap.png';
                 else if(strtolower($terminal)=='sukabumi')
                     $img='sukabumi.png';
                 else if(strtolower($terminal)=='wonogiri')
                     $img='giri-adipura.png';
                 ?>
                   <img src="<?=base_url()?>assets/img/png/<?=$img?>" style="height:60px;padding-top:10px;">
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                  <?=$this->load->view('mobile/terminal/menu','',true)?>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">&nbsp;
                </div>
             </div>

           </center>
           <div class="row">
             <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12" style="padding:0 20px">

     					     <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 15px;text-align: center;">
                       <div id="playvideo-mobile" style="padding: 2px 0px;border :1px solid #222;width:400px;height: 255px;background-size: 100% 100%; margin:0 auto;background:#000;"></div>
                       <input type="hidden" id="datavideo-mobile">
             				</div>
                   </div>

     					     <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;border-bottom:1px solid #ddd;">
             					<div style="height: 36px;width: 100%;text-align: center;padding-top: 10px;background-size: 100% 100%;font-size: 18px"><b>CCTV <?=($idxcctv+1)?></b> - <?=(isset($jumlahcctv[$idxcctv]['tblcctv']) ?  $jumlahcctv[$idxcctv]['nama_cctv'] : $jumlahcctv[$idxcctv]->nama_kamera)?></div>
             				</div>
                   </div>
     					     <div class="row">
                    <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12" style="text-align:center;margin-top:5px">
                      <div class="row">
                        <?
                        $jlhcctv=$jumlahcctv[$idxcctv];
                        // unset($jumlahcctv[$idxcctv]);
                        foreach ($jumlahcctv as $k => $v)
                        {
                            if($idxcctv==$k)
                                $bgr='background-color:#ddd;';
                            else
                                $bgr='';
                            $nama_cam=(isset($jlhcctv['tblcctv']) ? $v['nama_cctv'] : $v->nama_kamera);
                        ?>
                            <div class="col-lg-<?=floor(12/count($jumlahcctv))?> col-md-<?=floor(12/count($jumlahcctv))?> col-sm-<?=floor(12/count($jumlahcctv))?> col-xs-<?=floor(12/count($jumlahcctv))?> menu" style="text-align: center;cursor:pointer;padding-bottom:10px;<?=$bgr?>">
                                <a href="<?=site_url()?>terminal/detail/<?=$terminal?>/<?=$k?>">
                                    <img src="<?=base_url()?>assets/img/png/44X44-02.png" style="width: 50px">
                                    <!-- <img src="<?=base_url()?>assets/img/png/PURABAYA CCTV - Jalur KeberangkatanKedatangan.png" style="width: 98%"> -->
                                    <div style="width: 98%;margin-top: -5px;font-size: 10px;font-weight: bold;"><?=$nama_cam?></div>
                                </a>
                            </div>
                        <?
                        }
                        ?>
                      </div>
                    </div>
                   </div>
     				</div>
           </div>
         <!-- <div class="bg"></div> -->
        </div>
     </div>
     <!-- /.row (main row) -->

   </section>
   <!-- /.content -->
 </div>
<script>
jQuery(function($){
    $('div#playvideo-mobile').load('<?=site_url()?>terminalku/playvideomobile');
})
</script>
