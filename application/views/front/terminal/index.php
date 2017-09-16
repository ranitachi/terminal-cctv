<div id="terminal-normal">
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content" style="padding-top: 0px !important;">
      <!-- Small boxes (Stat box) -->
	      <div class="row" style="padding-top: 30px;">
      		<center>
            <div class="col-lg-1 col-sm-1 col-md-1 col-xs-1">
              <div class="row">
                <div class="col-lg-12">&nbsp;</div>
              </div>
            </div>
		         <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2" style="cursor: pointer" onclick="detail('purabaya')">
		         	<div class="row">
			         <div class="col-lg-12">
			         	<img src="<?=base_url()?>assets/img/png/Group 533.png">
			         </div>
			         <div class="col-lg-12">
		         		<img src="<?=base_url()?>assets/img/png/Group 534.png">
			         </div>
		         	</div>
		         </div>
		         <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2" style="cursor: pointer" onclick="detail('giwangan')">
		         	<div class="row">
			         <div class="col-lg-12">
			         	<img src="<?=base_url()?>assets/img/png/Group 533.png">
			         </div>
			         <div class="col-lg-12">
		         		<img src="<?=base_url()?>assets/img/png/Group 535.png">
			         </div>
		         	</div>
		         </div>
		         <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2" style="cursor: pointer" onclick="detail('tirtonadi')">
		         	<div class="row">
			         <div class="col-lg-12">
			         	<img src="<?=base_url()?>assets/img/png/Group 533.png">
			         </div>
			         <div class="col-lg-12">
		         		<img src="<?=base_url()?>assets/img/png/Group 536.png">
			         </div>
		         	</div>
		         </div>
		         <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2" style="cursor: pointer" onclick="detail('soekarno')">
		         	<div class="row">
			         <div class="col-lg-12">
			         	<img src="<?=base_url()?>assets/img/png/Group 533.png">
			         </div>
			         <div class="col-lg-12">
		         		<img src="<?=base_url()?>assets/img/png/Group 537.png">
			         </div>
		         	</div>
		         </div>
		         <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2" style="cursor: pointer" onclick="detail('arjosari')">
		         	 <div class="row">
			         <div class="col-lg-12">
			         	<img src="<?=base_url()?>assets/img/png/Group 533.png">
			         </div>
			         <div class="col-lg-12">
		         		<img src="<?=base_url()?>assets/img/png/Group 538.png">
			         </div>
		         	</div>
		         </div>
             <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
               <div class="row">
                 <div class="col-lg-12">&nbsp;</div>
               </div>
             </div>
		         <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2" style="cursor: pointer" onclick="detail('cilacap')">
		         	 <div class="row">
			         <div class="col-lg-12">
			         	<img src="<?=base_url()?>assets/img/png/Group 533.png">
			         </div>
			         <div class="col-lg-12">
		         		<img src="<?=base_url()?>assets/img/png/Group 539.png">
			         </div>
		         	</div>
		         </div>
		         <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2" style="cursor: pointer" onclick="detail('bawen')">
		         	 <div class="row">
			         <div class="col-lg-12">
			         	<img src="<?=base_url()?>assets/img/png/Group 533.png">
			         </div>
			         <div class="col-lg-12">
		         		<img src="<?=base_url()?>assets/img/png/Group 541.png">
			         </div>
		         	</div>
		         </div>
		         <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2" style="cursor: pointer" onclick="detail('sukabumi')">
		         	 <div class="row">
			         <div class="col-lg-12">
			         	<img src="<?=base_url()?>assets/img/png/Group 533.png">
			         </div>
			         <div class="col-lg-12">
		         		<img src="<?=base_url()?>assets/img/png/Group 542.png">
			         </div>
		         	</div>
		         </div>
		         <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2" style="cursor: pointer" onclick="detail('wonogiri')">
		         	 <div class="row">
			         <div class="col-lg-12">
			         	<img src="<?=base_url()?>assets/img/png/Group 533.png">
			         </div>
			         <div class="col-lg-12">
		         		<img src="<?=base_url()?>assets/img/png/terminal-wonogiri.png">
			         </div>
		         	</div>
		         </div>
             <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
               <div class="row">
                 <div class="col-lg-12">&nbsp;</div>
               </div>
             </div>
      		</center>
	      </div>
    </section>
</div>
</div>
<div id="terminal-mobile">
<?=$this->load->view('mobile/terminal/index','',true)?>
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
