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
               <h3><span class="">Jadwal Terminal <?=ucwords($terminal)?></span></h3>
             </div>
             <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12" style="padding:0 20px">
               <div style="max-height:400px;overflow: scroll;overflow-x: hidden;">
                 <table class="table table-hover table-bordered table-striped">
                   <thead>
                     <tr>
                     <th rowspan="2">No</th>
                     <th colspan="3">Kedatangan</th>
                   </tr>
                   <tr>
                     <th>Tujuan</th>
                     <th>Waktu</th>
                     <th>Operator</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?
                   $no=1;
                   foreach ($d as $k => $v) {
                     echo '<tr>';
                     echo '<td>'.$no.'</td>';
                     echo '<td>'.$v->tujuan_datang.'</td>';
                     echo '<td>'.$v->waktu_datang.'</td>';
                     echo '<td>'.$v->operator_datang.'</td>';
                     echo '</tr>';
                     $no++;
                   }
                   ?>
                 </tbody>
                </table>
              </div>
              <div style="max-height:400px;overflow: scroll;overflow-x: hidden;">
                 <table class="table table-hover table-bordered table-striped">
                   <thead>
                     <tr>
                     <th rowspan="2">No</th>
                     <th colspan="3">Keberangkatan</th>
                   </tr>
                   <tr>
                     <th>Tujuan</th>
                     <th>Waktu</th>
                     <th>Operator</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?
                   $no=1;
                   foreach ($d as $k => $v) {
                     echo '<tr>';
                     echo '<td>'.$no.'</td>';
                     echo '<td>'.$v->tujuan_berangkat.'</td>';
                     echo '<td>'.$v->waktu_berangkat.'</td>';
                     echo '<td>'.$v->operator_berangkat.'</td>';
                     echo '</tr>';
                     $no++;
                   }
                   ?>
                 </tbody>
                </table>
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
