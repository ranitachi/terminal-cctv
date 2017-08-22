<style>
	#title{ width:150px;}
	#cam{ width:100%;}
	
	.btn{
		/*width: 80%;*/
		/*height:30px;*/
		
		border-top-color: #FFFFFF;
		border-right-color: #F1F1F1;
		border-bottom-color: #F1F1F1;
		border-left-color: #FFFFFF;
		border-width: 4px;
		border-style: solid;

		-webkit-box-shadow: #878787 0px 2px 2px ;
		-moz-box-shadow: #878787 0px 2px 2px ; 
		box-shadow: #878787 0px 2px 2px ; 

		-webkit-border-radius: 23px; 
		-moz-border-radius: 23px;
		border-radius: 23px;

		font-size:10px;
		font-family:arial, helvetica, sans-serif; 
		padding: 3px 8px 3px 8px; 
		text-decoration:none; 
		display:inline-block;
		text-shadow: 0px 1px 0 rgba(255,255,255,1);
		font-weight:bold; 
		color: #333333;
		line-height: 10px;

		*display:inline;
		*zoom:1;
		text-align:center;
		vertical-align:middle;


		background-color: #D1D1D1; background-image: -webkit-gradient(linear, left top, left bottom, from(#D1D1D1), to(#FFFFFF));
		background-image: -webkit-linear-gradient(top, #D1D1D1, #FFFFFF);
		background-image: -moz-linear-gradient(top, #D1D1D1, #FFFFFF);
		background-image: -ms-linear-gradient(top, #D1D1D1, #FFFFFF);
		background-image: -o-linear-gradient(top, #D1D1D1, #FFFFFF);
		background-image: linear-gradient(to bottom, #D1D1D1, #FFFFFF);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#D1D1D1, endColorstr=#FFFFFF);
		
	}

	.btn:hover{
		border-top-color: #F1F1F1;
		border-right-color: #FFFFFF;
		border-bottom-color: #FFFFFF;
		border-left-color: #F1F1F1;]
		border-width: 4px;
		border-style: solid;
		
		background-color: #FFFFFF; background-image: -webkit-gradient(linear, left top, left bottom, from(#FFFFFF), to(#D1D1D1));
		background-image: -webkit-linear-gradient(top, #FFFFFF, #D1D1D1);
		background-image: -moz-linear-gradient(top, #FFFFFF, #D1D1D1);
		background-image: -ms-linear-gradient(top, #FFFFFF, #D1D1D1);
		background-image: -o-linear-gradient(top, #FFFFFF, #D1D1D1);
		background-image: linear-gradient(to bottom, #FFFFFF, #D1D1D1);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#FFFFFF, endColorstr=#D1D1D1);
	}
	
	#btn1:hover{content: url(<?PHP echo $dirasset; ?>img/<?PHP echo strtolower($terminal); ?>/tbl1b.png);}
	#btn2:hover{content: url(<?PHP echo $dirasset; ?>img/<?PHP echo strtolower($terminal); ?>/tbl2b.png);}
	#btn3:hover{content: url(<?PHP echo $dirasset; ?>img/<?PHP echo strtolower($terminal); ?>/tbl3b.png);}
	#btn4:hover{content: url(<?PHP echo $dirasset; ?>img/<?PHP echo strtolower($terminal); ?>/tbl4b.png);}
	#btn5:hover{content: url(<?PHP echo $dirasset; ?>img/<?PHP echo strtolower($terminal); ?>/tbl5b.png);}
	#btn6:hover{content: url(<?PHP echo $dirasset; ?>img/<?PHP echo strtolower($terminal); ?>/tbl6b.png);}
</style>


<script type='text/javascript'>

	jQuery(function($){

		setInterval(function(){ 
			$.ajax({
				url : '<?php echo base_url();?>terminal/shellscriptall',
				success:function()
				{

				}
			});
		}, 600000);
	});
</script>


	
	
	<span>&nbsp;</span>
	<h6><?php echo date('d-m-Y');?></h6>
	
	
	<span>&nbsp;</span>
	
</section>
<style type="text/css">
	.row-fluid
	{
		margin-bottom: 10px;
	}
</style>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Jadwal</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<style type="text/css">
	#myModal  {
		top:5%;
		left:12%;
		outline: none;
		width:75% !important;
		/*height:75% !important;*/
	}
</style>