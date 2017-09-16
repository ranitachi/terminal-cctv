<div class="" style="background-color:#fff;min-height: 300px; !important;">
   <!-- Content Header (Page header) -->


   <!-- Main content -->
   <section class="content" style="padding-top: 0px !important;">
     <!-- Small boxes (Stat box) -->
       <div class="row" style="padding-top: 30px;">
         <center>


            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4" style="cursor: pointer" onclick="detail('giwangan')">
             <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <img style="width:100%" src="<?=base_url()?>assets/img/png/Group 1187.png" style="width:90%">
              </div>
              <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <img style="width:100%" src="<?=base_url()?>assets/img/png/Group 535.png">
              </div> -->
             </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4" style="cursor: pointer" onclick="detail('tirtonadi')">
             <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <img style="width:100%" src="<?=base_url()?>assets/img/png/Group 1188.png" style="width:90%">
              </div>
              <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <img style="width:100%" src="<?=base_url()?>assets/img/png/Group 536.png">
              </div> -->
             </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4" style="cursor: pointer" onclick="detail('arjosari')">
              <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <img style="width:100%" src="<?=base_url()?>assets/img/png/Group 1190.png  " style="width:90%">
              </div>
              <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <img style="width:100%" src="<?=base_url()?>assets/img/png/Group 538.png">
              </div> -->
             </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4" style="cursor: pointer" onclick="detail('cilacap')">
              <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <img style="width:100%" src="<?=base_url()?>assets/img/png/Group 1194.png" style="width:90%">
              </div>
              <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <img style="width:100%" src="<?=base_url()?>assets/img/png/Group 539.png">
              </div> -->
             </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4" style="cursor: pointer" onclick="detail('bawen')">
              <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <img style="width:100%" src="<?=base_url()?>assets/img/png/Group 1192.png" style="width:90%">
              </div>
              <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <img style="width:100%" src="<?=base_url()?>assets/img/png/Group 541.png">
              </div> -->
             </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4" style="cursor: pointer" onclick="detail('sukabumi')">
              <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <img style="width:100%" src="<?=base_url()?>assets/img/png/Group 1191.png" style="width:90%">
              </div>
              <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <img style="width:100%" src="<?=base_url()?>assets/img/png/Group 542.png">
              </div> -->
             </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4" style="cursor: pointer" onclick="detail('wonogiri')">
              <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <img style="width:100%" src="<?=base_url()?>assets/img/png/Group 1193.png" style="width:90%">
              </div>
              <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <img style="width:100%" src="<?=base_url()?>assets/img/png/terminal-wonogiri.png">
              </div> -->
             </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4" style="cursor: pointer" onclick="detail('soekarno')">
             <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <img style="width:100%" src="<?=base_url()?>assets/img/png/Group 1189.png" style="width:90%">
              </div>
              <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <img style="width:100%" src="<?=base_url()?>assets/img/png/Group 537.png">
              </div> -->
             </div>
            </div>
            <br>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4" style="cursor: pointer" onclick="detail('purabaya')">
             <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <img style="width:100%" src="<?=base_url()?>assets/img/png/Group 1186.png" style="width:90%">
              </div>
              <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <img style="width:100%" src="<?=base_url()?>assets/img/png/Group 534.png">
              </div> -->
             </div>
            </div>
         </center>
       </div>
   </section>
</div>
<style type="text/css">
 .col-lg-3:hover
 {
   background-color: #eeeddd;
 }
</style>
<script type="text/javascript">
 function detail(terminal)
 {
   location.href="<?=site_url()?>terminal/about/"+terminal;
 }
</script>
