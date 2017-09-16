<?
// $json='';
// echo '<pre>';
// print_r($jumlahcctv[$idxcctv]);
// echo '</pre>';
// if(isset($jumlahcctv[$idxcctv]['tblcctv']))
// {
//     $js=$jumlahcctv[$idxcctv]['ip_cctv'].'terminalku/index.php/terminal/getcctvall/'.$terminal.'/'.$jumlahcctv[$idxcctv]['kode'];
//     $kd=$jumlahcctv[$idxcctv]['kode'];
// }
// else
// {
//     $js=$term->ip.'/getcctvall/'.$terminal.'/'.$jumlahcctv[$idxcctv]->kode;
//     $kd=$jumlahcctv[$idxcctv]->kode;
// }
// //echo $js;
// // echo $idxcctv;
// $js=@file_get_contents($js);
// if($js === FALSE)
// {
//   $json=array();
// }
// else
//   $json=$js;
?>
<div id="cctv-normal">
 <div class="content-wrapper">
    <section class="content" style="padding-top: 0px !important;">
    	<div class="row">
    		<div class="col-lg-4 col-md-4 bg">
    			<div class="row">
    				<div class="col-lg-3 col-md-3">&nbsp;</div>
            <div class="col-lg-9 col-md-9" style="text-align:center;">
                    <?
                    if(strtolower($terminal)=='giwangan')
                        $img='Group 1107.png';
                    else if(strtolower($terminal)=='purabaya')
                        $img='Group 1005.png';
                    else if(strtolower($terminal)=='tirtonadi')
                        $img='Group 1108.png';
                    else if(strtolower($terminal)=='soekarno')
                        $img='Group 1109.png';
                    else if(strtolower($terminal)=='arjosari')
                        $img='Group 1110.png';
                    else if(strtolower($terminal)=='bawen')
                        $img='terminal-bawen.png';
                    else if(strtolower($terminal)=='cilacap')
                        $img='Group 1118.png';
                    else if(strtolower($terminal)=='sukabumi')
                        $img='Group 1119.png';
                    else if(strtolower($terminal)=='wonogiri')
                        $img='terminal-wonogiri_2.png';
                    ?>
              <img src="<?=base_url()?>assets/img/png/<?=$img?>" style="height:110px;text-align:center;margin-top:20px;">
            </div>
    			</div>
    			<div class="row"  style="margin-top: 20px;">
    				<?=$this->load->view('front/terminal/menu','',true)?>
    			</div>
    		</div>
    		<div class="col-lg-1 col-md-1">&nbsp;</div>
    		<div class="col-lg-6 col-md-6">
    			<div class="row">

                <?
                $js=str_replace(array('[[',']]','"'), '', $json);
                // echo $js;
                // echo $ipstream;
                ?>
                    <script type="text/javascript">

                        var json;

                        var x='<?php echo $js;?>';
                        if(x!='')
                        {
                          json = x.split(',');
                          // alert(json.length);
                          jQuery(function($){

                              // alert(json.length);
                              // // for(var i=0;i<json.length;i++)
                              // // {
                              //    $('#datavideo').val(json);
                                  var video_index=0;
                                  var file=json[video_index];
                                  var ff=file.split('\\');
                                  // var fldr=ff[(ff.length) - 3]+'__'+ff[(ff.length) - 1];
                                  var fldr=ff[(ff.length) - 3];
                                  var fl=ff[(ff.length) - 1];
                                      // file=file.replace(/\\/g,'__');
                                  file=fl.replace(/ /g,'%20');
                                  // alert(file);
                                  // $('#playvideo').load('<?php echo site_url(); ?>terminalku/playvideo/<?=$kd?>/<?=$terminal?>/'+video_index+'/'+file);
                                  $('#playvideo').load('<?php echo site_url(); ?>terminalku/cobaplayvideo/<?=$ip?>'+fldr+'/<?=$kd?>/<?=$terminal?>/'+file+'/'+video_index);
                              //     // alert(file);
                          })
                        }
                        else
                        {
                            ipstream();
                            setInterval(function(){ ipstream(); }, 15000);
                        }
                            // $('#playvideo').html('<center><h2 style="width:500px;padding:30px 0px;border:1px solid #ddd">Server CCTV Sedang Off</h2></center>');
                            function ipstream()
                            {
                              $('#playvideo').load('<?=base_url()?>index.php/terminal/ipcctv/<?=$ipstream?>');
                            }
                            function onVideoEnded(index,folder)
                            {
                              // alert(json[1]+'--'+json[0]);
                              if(json.length==index)
                              {
                                index=0;
                              }
                                var file=json[index];
                                var ff=file.split('\\');
                                // var fldr=ff[(ff.length) - 3]+'__'+ff[(ff.length) - 1];
                                var fl=ff[(ff.length) - 1];
                                    // file=file.replace(/\\/g,'__');
                                filename=fl.replace(/ /g,'%20');
                                $('#playvideo').load('<?php echo site_url(); ?>terminalku/cobaplayvideo/<?=$ip?>'+folder+'/<?=$kd?>/<?=$terminal?>/'+filename+'/'+index);
                            }
                        </script>
            <?
            // echo $idxcctv;
            // echo count($jumlahcctv[$idxcctv]);
            // echo '<pre>';
            // print_r($jumlahcctv[$idxcctv]);
            // echo '</pre>';
            ?>
    				<div class="col-lg-12" style="margin-top: 20px;">

    					<div style="background: url('<?=base_url()?>assets/img/png/garis.png') no-repeat;height: 36px;width: 100%;text-align: center;padding-top: 10px;background-size: 100% 100%;font-size: 18px"><b>CCTV <?=($idxcctv+1)?></b> - <?=(isset($jumlahcctv[$idxcctv]['tblcctv']) ?  $jumlahcctv[$idxcctv]['nama_cctv'] : $jumlahcctv[$idxcctv]->nama_kamera)?></div>
    				</div>
    				<div class="col-lg-12" style="margin-top: 15px;text-align: center;">
    					<!-- <img src="<?=base_url()?>assets/img/png/video.png" style="width: 100%"> -->
                        <div id="playvideo"></div>
                        <input type="hidden" id="datavideo">
    				</div>
    				<div class="col-lg-12" style="margin-top: 25px;">
    					<div class="row" style="text-align:center;width:100% !important;">
                <center>
                <div class="col-lg-12" style="margin:0 auto !important;">
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
              </center>
    					</div>
    				</div>
    			</div>
    		</div>
    		<div class="col-lg-1">&nbsp;</div>
    	</div>
    </section>
  </div>
  <?=$this->load->view('front/layout/footer','',true)?>
</div>
<div id="cctv-mobile">
  <? //$this->load->view('mobile/terminal/detail','',true)?>
</div>
<style type="text/css">
    .bg
    {
      background-image: url('<?=base_url()?>assets/img/png/bg-terminal.png');
      background-repeat: no-repeat;
      /*background-size: 100% 100%;*/
      /*width: 100%;*/
      height:436px;
    }
    .menu
    {
    	cursor: pointer;
    }
    .menu:hover
    {
    	background-color: #eeeddd;
    }
    #cctv-normal
    {
      display: inline;
    }
    #cctv-mobile
    {
      display: none;
    }
    @media screen and (max-width: 1024px) {
      #cctv-normal
      {
        display: none;
      }
      #cctv-mobile
      {
        display: inline;
      }
    }
  </style>
