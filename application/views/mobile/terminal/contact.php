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
             <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12 center">
               <h3><span class="">Terminal <?=ucwords($terminal)?> Contact</span></h3>
             </div>
             <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12" style="padding:0 20px">
     					     <div class="row">
                     <div class="col-lg-9 col-xs-8 col-md-9 col-sm-8" style="text-align:center;height:400px;">
                        <div id="map_wrapper_mobile">
                          <!-- <div id="map_canvas_mobile"></div> -->
                          <img src="https://maps.googleapis.com/maps/api/staticmap?center=<?=$lat?>%2c%20<?=$long?>&zoom=16&size=230x300&maptype=roadmap&markers=color:red%7Clabel:C%7C<?=$lat?>,<?=$long?>&key=AIzaSyCuCowsRbWNOTxz3wIIOgjEEXNQsALsKGI" />
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-4 col-md-3 col-sm-4" style="">
                          <h3>Contact Detail</h3>
                          <?
                          if(count($term)!=0)
                            echo $term->contact;
                          ?>
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
